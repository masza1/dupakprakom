<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Models\DetailActivity;
use App\Models\DetailPenActivity;
use App\Models\Nilai;
use App\Models\Tanda;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use PDF;

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
            $filter_tahun = null;
            $filter_semester = null;
            $submissions = [];
            if (auth()->user()->level == 'sekretariat') {
                $filter_tahun = request()->filter_tahun;
                $filter_semester = request()->filter_semester;
                $submissions = $this->submission->with('employee')->where('status', 'TOLAK')->orwhere('status', 'TELAH DINILAI')
                    ->when($filter_tahun, function ($query) use ($filter_tahun) {
                        $query->where(function ($query) use ($filter_tahun) {
                            $query->orwhereYear('start_date', $filter_tahun)
                                ->orwhereYear('end_date', $filter_tahun);
                        });
                    })->when($filter_semester, function ($query) use ($filter_semester) {
                        $query->where('semester', $filter_semester);
                    })
                    ->get();
            } else {
                $submissions = $this->submission->with('employee')->where('status', 'TOLAK')->orwhere('status', 'TELAH DINILAI')->get();
            }
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
        DB::beginTransaction();
        try {
            $this->submission->where('id', $submission_id)->update($validated);
            $submission = Submission::where('id', $submission_id)->first();
            if ($request->status == 'REVISI' || $request->status == 'TOLAK') {
                DB::commit();
                return redirect()->route('penilai.index')->with('success', 'Berhasil menyimpan data');
            } else if ($request->status == 'TELAH DINILAI') {
                $nilai = Nilai::where('employee_id', $submission->employee_id)->whereNull('submission_id')->where('isNew', true)->first();
                $kegiatan = DetailActivity::select('approve_credit', 'element_id')
                    ->join('activities', 'activities.id', '=', 'detail_activities.activity_id')
                    ->join('elements', 'elements.id', '=', 'activities.element_id')
                    ->where('submission_id', $submission_id)->get()->groupBy(function ($q) {
                        return $q->element_id;
                    })->map(function ($item) {
                        return $item->sum('approve_credit');
                    })->toArray();
                $kegiatan_pen = DetailPenActivity::select('approve_credit', 'element_id')
                    ->join('pen_activities', 'pen_activities.id', '=', 'detail_pen_activities.pen_activity_id')
                    ->join('elements', 'elements.id', '=', 'pen_activities.element_id')
                    ->where('submission_id', $submission_id)->get()->groupBy(function ($q) {
                        return $q->element_id;
                    })->map(function ($item) {
                        return $item->sum('approve_credit');
                    })->toArray();
                if ($nilai == null) {
                    $old_nilai = Nilai::where('employee_id', $submission->employee_id)->where('isNew', false)->orderBy('updated_at', 'DESC')->first();
                    $create_nilai = null;
                    if ($old_nilai != null) {
                        $create_nilai = Nilai::create([
                            'employee_id' => $submission->employee_id,
                            'submission_id' => $submission_id,
                            'nilai_lama1' => $old_nilai->nilai_baru1,
                            'nilai_lama2' => $old_nilai->nilai_baru2,
                            'nilai_lama3' => $old_nilai->nilai_baru3,
                            'nilai_lama4' => $old_nilai->nilai_baru4,
                            'nilai_lama5' => $old_nilai->nilai_baru5,
                            'nilai_baru1' => array_key_exists(1, $kegiatan) ? $kegiatan[1] : 0,
                            'nilai_baru2' => array_key_exists(2, $kegiatan) ? $kegiatan[2] : 0,
                            'nilai_baru3' => array_key_exists(3, $kegiatan) ? $kegiatan[3] : 0,
                            'nilai_baru4' => array_key_exists(4, $kegiatan_pen) ? $kegiatan_pen[4] : 0,
                            'nilai_baru5' => array_key_exists(5, $kegiatan_pen) ? $kegiatan_pen[5] : 0,
                            'isNew' => false
                        ]);
                    } else {
                        $create_nilai = Nilai::create([
                            'employee_id' => $submission->employee_id,
                            'submission_id' => $submission_id,
                            'nilai_baru1' => array_key_exists(1, $kegiatan) ? $kegiatan[1] : 0,
                            'nilai_baru2' => array_key_exists(2, $kegiatan) ? $kegiatan[2] : 0,
                            'nilai_baru3' => array_key_exists(3, $kegiatan) ? $kegiatan[3] : 0,
                            'nilai_baru4' => array_key_exists(4, $kegiatan_pen) ? $kegiatan_pen[4] : 0,
                            'nilai_baru5' => array_key_exists(5, $kegiatan_pen) ? $kegiatan_pen[5] : 0,
                            'isNew' => false
                        ]);
                    }
                } else {
                    $nilai->update(['isNew' => false]);
                    $create_nilai = Nilai::create([
                        'employee_id' => $submission->employee_id,
                        'submission_id' => $submission_id,
                        'nilai_baru1' => array_key_exists(1, $kegiatan) ? $kegiatan[1] : 0,
                        'nilai_baru2' => array_key_exists(2, $kegiatan) ? $kegiatan[2] : 0,
                        'nilai_baru3' => array_key_exists(3, $kegiatan) ? $kegiatan[3] : 0,
                        'nilai_baru4' => array_key_exists(4, $kegiatan_pen) ? $kegiatan_pen[4] : 0,
                        'nilai_baru5' => array_key_exists(5, $kegiatan_pen) ? $kegiatan_pen[5] : 0,
                        'isNew' => false
                    ]);
                }
                DB::commit();
                return redirect()->route('penilai.index')->with('success', 'Berhasil menyimpan data');
            }
            return back()->with('success', 'Berhasil menyimpan data pengajuan');
        } catch (QueryException $th) {
            DB::rollBack();
            return back()->withErrors(['message' => $th->getMessage()]);
        }
    }

    public function nilaiDetail(Request $request, $submission_id, $id)
    {
        $model = null;
        $datatable = null;
        if ($request->type == 'utama') {
            $model = $this->detail;
            $datatable = 'datatableDetail';
        } else {
            $datatable = 'datatableDetailPen';
            $model = $this->detailPen;
        }
        $validated = $request->validate([
            "approve_credit" => ['required', 'numeric'],
            "description" => ['nullable', 'string', 'max:3000']
        ]);
        $validated += ["spt_valid" => $request->spt_valid != null ? true : false];
        $validated += ["bukti1_valid" => $request->bukti1_valid != null ? true : false];
        if ($request->spt_valid == null || $request->bukti1_valid == null) {
            return abort(501, 'Harap Validasi file SPT dan Bukti 1');
        }
        $validated += ["bukti2_valid" => $request->bukti2_valid != null ? true : false];
        $validated += ["bukti3_valid" => $request->bukti3_valid != null ? true : false];
        if ($model->where('submission_id', $submission_id)->where('id', $id)->update($validated)) {
            return [
                'status' => true,
                'message' => 'Berhasil menyimpan data',
                'datatable' => $datatable
            ];
        }

        return abort(404, 'Gagal menyimpan data');
    }

    public function downloadRiwayat()
    {
        $filter_tahun = request()->filter_tahun;
        $filter_semester = request()->filter_semester;
        $submissions = $this->submission->with('employee')->where('status', 'TOLAK')->orwhere('status', 'TELAH DINILAI')
            ->when($filter_tahun, function ($query) use ($filter_tahun) {
                $query->where(function ($query) use ($filter_tahun) {
                    $query->orwhereYear('start_date', $filter_tahun)
                        ->orwhereYear('end_date', $filter_tahun);
                });
            })->when($filter_semester, function ($query) use ($filter_semester) {
                $query->where('semester', $filter_semester);
            })
            ->get();
        if (request()->download) {
            $pdf = PDF::loadView('sekretariat.cetak-riwayat', ['submissions' => $submissions]);
            $pdf->set_paper('legal', 'potrait');
            return $pdf->stream('Riwayat_pengajuan_' . $filter_tahun . '_' . $filter_semester . '.pdf');
        } else {
            return back();
        }
    }
    public function cetak($submission_id, $employee_id)
    {
        $employee = Employee::with('unit', 'group', 'position')->find($employee_id);
        $tanda = [];
        if ($tanda = Tanda::first()) {
        } else{
            $tanda = new Tanda();
        }
        $newSubmission = Submission::find($submission_id);
        $nilai = Nilai::where('submission_id', $submission_id)->first();
        $data = [
            'nilai' => $nilai,
            'newSubmission' => $newSubmission,
            'employee' => $employee,
            'tanda' => $tanda,
        ];
        // return view('sekretariat.cetak', $data);
        $pdf = PDF::loadView('sekretariat.cetak', $data);
        $pdf->set_paper('legal', 'potrait');
        return $pdf->stream($employee->name . '.pdf');
    }
}
