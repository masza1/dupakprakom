<?php

namespace App\Http\Controllers;

use App\Models\DetailActivity;
use App\Models\DetailPenActivity;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PenilaianController extends Controller
{
    protected $submission;
    protected $detail;
    protected $detailPen;
    public function __construct(Submission $submission, DetailActivity $detail, DetailPenActivity $detailPen)
    {
        $this->submission = $submission;
        $this->detail = $detail;
        $this->detailPen = $detailPen;
    }

    public function index()
    {
        if (request()->ajax()) {
            $submissions = $this->submission->with('employee')->where('status', 'PENGAJUAN')->get();
            return DataTables::of($submissions)->make(true);
        }

        return view('penilai.index');
    }
   
    public function indexRiwayat()
    {
        if (request()->ajax()) {
            $submissions = $this->submission->with('employee')->where('status', 'TOLAK')->orwhere('status', 'TELAH DINILAI')->get();
            return DataTables::of($submissions)->make(true);
        }

        return view('penilai.index-riwayat');
    }

    public function nilaiPengajuan(Request $request, $submission_id)
    {
        $validated = [];
        if ($request->status == null) {
            return back()->withErrors(['message' => 'Gagal menyimpan data']);
        }
        $validated += ["sp_valid" => $request->sp_valid != null ? true : false];
        $validated += ["matriks_valid" => $request->matriks_valid != null ? true : false];
        $validated += ["pangkat_valid" => $request->pangkat_valid != null ? true : false];
        $validated += ["kenaikan_valid" => $request->kenaikan_valid != null ? true : false];
        $validated += ["pak_valid" => $request->pak_valid != null ? true : false];
        $validated += ["skp1_valid" => $request->skp1_valid != null ? true : false];
        $validated += ["skp2_valid" => $request->skp2_valid != null ? true : false];
        $validated += ["ijazah_valid" => $request->ijazah_valid != null ? true : false];
        $validated += ["spmk_valid" => $request->spmk_valid != null ? true : false];
        if ($request->status == 'TELAH DINILAI') {
            $tempSubmission = $this->submission->whereHas('detail_activities', function ($q) {
                $q->where('approve_credit', '<>', '');
            })->whereHas('detail_pen_activities', function ($q) {
                $q->where('approve_credit', '<>', '');
            })->where('id', $submission_id)->first();

            if ($tempSubmission == null) {
                return back()->withErrors(['message' => 'Pastikan Anda untuk memvalidasi data pengajuan, dan menilai detail kegiatan utama dan penunjang']);
            }
            foreach ($validated as $key => $value) {
                if (!$value) {
                    return back()->withErrors(['message' => 'Pastikan Anda untuk memvalidasi data pengajuan, dan menilai detail kegiatan utama dan penunjang']);
                }
            }
        }
        if ($request->status == 'REVISI' || $request->status == 'TOLAK') {
            $validated += $request->validate([
                'catatan_penilai' => ['required', 'string', 'max:3000'],
            ]);
        }

        $validated += ["status" => $request->status];
        $validated += ["catatan_penilai" => $request->catatan_penilai];
        // DB::beginTransaction();
        if ($this->submission->where('id', $submission_id)->update($validated)) {
            if ($request->status == 'REVISI' || $request->status == 'TOLAK') {
                return redirect()->route('penilai.index')->with('success', 'Berhasil menyimpan data');
            }else if($request->status == 'TELAH DINILAI'){
                return redirect()->route('penilai.index')->with('success', 'Berhasil menyimpan data');
            }
            return back()->with('success', 'Berhasil menyimpan data pengajuan');
        }

        return back()->withErrors(['message' => 'Gagal menyimpan data pengajuan']);
    }

    public function nilaiDetail(Request $request, $submission_id, $id)
    {
        $model = null;
        $datatable = null;
        if($request->type == 'utama'){
            $model = $this->detail;
            $datatable = 'datatableDetail';
        }else {
            $datatable = 'datatableDetailPen';
            $model = $this->detailPen;
        }
        $validated = $request->validate([
            "approve_credit" => ['required', 'numeric'],
            "description" => ['nullable', 'string', 'max:3000']
        ]);
        $validated += ["spt_valid" => $request->spt_valid != null ? true : false];
        $validated += ["bukti1_valid" => $request->bukti1_valid != null ? true : false];
        $validated += ["bukti2_valid" => $request->bukti2_valid != null ? true : false];
        $validated += ["bukti3_valid" => $request->bukti3_valid != null ? true : false];
        if($model->where('submission_id', $submission_id)->where('id', $id)->update($validated)){
            return [
                'status' => true,
                'message' => 'Berhasil menyimpan data',
                'datatable' => $datatable
            ];
        }

        return abort(404, 'Gagal menyimpan data');
    }
}