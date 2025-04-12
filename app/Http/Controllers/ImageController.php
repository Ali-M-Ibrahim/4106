<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function add(){
        return View("addImage");
    }


    public function save(Request $request){

        if($request->hasFile("image")){
            $imageName = $request->file("image")->getClientOriginalName();
            $newName= time() . "-" . $imageName;
            $request->file("image")->storeAs(
                "method2",
                $newName,
                'private'
            );

            $img = new Image();
            $img->name = "Image 1";
            $img->path = "storage/method2/".$newName;
            $img->save();
            return redirect()->route("displayImage",['id'=>$img->id]);
        }else{
            return "no image";
        }


    }

    public function saveRandomName(Request $request){

        if($request->hasFile("image")){
            $imageName = $request->file("image")->getClientOriginalName();
           $path =  $request->file("image")->store(
                "method3",
                'public'
            );

            $img = new Image();
            $img->name = $imageName;
            $img->path = "storage/".$path;
            $img->save();
            return redirect()->route("displayImage",['id'=>$img->id]);
        }else{
            return "no image";
        }


    }


    public function saveInPublic(Request $request){

        if($request->hasFile("image")){
            $imageName = $request->file("image")->getClientOriginalName();
            $newName= time() . "-" . $imageName;
            $request->file("image")->move("method1",$newName);

            $img = new Image();
            $img->name = "Image 1";
            $img->path = "method1/".$newName;
            $img->save();
            return redirect()->route("displayImage",['id'=>$img->id]);
        }else{
            return "no image";
        }


    }
    public function saveUrl(Request $request){
        $img = new Image();
        $img->name = "Image 1";
        $img->path = $request->image;
        $img->save();
        return redirect()->route("displayImage",['id'=>$img->id]);
    }

    public function displayImage($id){
        $data = Image::find($id);
        return View("displayImage",compact('data'));
    }
}
