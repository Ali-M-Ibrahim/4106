<?php

use App\Http\Controllers\AuthApiController;
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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get("uni",[UniController::class,'index']);
    Route::get("error",[UniController::class,'error']);
    Route::post("save-uni",[UniController::class,'store']);
    Route::get("show-uni/{id}",[UniController::class,'show']);
    Route::put("update-uni/{id}",[UniController::class,'update']);
    Route::delete("delete-uni/{id}",[UniController::class,'delete']);
});




Route::post("login",[AuthApiController::class,'login'])->name("login");
Route::post("register",[AuthApiController::class,'register'])->name("register");
