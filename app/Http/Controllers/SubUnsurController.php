<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\SubElement;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubUnsurController extends Controller
{

    public function __construct(SubElement $model)
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
            $subunsur = $this->modelGetAll('element');
            return Datatables::of($subunsur)->make(true);
        }
        $unsurs = Element::get();
        return view('sekretariat.sub-unsur.index', compact('unsurs'));
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
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'element_id' => ['required', 'numeric']
        ]);

        if ($this->modelCreate($validated)) {
            return [
                'status' => true,
                'message' => 'Berhasil menambahkan data'
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
        if ($data = $this->modelFind($id)) {
            return $data;
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
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'element_id' => ['required', 'numeric']
        ]);

        if ($this->modelUpdate($validated, $id)) {
            return [
                'status' => true,
                'message' => 'Berhasil mengubah data'
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
}
