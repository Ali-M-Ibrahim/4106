<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function createm1(){
        $obj = new Customer();
        $obj->name = "Joe Doe";
        $obj->address = "Beirut, Lebanon";
        $obj->dob = "2025-01-01";
        $obj->save();
        return "ok data created using method 1";
    }
    public function createm2(){
        Customer::create([
            "name"=>"Joe Doe 2",
            "address"=>"Baabda,Lebanon",
            "dob"=>"2025-01-01"
        ]);
        return "ok data created using method 2";
    }
    public function createm3(Request $request){
        $name = $request->name;
        $address= $request->input("address","Default value");
        $dob = $request->dob;

        $obj =  new Customer();
        $obj->name = $name;
        $obj->address=$address;
        $obj->dob= $dob;
        $obj->save();

        Customer::create([
            "name"=>$request->name,
            "address"=>$request->address,
            "dob"=>$request->dob
        ]);
        return "ok data created using post";
    }
    public function createm4(Request $request){
        Customer::create($request->all());
        return "ok created using method 4";
    }
    public function createm5(){
        Customer::insert([
            "name"=>"Joe Doe 5",
            "address"=>"Alay, Lebanon",
            "dob"=>"2022-01-01"
        ]);
        return "ok data created using method 5";
    }

    public function updatem1($id)
    {
        $obj = Customer::find($id);
        $obj->name = "Joe Doe Updated";
        $obj->address = "Jounieh, Lebanon Updated";
        $obj->dob = "2020-01-01";
        $obj->save();
        return "ok data updated successfully";
    }
    public function updatem2(Request $request,$id){
        $obj = Customer::find($id);
        $obj->name= $request->name;
        $obj->address = $request->address;
        $obj->dob = $request->dob;
        $obj->save();
        return "ok data updated successfully";
    }
    public function updatem3(Request $request,$id){
        $obj = Customer::find($id);
        $obj->fill($request->all());
        if($obj->isClean()){
            return "data not changed! please input new values";
        }
        $obj->save();
        return "ok data updated using fill";
    }
    public function massUpdate(){
        Customer::where("dob","2025-01-01")
            ->update(["name"=>"Mass update","address"=>"Mass Update"]);
        return "ok data updated";
    }

    public function delete($id){
        $obj = Customer::findOrFail($id);
        $obj->delete();
        return "ok data deleted";
    }

    public function massDelete(){
        Customer::where("dob","2025-01-01")->delete();
        return "ok deleted";
    }

}
