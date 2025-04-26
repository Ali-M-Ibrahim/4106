<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\InvokableController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ResourceItemController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\WebsiteController;







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





Route::get('endpoint-5',function(){
   return "hello i am endpoint number 5";
});

Route::get('endpoint-6',function(){
   return response()->json(["firstname"=>"joe","Lastname"=>"Doe"])
   ->header('header1',123);
});

Route::get('endpoint-7/{id}',function($id){
    return "The parameter is: " . $id;
});

Route::get('endpoint-8/{id}/{name}',function($id,$name){
    return "The Id is: " . $id ." and the name is: " . $name;
});

Route::get('endpoint-9',function(){
    return "this is a test";
})->name('name-route');

Route::get('endpoint-10/{id?}',function($id=0123){
  return "The value of the id is:" . $id;
});


Route::get('f2',[FirstController::class,"f2"]);
Route::get('f3/{id}',[FirstController::class,"f3"]);
Route::get('f4/{name}/{id?}',[FirstController::class,"f4"])->name('function-4');


//method number 1 (recommended)
Route::get('function1',[FirstController::Class,"f1"])->name('raed-name');

//method number 2
Route::get('ff1', "App\Http\Controllers\FirstController@f1")->name('route-name-ff-1');
Route::get('ff2', "App\Http\Controllers\FirstController@f2");

//method number 3
Route::get("fff1",[
    'uses'=> "App\Http\Controllers\FirstController@f1",
    'as'=>"fff1"
]);


Route::resource('customroute',ResourceController::class);
Route::apiResource('myapi',ApiController::class);
Route::get('invoke',InvokableController::class);
Route::resource('resource',ResourceController::class)->only(['index','create']);
Route::resource('resource2',ResourceController::class)->except(['index']);
Route::post('first-post',[FirstController::class,'post']);


Route::get("create",[DataController::class,"create"]);
Route::get("getCustomerById/{id}",[DataController::class,"getCustomerById"]);
Route::get("getCredentialById/{id}",[DataController::class,"getCredentialById"]);
Route::get("create2",[DataController::class,"create2"]);
Route::get("getAccountById/{id}",[DataController::class,"getAccountById"]);
Route::get("create3",[DataController::class,"create3"]);

Route::get("getServiceById/{id}",[DataController::class,"getServiceById"]);

Route::get("getAllCustomers",[DataController::class,"getAllCustomers"]);
Route::get("getCustomerByIdOrFail/{id}",[DataController::class,"getCustomerByIdOrFail"]);
Route::get("getCustomerByIdOr/{id}",[DataController::class,"getCustomerByIdOr"]);
Route::get("getAllCustomersByAddress/{address}",[DataController::class,"getAllCustomersByAddress"]);

Route::get("getOneCustomerByAddress/{address}",[DataController::class,"getOneCustomerByAddress"]);

Route::get("getCustomersInBeirutAndDob",[DataController::class,"getCustomersInBeirutAndDob"]);
Route::get("getCustomersInBeirutOrDob",[DataController::class,"getCustomersInBeirutOrDob"]);

Route::get("getCustomerByAccount",[DataController::class,"getCustomerByAccount"]);

Route::get("getCustomerByAccount2",[DataController::class,"getCustomerByAccount2"]);
Route::get("getCustomerLike",[DataController::class,"getCustomerLike"]);

Route::get("getCustomerIn",[DataController::class,"getCustomerIn"]);

Route::get("getCustomerBetween",[DataController::class,"getCustomerBetween"]);

Route::get("getCustomerLimit",[DataController::class,"getCustomerLimit"]);
Route::get("getNameDobCustomers",[DataController::class,"getNameDobCustomers"]);
Route::get("getCustomersOrdered",[DataController::class,"getCustomersOrdered"]);

Route::get("mix",[DataController::class,"mix"]);

Route::get("statistics",[DataController::class,"statistics"]);
Route::get("join",[DataController::class,"join"]);


Route::get('createm1',[CrudController::class,"createm1"]);
Route::get('createm2',[CrudController::class,"createm2"]);
Route::post('createm3',[CrudController::class,"createm3"]);
Route::post('createm4',[CrudController::class,"createm4"]);
Route::get('createm5',[CrudController::class,"createm5"]);

Route::get('updatem1/{id}',[CrudController::class,"updatem1"]);
Route::put('updatem2/{id}',[CrudController::class,"updatem2"]);
Route::put('updatem3/{id}',[CrudController::class,"updatem3"]);
Route::get('massUpdate',[CrudController::class,"massUpdate"]);

Route::get('delete/{id}',[CrudController::class,"delete"]);
Route::get('massDelete',[CrudController::class,"massDelete"]);



Route::get('first-view',[FrontController::class,"index"]);

Route::get('second-view',[FrontController::class,"index2"]);

Route::get('ViewCustomer/{id}',[FrontController::class,"ViewCustomer"]);
Route::get('listCustomer',[FrontController::class,"listCustomer"]);


Route::get("list-item",[ItemController::class,"list"])
->name("listItems");
Route::get("addItem",[ItemController::class,"add"])
    ->name("add-item");
Route::post("saveItem",[ItemController::class,"store"])
    ->name("save-item");
Route::get("showItem/{id}",[ItemController::class,"show"])
    ->name("show-item");
Route::get("deleteItem/{id}",[ItemController::class,"delete"])
    ->name("delete-item");
Route::delete("deleteItem2/{id}",[ItemController::class,"delete"])
    ->name("deleteitem");
Route::get("editItem/{id}",[ItemController::class,"edit"])
    ->name("edit-item");
Route::put("updateItem/{id}",[ItemController::class,"update"])
    ->name("update-item");



Route::resource("customItem",ResourceItemController::class);


Route::get("addImage",[ImageController::class,"add"])->middleware("check");
Route::get("displayImage/{id}",[ImageController::class,"displayImage"])->name("displayImage");
Route::post("saveImage",[ImageController::class,"save"])->name("saveImage");

Route::get("about",[WebsiteController::class,"about"]);
Route::get("contact",[WebsiteController::class,"contact"]);


Route::get("register",[AuthController::class, "register"]);
Route::get("login",[AuthController::class, "login"])->name("login");
Route::post("authenticate",[AuthController::class, "authenticate"])->name("authenticate");
Route::get("showUser",[AuthController::class, "showUser"]);
Route::get("logout",[AuthController::class, "logout"])->name("logout");


Route::middleware(['check'])->group(function () {
    Route::get('/check1', function () {
        return "check 1";
    });
    Route::get('check2', function () {
        return "check 2";
    });
});
