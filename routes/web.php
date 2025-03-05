<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\InvokableController;

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


Route::get("endpoint-6",function(){
   return ("hello i am endpoint 6");
});

Route::get('endpoint-7',function(){
    return response()
        ->json(["firstname"=>"ali","lastname"=>"ibrahim"])
        ->header('header1',123);
});

Route::get('endpoint-8/{id}',function($id){
    return "Hello the id is:" . $id;
});

Route::get('endppoint9/{id}/{name}',function($id, $name){
    return "Hello the id is:" . $id ." and the name is:" . $name;
});

Route::get('endpoint10/{id?}',function($id=0){
    return "Hello the id is:" . $id;
})->name('my-name-10');



// to create controller use:
// php artisan make:controller CONTROLLER_NAME
// Method 1 (recommended)
// dont forget to include the controller
// App\Http\Controllers\YOUR_CONTROLLER;
Route::get('function1',[FirstController::class,'f1'])->name('my-name-1');
Route::get('function2',[FirstController::class,'f2']);
Route::get('function3/{id}',[FirstController::class,'f3']);
Route::get('function4/{fname}/{lname}',[FirstController::class,'f4']);


//method 2
Route::get("method2","App\Http\Controllers\FirstController@f1")->name('my-name-2');;

//method 3
Route::get('method3',[
    'uses'=>"App\Http\Controllers\FirstController@f1",
    'as'=> "your_name"
]);

Route::post('post',[FirstController::class,'post']);
Route::put('put',[FirstController::class,'put']);




// to create a resource controller
// php artisan make:controller Controller_name --resource
Route::resource("my-resource",ResourceController::class);
Route::resource("my-resource2",ResourceController::class)
->only(['index','create']);
Route::resource("my-resource3",ResourceController::class)
    ->except(['index']);

// to create an api controller
// php artisan make:controller Controller_name --api
Route::apiResource("api",ApiController::class);

// to create an invokable controller
// php artisan make:controller Controller_name --invokable

Route::get('invokable',InvokableController::class);











