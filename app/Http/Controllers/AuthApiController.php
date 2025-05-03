<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\APIResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    use APIResponse;
    public function Register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|same:c_password',
            'is_admin'=>'required'
        ]);

        if($validator->fails()){
            $error = $validator->errors();
            return $this->sendError("Validation Error",$error,Response::HTTP_BAD_REQUEST);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;
        $user->save();
        $success['token'] =  $user->createToken('Auth')->plainTextToken;
        $success['name'] =  $user->name;
        return $this->sendSuccess("User Registered",$success,Response::HTTP_CREATED);
    }

    public function Login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
        ]);
        if($validator->fails()){
            $error = $validator->errors();
            return $this->sendError("Validation Error",$error,Response::HTTP_BAD_REQUEST);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('Auth')->plainTextToken;
            $success['name'] =  $user->name;
            return $this->sendSuccess("User Authenticated",$success);
        }
        else{
            return $this->sendError("Invalid credentials");
        }

    }
}
