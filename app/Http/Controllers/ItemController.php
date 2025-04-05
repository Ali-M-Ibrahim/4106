<?php

namespace App\Http\Controllers;


use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function list(){
        // select * from items
        $items = Item::all();
        $message = "All Items data";
        return View("listItem",compact("items","message"));
    }
    public function add(){
        return View("addItem");
    }

    public function store(Request $request){
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
}
