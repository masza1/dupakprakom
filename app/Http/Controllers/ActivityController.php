<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Element;
use App\Models\Position;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ActivityController extends Controller
{

    public function __construct(Activity $model)
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
            $activites = $this->modelGetAll(['position' => function ($q) {
                $q->with(['level']);
            }, 'element', 'sub_element']);
            return Datatables::of($activites)->make(true);
        }
        $positions = Position::get();
        $elements = Element::get();
        return view('sekretariat.kegiatan.kegiatan-tugas', compact('elements', 'positions'));
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
            "position_id" => ['required', 'numeric'],
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
        if ($data = $this->model->with(['position' => function ($q) {
            $q->with(['level']);
        }, 'element', 'sub_element'])->find($id)) {
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
            "position_id" => ['required', 'numeric'],
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

    public function getActivity(Request $request){
        if($request->ajax()){
            $element_id = $request->element_id;
            $sub_element_id = $request->sub_element_id;

            $activites = $this->model->when($element_id != null, function($q) use ($element_id) {
                $q->where('element_id', $element_id);
            })->when($sub_element_id != null, function ($q) use ($sub_element_id) {
                $q->where('sub_element_id', $sub_element_id);
            })->get();

            return $activites;
        }
    }
}
