<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\PenActivity;
use App\Models\Position;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenActivityController extends Controller
{

    public function __construct(PenActivity $model)
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
            $activites = $this->modelGetAll(['element', 'sub_element']);
            return Datatables::of($activites)->make(true);
        }
        $elements = Element::get();
        return view('sekretariat.kegiatan.kegiatan-penunjang', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "element_id" => ['required', 'numeric'],
            "sub_element_id" => ['required', 'numeric'],
            "description" => ['required', 'string', 'max:3000'],
            "output" => ['required', 'string'],
            "credit" => ['required', 'numeric']
        ]);

        if ($this->modelCreate($validated)) {
            return [
                'status' => true,
                'message' => 'Berhasil menyimpan data'
            ];
        }
        return abort(501, 'Query Failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($data = $this->model->with(['element', 'sub_element'])->find($id)) {
            return $data;
        }
        return abort(501, 'Query Failed');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validated = $request->validate([
            "element_id" => ['required', 'numeric'],
            "sub_element_id" => ['required', 'numeric'],
            "description" => ['required', 'string', 'max:3000'],
            "output" => ['required', 'string'],
            "credit" => ['required', 'numeric']
        ]);

        if ($this->modelUpdate($validated, $id)) {
            return [
                'status' => true,
                'message' => 'Berhasil menyimpan data'
            ];
        }
        return abort(501, 'Query Failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->modelDelete($id)) {
            return [
                'status' => true,
                'message' => 'Berhasil menghapus data'
            ];
        }
        return abort(501, 'Query Failed');
    }

    public function getActivityPen(Request $request)
    {
        if ($request->ajax()) {
            $element_id = $request->element_id;
            $sub_element_id = $request->sub_element_id;

            $activites = $this->model->when($element_id != null, function ($q) use ($element_id) {
                $q->where('element_id', $element_id);
            })->when($sub_element_id != null, function ($q) use ($sub_element_id) {
                $q->where('sub_element_id', $sub_element_id);
            })->get();

            return $activites;
        }
    }
}
