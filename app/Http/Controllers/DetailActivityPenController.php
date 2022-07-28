<?php

namespace App\Http\Controllers;

use App\Models\DetailPenActivity;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DetailActivityPenController extends Controller
{
    public function __construct(DetailPenActivity $model)
    {
        $this->model = $model;
    }

    public function index($submission_id)
    {
        if (request()->ajax()) {
            $detail = $this->model->with(['activity' => function ($q) {
                $q->with('element', 'sub_element');
            }])->where('submission_id', $submission_id)->get();
            $detail = $detail->map(function($val, $idx) use($detail){
                $grand_total_credit = 0;
                $grand_total_approve = 0;
                foreach ($detail as $key => $value) {
                    $grand_total_credit += $value->total_credit;
                    $grand_total_approve += $value->approve_credit;
                }

                $val->grand_total_credit = $grand_total_credit;
                $val->grand_total_approve = $grand_total_approve;
                return $val;
            });
            return Datatables::of($detail)->make(true);
        }
    }

    public function store(Request $request, $submission_id)
    {
        if ($request->ajax()) {
            $validated = $request->validate([
                "file_spt" => ['required', 'file'],
                "file_bukti1" => ['required', 'file'],
                "file_bukti2" => ['nullable', 'file'],
                "file_bukti3" => ['nullable', 'file'],
            ]);
            $file = [];
            $validated['file_spt'] = $this->storeFile('file_spt', 'detail-kegiatan');
            $validated['file_bukti1'] = $this->storeFile('file_bukti1', 'detail-kegiatan');
            $validated['file_bukti2'] = $this->storeFile('file_bukti2', 'detail-kegiatan');
            $validated['file_bukti3'] = $this->storeFile('file_bukti3', 'detail-kegiatan');
            $file += $validated;
            $validated += $request->validate([
                "year" => ['required', 'numeric'],
                "semester" => ['required', 'string'],
                "match_position" => ['required', 'string'],
                "pen_activity_id" => ['required', 'numeric'],
                "jumlah" => ['required', 'numeric'],
                "total_credit" => ['required', 'numeric'],
            ]);
            $validated['submission_id'] = $submission_id;
            DB::beginTransaction();
            try {
                $this->modelCreate($validated);
                DB::commit();
                return [
                    'status' => true,
                    'message' => 'Berhasil menyimpan data',
                    'datatable' => 'datatableDetailPen'
                ];
            } catch (QueryException $th) {
                DB::rollBack();
                foreach ($file as $value) {
                    $this->deletFile($value);
                }
                return abort(501, $th->getMessage());
            }
        }

        return abort(404, 'Halaman Tidak ditemukan');
    }

    public function edit($submission_id, $id)
    {
        if (request()->ajax()) {
            return $this->model->with(['activity' => function ($q) {
                $q->with('element', 'sub_element');
            }])->where('id', $id)->where('submission_id', $submission_id)->first();
        }
        return abort(404, 'Halaman tidak ditemukan');
    }

    public function update(Request $request, $submission_id, $id)
    {
        if ($request->ajax()) {
            $validated = $request->validate([
                "file_spt" => ['nullable', 'file'],
                "file_bukti1" => ['nullable', 'file'],
                "file_bukti2" => ['nullable', 'file'],
                "file_bukti3" => ['nullable', 'file'],
            ]);
            $files = [];
            $detail = $this->modelFind($id);
            $arrayDetail =  $detail->toArray();
            // dd($detail);
            foreach ($validated as $key => $value) {
                if ($request->file($key) !== NULL) {
                    if ($arrayDetail[$key] !== NULL) {
                        $files += [$key => $arrayDetail[$key]];
                        $validated[$key] = $this->storeFile($key, 'detail-kegiatan');
                    } else {
                        $validated[$key] = $this->storeFile($key, 'detail-kegiatan');
                    }
                } else {
                    unset($validated[$key]);
                }
            }
            $validated += $request->validate([
                "year" => ['required', 'numeric'],
                "semester" => ['required', 'string'],
                "match_position" => ['required', 'string'],
                "pen_activity_id" => ['required', 'numeric'],
                "jumlah" => ['required', 'numeric'],
                "total_credit" => ['required', 'numeric'],
            ]);
            DB::beginTransaction();
            try {
                $this->modelUpdate($validated, $id);
                DB::commit();
                foreach ($files as $value) {
                    $this->deletFile($value);
                }
                return [
                    'status' => true,
                    'message' => 'Berhasil mengubah data',
                    'datatable' => 'datatableDetailPen'
                ];
            } catch (QueryException $th) {
                DB::rollBack();
                foreach ($validated as $value) {
                    $this->deletFile($value);
                }
                return abort(404, 'Query Failed');
            }
        }

        return abort(404, 'Halaman Tidak ditemukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($submission_id, $id)
    {
        if ($details = $this->model->where('id', $id)->first()) {
            $arrayDetail = $details->toArray();
            if ($details->delete()) {
                foreach ($arrayDetail as $key => $value) {
                    if ($value !== NULL) {
                        $this->deletFile($value);
                    }
                }
                return [
                    'status' => true,
                    'message' => 'Berhasil menghapus data',
                    'datatable' => 'datatableDetailPen'
                ];
            }
        }
        return abort(501, 'Query Failed');
    }
}
