<?php

namespace App\Http\Controllers;

use App\Http\Resources\UniResource;
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
        $content = UniResource::collection($universities);
        return $this->sendSuccess("Uni retrieved successfully",$content);
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
        $content = new UniResource($obj);
        return $this->sendSuccess("uni retrived succesfully",$content);
    }

    public function update($id, Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required'
        ]);
        if($validator->fails()){
            $error = $validator->errors();
            return $this->sendError("Validation Error",$error,Response::HTTP_BAD_REQUEST);
        }
        $uni = Uni::find($id);
        if($uni==null){
            return $this->sendError("Uni not found",null, Response::HTTP_NOT_FOUND);
        }
        $uni->name = $request->name;
        $uni->save();
        return $this->sendSuccess("uni updated successfully",null);
    }

    public function delete($id){
        $uni = Uni::find($id);
        if($uni==null){
            return $this->sendError("Uni not found",null, Response::HTTP_NOT_FOUND);
        }
        $uni->delete();
        return $this->sendSuccess("uni deleted successfully",null);

    }
}
