<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $this->prepareData();
        return View("FirstView");
    }
    public function index2(){
        // method 1
//        $title = "This is my title from backend";
//        $message = "This is my body from backend";
//        return View("SecondView",["tit"=>$title,'msg'=>$message,'msg2'=>"this is my second message"]);
//
//      method 2
//        $tit = "Title from method 2";
//        $msg = "body from method 2";
//        $msg2= "second body from mehtod 2";
//        return View("SecondView",compact("tit",'msg','msg2'));

//        method 3
        $title = "This is my title from backend using method 3";
        $message = "This is my body from backend using method 3";
        $this->prepareData();
        return View("SecondView")
            ->with("tit",$title)
            ->with("msg",$message);
    }
    function prepareData()
    {
        $commonData = "this is my common data from prepare function";
        \View::share(["cdata"=>$commonData]);
    }


    function ViewCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        return View("ViewCustomer",["data"=>$customer]);
    }

    function listCustomer()
    {
        $customers = Customer::all();
        return View("listCustomer")->with("data",$customers);

    }

}
