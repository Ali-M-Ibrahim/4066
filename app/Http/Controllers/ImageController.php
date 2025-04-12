<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function add(){
        return View("addImage");
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'mimetypes:png'
        ]);

        if($request->hasFile("image")){
            $file = $request->file("image");
            $name = $file->getClientOriginalName();
            //to save in public folder
            $path = $file->store("method3",'public');
            $img = new Image();
            $img->name=$name;
            $img->path = "storage/".$path;
            $img->save();
        }else{
            return "no image provided";
        }

        return redirect()->route("displayImage",["id"=>$img->id]);
    }

    public function storeInStorage(Request $request){
        if($request->hasFile("image")){
            $file = $request->file("image");
            $name = $file->getClientOriginalName();
            $newName = time() ."-".$name;
            //to save in public folder
            $file->storeAs("method2",$newName,'public');
            $img = new Image();
            $img->name=$name;
            $img->path = "storage/method2/".$newName;
            $img->save();
        }else{
            return "no image provided";
        }

        return redirect()->route("displayImage",["id"=>$img->id]);
    }


    public function storeInPublic(Request $request){
        if($request->hasFile("image")){
            $file = $request->file("image");
            $name = $file->getClientOriginalName();
            $newName = time() ."-".$name;
            //to save in public folder
            $file->move("method1",$newName);
            $img = new Image();
            $img->name=$name;
            $img->path = "method1/".$newName;
            $img->save();
        }else{
            return "no image provided";
        }

        return redirect()->route("displayImage",["id"=>$img->id]);
    }
    public function storeUrl(Request $request){
        $img = new Image();
        $img->name="image 1";
        $img->path = $request->image;
        $img->save();
        return redirect()->route("displayImage",["id"=>$img->id]);
    }

    public function display($id){
        $data = Image::find($id);
        return View("showImage",compact('data'));
    }
}
