<?php

namespace App\Http\Controllers;

use App\Models\Uni;
use App\Traits\APIResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UniController extends Controller
{
    use APIResponse;

    public function index(){
        $universities = Uni::all();
        return $this->sendSuccess("Uni retrieved successfully",$universities);
    }
    public function error(){
        return $this->sendError("validation error",[],Response::HTTP_SERVICE_UNAVAILABLE);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
        'name'=>'required'
        ]);

        if($validator->fails()){
            $error = $validator->errors();
            return $this->sendError("Validation Error",$error,Response::HTTP_BAD_REQUEST);
        }

        $uni = new Uni();
        $uni->name = $request->name;
        $uni->save();
        return $this->sendSuccess("Uni created successfully",null, Response::HTTP_CREATED);

    }

    public function show($id){
        $obj = Uni::find($id);
        if($obj==null){
            return $this->sendError("Uni not found",null, Response::HTTP_NOT_FOUND);
        }
        return $this->sendSuccess("uni retrived succesfully",$obj);
    }
}
