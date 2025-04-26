<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Register(){

        return "ok user created";
    }

    public function login(){
        return View("login");
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return "ok connected";
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showUser(){
//        if(Auth::check()){
//            $user = Auth::user();
//            return $user;
//        }else{
//            return "no user";
//        }
        return View("showuser");
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }

}
