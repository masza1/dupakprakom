<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Periode;
use App\Models\Submission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubmissionController extends Controller
{

    public function __construct(Submission $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $submissions = $this->modelGetAll('employee')->where('employee_id', auth()->user()->employee->id);
            return Datatables::of($submissions)->make(true);
        }
        return view('prakom.pengajuan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $submission =  new Submission();

        return view('prakom.pengajuan.create', compact('submission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "surat_pengantar" => ['required', 'file'],
            "matriks_pengajuan" => ['required', 'file'],
            "sk_pangkat" => ['required', 'file'],
            "sk_kenaikan" => ['required', 'file'],
            "pak_terakhir" => ['required', 'file'],
            "skp1" => ['required', 'file'],
            "skp2" => ['required', 'file'],
            "ijazah" => ['required', 'file'],
            "spmk" => ['required', 'file'],
        ]);
        $files = [];
        $validated['surat_pengantar'] = $this->storeFile('surat_pengantar', 'pengajuan');
        $validated['matriks_pengajuan'] = $this->storeFile('matriks_pengajuan', 'pengajuan');
        $validated['sk_pangkat'] = $this->storeFile('sk_pangkat', 'pengajuan');
        $validated['sk_kenaikan'] = $this->storeFile('sk_kenaikan', 'pengajuan');
        $validated['pak_terakhir'] = $this->storeFile('pak_terakhir', 'pengajuan');
        $validated['skp1'] = $this->storeFile('skp1', 'pengajuan');
        $validated['skp2'] = $this->storeFile('skp2', 'pengajuan');
        $validated['ijazah'] = $this->storeFile('ijazah', 'pengajuan');
        $validated['spmk'] = $this->storeFile('spmk', 'pengajuan');
        $files += $validated;
        $validated += ['employee_id' => auth()->user()->employee->id];
        $pengajuan = $this->model->where('number', '<>', '')->orderby('number', 'DESC')->first();
        if (!empty($pengajuan)) {
            $number = $pengajuan->number;
            $number = substr($number, 3);
            $validated += ['number' => 'DPK'. ($number + 1)];
        } else {
            $validated += ['number' => 'DPK1000001'];
        }

        if ($this->modelCreate($validated)) {
            return redirect()->route('prakom.pengajuan.index')->with('success', 'Berhasil menambahkan data');
        }
        foreach ($files as $value) {
            $this->deletFile($value);
        }

        return back()->withErrors(['message' => 'Gagal menambahkan data']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($submission = Submission::with('employee')->find($id)) {
            $elements = Element::get();
            return view('prakom.pengajuan.penilaian', compact('submission', 'elements'));
        }
        return abort(501, 'Data tidak ditemukan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($submission = Submission::with('employee')->find($id)) {
            if($submission->status != 'DRAFT' && $submission->status != 'REVISI'){
                return back()->withErrors(['message' => 'Anda tidak dapat merubah data karena dalam tahap pengajuan']);
            }
            $elements = Element::get();
            return view('prakom.pengajuan.create', compact('submission', 'elements'));
        }
        return back()->withErrors(['message' => 'Data tidak ditemukan']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajukan !== NULL && $request->ajukan == 'true') {
            $submission = $this->model->whereHas('detail_activities')->whereHas('detail_pen_activities')->where('id', $id)->first();
            if($submission == null){
                return back()->withErrors(['message' => 'Silahkan mengisi detail kegiatan utama dan penunjang sebelum mengajukan']);
            }
            if ($periode = Periode::first()) {
                if($periode->start_date <= date('Y-m-d') && $periode->end_date >= date('Y-m-d')){
                    $validated = ['submission_date' => date('Y-m-d')];
    
                    $validated += ['status' => 'PENGAJUAN'];
                    $validated += ['start_date' => $periode->start_date];
                    $validated += ['end_date' => $periode->end_date];
                    $validated += ['semester' => $periode->semester];
                    if ($this->modelUpdate($validated, $id)) {
                        return back()->with('success', 'Berhasil mengubah data');
                    }
                }
            }
            return back()->withErrors(['message' => 'Periode dupak belum ada / dimulai']);
        } else if ($request->ajukan === NULL) {
            $validated = $request->validate([
                "surat_pengantar" => ['nullable', 'file'],
                "matriks_pengajuan" => ['nullable', 'file'],
                "sk_pangkat" => ['nullable', 'file'],
                "sk_kenaikan" => ['nullable', 'file'],
                "pak_terakhir" => ['nullable', 'file'],
                "skp1" => ['nullable', 'file'],
                "skp2" => ['nullable', 'file'],
                "ijazah" => ['nullable', 'file'],
                "spmk" => ['nullable', 'file'],
            ]);
            $files = [];
            if ($submission = $this->modelFind($id)) {
                $arraySubmission =  $submission->toArray();
                foreach ($validated as $key => $value) {
                    if ($request->file($key) !== NULL) {
                        if ($arraySubmission[$key] !== NULL) {
                            $files += [$key => $arraySubmission[$key]];
                            $validated[$key] = $this->storeFile($key, 'pengajuan');
                        } else {
                            $validated[$key] = $this->storeFile($key, 'pengajuan');
                        }
                    } else {
                        unset($validated[$key]);
                    }
                }
            }

            if ($submission->update($validated)) {
                foreach ($files as $value) {
                    $this->deletFile($value);
                }
                return redirect()->route('prakom.pengajuan.index')->with('success', 'Berhasil mengubah data');
            }

            foreach ($validated as $value) {
                $this->deletFile($value);
            }
        }

        return back()->withErrors(['message' => 'Gagal mengubah data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($submission = Submission::where('id', $id)->where('status', 'DRAFT')->first()) {
            $arraySubmission = $submission->toArray();
            if ($submission->delete()) {
                foreach ($arraySubmission as $key => $value) {
                    if ($value !== NULL) {
                        $this->deletFile($value);
                    }
                }
                return [
                    'status' => true,
                    'message' => 'Berhasil menghapus data'
                ];
            }
        }
        return abort(501, 'Query Failed');
    }
}
