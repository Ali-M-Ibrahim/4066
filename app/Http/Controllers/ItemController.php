<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class ItemController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            'checkadmin',
        ];
    }
    public function list(){

        $hash = Hash::make("123");
//        $check = Hash::check("1223", $hash);
        return $hash;

        $data= Item::all();
        return View("listItem",compact("data"));
    }

    public function create(){
        return View("createItem");
    }
    public function store(Request $request){

        $request->validate([
            "item_name"=>"required|min:3|max:6|unique:items,name|regex:/[a-z]/|regex:/[A-Z]/",
            "item_description"=>"required",
//            "item_price"=>"required|confirmed"
            "item_price"=>"required|same:item_price_confirmation"
        ],
        [
            'required'=>"Please FILL THIS INPUT: :attribute"
        ]);





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
