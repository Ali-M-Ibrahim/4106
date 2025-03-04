<?php

namespace App\Http\Controllers;

use http\Params;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    function f1(){
        return "Hello i am first controller and i am function number 1";
    }
    function f2(){
        return response()->json(["firstname"=>"joe","lastname"=>"Doe"])
            ->header('header1',123);
    }

    function f3($id){
        return "Hello i am function 3 and the parameter is:" . $id;
    }

    function f4($name,$id=0){
        return "Hello i am function 4 and the paramters are: ID :" .$id . " and the name is: " .$name;
    }


    function post(Request $request){
        $fname= $request->firstname;
        $lname = $request->lastname;
        $age= $request->input('age',12);
        $fullname = $fname . " " . $lname;
        return $age;
       // $request->header('header1');
    }
}
