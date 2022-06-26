<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Position;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function __construct(User $model)
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
            $users = $this->modelGetAll(['employee' => function ($q) {
                $q->with(['unit', 'group', 'position']);
            }])->where('level', 'penilai');
            return Datatables::of($users)->make(true);
        }
        $units = Unit::get();
        $groups = Group::get();
        $positions = Position::get();
        return view('sekretariat.users.index', compact('positions', 'groups', 'units'));
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
        $validatedUser = $request->validate([
            "email" => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "password" => ['required', 'confirmed', Password::default()],
        ]);
        $validatedUser['password'] = Hash::make($validatedUser['password']);

        $validatedDetail = $request->validate([
            "nip" => ['required', 'numeric'],
            "name" => ['required', 'string', 'max:100'],
            "birthplace" => ['required', 'string', 'max:150'],
            "birthdate" => ['required', 'date'],
            "gender" => ['required', 'in:L,P'],
            "group_id" => ['required', 'numeric'],
            "position_id" => ['required', 'numeric'],
            "unit_id" => ['required', 'numeric']
        ]);

        $validatedUser += ['level' => 'penilai'];
        DB::beginTransaction();
        try {
            $user = $this->modelCreate($validatedUser);
            $user->employee()->create($validatedDetail);
            DB::commit();
            return [
                'status' => true,
                'message' => 'Berhasil menambahkan data'
            ];
        } catch (QueryException $er) {
            DB::rollBack();
            return abort(501, $er);
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
        // dd($this->modelFind($id, ['employee' => function ($q) {
        //     $q->with(['unit', 'group', 'position']);
        // }])->where('level', 'penilai'));
        if ($data = User::with('employee')->where('level', 'penilai')->where('id', $id)->first()) {
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
        $user = $this->modelFind($id);
        $validatedUser = [];
        if($user->email != $request->email){
            $validatedUser += $request->validate([
                "email" => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }

        if($request->password != null || $request->password_confirmation != null){
            $validatedUser += $request->validate([
                "password" => ['required', 'confirmed', Password::default()],
            ]);
        }

        $validatedDetail = $request->validate([
            "nip" => ['required', 'numeric'],
            "name" => ['required', 'string', 'max:100'],
            "birthplace" => ['required', 'string', 'max:150'],
            "birthdate" => ['required', 'date'],
            "gender" => ['required', 'in:L,P'],
            "group_id" => ['required', 'numeric'],
            "position_id" => ['required', 'numeric'],
            "unit_id" => ['required', 'numeric']
        ]);
        DB::beginTransaction();
        try {
            if(!empty($validatedUser)){
                $user->update($validatedUser);
            }
            $user->employee()->update($validatedDetail);
            DB::commit();
            return [
                'status' => true,
                'message' => 'Berhasil mengubah data'
            ];
        } catch (QueryException $er) {
            DB::rollBack();
            return abort(501, $er);
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
