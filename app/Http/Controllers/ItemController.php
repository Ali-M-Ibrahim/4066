<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function list(){
        $data= Item::all();
        return View("listItem",compact("data"));
    }

    public function create(){
        return View("createItem");
    }
    public function store(Request $request){
        $obj = new Item();
        $obj->name= $request->item_name;
        $obj->description= $request->item_description;
        $obj->price= $request->item_price;
        $obj->save();
        return redirect()->route("list-item");

    }
    public function show($id){
        $obj = Item::find($id);
        return View("viewItem")->with("data",$obj);
    }
    public function delete($id){
        $obj = Item::find($id);
        $obj->delete();
        return redirect()->route("list-item");
    }

    public function edit($id){
        $obj = Item::find($id);
        return View("editItem",["data"=>$obj]);
    }

    public function update(Request $request,$id){
        $obj = Item::find($id);
        $obj->name= $request->item_name;
        $obj->description= $request->item_description;
        $obj->price= $request->item_price;
        $obj->save();
        return redirect()->route("list-item");
    }
}
