<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $validator = validator()->make($request->all(),[
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Password::defaults()],
            ]);
    
            if($validator->fails()){
                return $this->sendError($validator->errors(), 422);
            }
            
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
    
            $token = $user->createToken('auth_token')->plainTextToken;
            $data = [
                'user' => $user,
                'token' => $token,
                'token_type' => 'Bearer',
            ];
    
            DB::commit();
            return $this->sendResponse($data);
        }catch(QueryException $err){
            DB::rollBack();
            return $this->sendError('Query Error');
        }
    }
}
