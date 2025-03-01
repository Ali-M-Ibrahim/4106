<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('first-endpoint',function(){
    return "Hello I am your first endpoint";
});

Route::get('second-endpoint',function(){
   return 12+8;
});

Route::get('json-endpoint',function(){
   return response()->json(['firstname'=>'Ali','lastname'=>'Ibrahim']) ;
});

Route::get('json-header',function(){
   return response()->json(["message"=>"check headers"])
   ->header('header1',123);
});

Route::get('json-header2',function(){
    return response()->json(["message"=>"check headers"])
        ->header('header1',123)
        ->header('header2',456)
        ->header('header3',789);
});


Route::get('json-header3',function(){
    return response()->json(["message"=>"check headers"])
        ->withHeaders([
            'header1'=>'123',
            'header2'=>'456'
        ]);
});










