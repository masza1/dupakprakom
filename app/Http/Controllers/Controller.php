<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $model;

    public function sendResponse($data, $code = 200){
        $data += ['success' => true];
        $data += ['uhuy' => 'sangat uhuyy'];

        return response()->json($data, $code);
    }

    public function sendError($errorMessages, $code = 404){
        $response = [
            'success' => false,
            'message' => $errorMessages
        ];

        // if (!empty($errorMessages)) {
        //     $response['message'] = $errorMessages;
        // }

        return response()->json($response, $code);
    }

    public function modelFind($id, $with = null){
        return $this->model->when($with != null, function($q) use($with){
            $q->with($with);
        })->where('id',$id)->first();
    }

    public function modelGetAll($with = null){
        return $this->model->when($with != null, function($q) use($with){
            $q->with($with);
        })->get();
    }

    public function modelCreate($validated){
        return $this->model->create($validated);
    }

    public function modelUpdate($validated, $id){
        return $this->model->where('id', $id)->update($validated);
    }

    public function modelDelete($id){
        return $this->model->where('id', $id)->delete();
    }

    public function storeFile($file, $path)
    {
        if (request()->file($file) !== NULL) {
            return request()->file($file)->storeAs($path, Str::random(20) . '_' . date('YmdHis') . '.' . request()->file($file)->getClientOriginalExtension());
        }
        return NULL;
    }

    public function deletFile($file)
    {
        if($file != NULL){
            if (file_exists(public_path('storage/' . $file))) {
                unlink(public_path('storage/' . $file));
            }
        }
    }
}
