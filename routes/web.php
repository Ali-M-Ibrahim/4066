<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('first-endpoint',function(){
   return "Hello I am your first end point";
});

Route::get('second-endpoint',function(){
   return 5+8;
});

Route::get('third-endpoint',function(){
   return response()->json(["firstname"=>"Ali","lastname"=>"Ibrahim"]);
});

Route::get('fourth-endpoint',function(){
   return response()->json(["message"=>"Check headers"])
   ->header('header1',123)
   ->header('header2',456);
});

Route::get('endpoint-5',function(){
    return response()->json(["message"=>"Check headers"])
        ->withHeaders([
            'header1'=>"new header",
            'header2'=>"header 2"
        ]);
});














