<?php

namespace App\Http\Controllers;


use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class ItemController extends Controller  implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'admin',

        ];
    }
    public function list(){
        $hash = Hash::make("123");
        $checking = Hash::check("1423",$hash);
        // select * from items
        $items = Item::all();
        $message = "All Items data";
        return View("listItem",compact("items","message"));
    }
    public function add(){
        return View("addItem");
    }
    public function store(Request $request){

        $request->validate([
            'item_name'=>'required|min:3|max:6|unique:items,name',
            'item_description'=>'required|regex:/[a-z]/|regex:/[A-Z]/',
//            'item_price'=>'required|numeric|lt:100|confirmed'
            'item_price'=>'required|numeric|lt:100|same:item_price_confirmation'
        ],
        [
            'required'=>"the :attribute must be added for jobran"
        ]);


//        $validator = Validator::make($request->all(), [
//            'item_name' => 'required|min:3|max:255'
//        ]);
//
//        if ($validator->fails()) {
//        return "this is a custom treatment for jobran";
//        }
        $obj = new Item();
         $obj->name= $request->item_name;
         $obj->price= $request->item_price;
        $obj->description= $request->item_description;
        $obj->save();
        return redirect()->route("listItems");
    }
    public function show($id){
        // select * from items where id=?
        $item = Item::findOrFail($id);
        return View("showItem")->with("item",$item);
    }

    public function delete($id){
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route("listItems");
    }

    public function edit($id){
        $item = Item::find($id);
        return View("editItem",["item"=>$item]);
    }

    public function update(Request $request,$id){
        $obj = Item::find($id);
        $obj->name= $request->item_name;
        $obj->price= $request->item_price;
        $obj->description= $request->item_description;
        $obj->save();
        return redirect()->route("listItems");
    }


}
