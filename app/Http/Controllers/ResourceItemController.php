<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ResourceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Item::all();
        return View("listItemR",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View("addItemR");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Item::create($request->all());
        return redirect()->route("customItem.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Item::find($id);
        return View("showItemR")->with("item",$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Item::find($id);
        return View("editItemR")->with("item",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= Item::find($id);
        $data->fill($request->all());
        $data->save();

        return redirect()->route("customItem.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data= Item::find($id);
        $data->delete();
        return redirect()->route("customItem.index");
    }
}
