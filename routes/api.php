<?php

use App\Http\Controllers\UniController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("test",function (){
    return response()->json(["message"=>"my message"]);
});

Route::post("testpost",function (){
   return "i am post function";
});


Route::get("uni",[UniController::class,'index']);
Route::get("error",[UniController::class,'error']);
Route::post("save-uni",[UniController::class,'store']);
Route::get("show-uni/{id}",[UniController::class,'show']);
