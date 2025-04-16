<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\InvokableController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemResourceController;

use App\Http\Controllers\ImageController;

use App\Http\Controllers\WebsiteController;



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




Route::get("create",[DataController::class,"create"]);
Route::get("getCustomerById/{id}",[DataController::class,"getCustomerById"]);
Route::get("getCredentialsById/{id}",[DataController::class,"getCredentialsById"]);
Route::get("create2",[DataController::class,"create2"]);
Route::get("getAccountById/{id}",[DataController::class,"getAccountById"]);
Route::get("create3",[DataController::class,"create3"]);
Route::get("getServiceById/{id}",[DataController::class,"getServiceById"]);
Route::get("getAllCustomers",[DataController::class,"getAllCustomers"]);

Route::get("getCustomerByIdOrFail/{id}",[DataController::class,"getCustomerByIdOrFail"]);
Route::get("getCustomerByIdOr/{id}",[DataController::class,"getCustomerByIdOr"]);
Route::get("getCustomerByAddress/{address}",[DataController::class,"getCustomerByAddress"]);
Route::get("getOneCustomerByAddress/{address}",[DataController::class,"getOneCustomerByAddress"]);
Route::get("getAccountsGT100",[DataController::class,"getAccountsGT100"]);
Route::get("getAccountsGT100or",[DataController::class,"getAccountsGT100or"]);
Route::get("getAccountsIn",[DataController::class,"getAccountsIn"]);
Route::get("getAccountsBetween",[DataController::class,"getAccountsBetween"]);
Route::get("getAliCustomer",[DataController::class,"getAliCustomer"]);
Route::get("getAllCustomerslimit2",[DataController::class,"getAllCustomerslimit2"]);
Route::get("getNameCustomers/{id}",[DataController::class,"getNameCustomers"]);
Route::get("getAliCustomer2/{name}",[DataController::class,"getAliCustomer2"]);
Route::get("getAccountsByBalance",[DataController::class,"getAccountsByBalance"]);

Route::get("mix",[DataController::class,"mix"]);
Route::get("statistics",[DataController::class,"statistics"]);



Route::get("createm1",[CrudController::class,"createm1"]);
Route::get("createm2",[CrudController::class,"createm2"]);
Route::post("createm3",[CrudController::class,"createm3"]);
Route::post("createm4",[CrudController::class,"createm4"]);

Route::get("updatem1",[CrudController::class,"updatem1"]);
Route::post("updatem2/{id}",[CrudController::class,"updatem2"]);
Route::get("massUpdate",[CrudController::class,"massUpdate"]);

Route::get("delete/{id}",[CrudController::class,"delete"]);
Route::get("massDelete",[CrudController::class,"massDelete"]);

Route::get("first-page",[FrontController::class,"index"]);
Route::get("second-page",[FrontController::class,"index2"]);

Route::get("list-customers",[FrontController::class,"listCustomers"]);

Route::get("view-customer/{id}",[FrontController::class,"viewCustomer"]);

Route::get("page1",[FrontController::class,"page1"]);
Route::get("page2",[FrontController::class,"page2"]);


Route::get("listItem",[ItemController::class, 'list'])
->name("list-item");
Route::get("createItem",
    [ItemController::class, 'create'])
    ->name("create-item");

Route::post("storeItem",[ItemController::class, 'store'])
    ->name("store-item");

Route::get("showItem/{id}",
    [ItemController::class, 'show'])
    ->name("show-item");


Route::get("deleteItem/{id}",
    [ItemController::class, 'delete'])
    ->name("delete-item");

Route::delete("deleteItem2/{id}",
    [ItemController::class, 'delete'])
    ->name("delete-item2");


Route::get("editItem/{id}",
    [ItemController::class, 'edit'])
    ->name("edit-item");

Route::put("updateItem/{id}",
    [ItemController::class, 'update'])
    ->name("update-item");


Route::resource("myitem",ItemResourceController::class);


Route::get("addImage",[ImageController::class,"add"]);
Route::post("addImage",[ImageController::class,"store"])->name("addImage");
Route::get("showImage/{id}",[ImageController::class,'display'])->name("displayImage");


Route::get("about",[WebsiteController::class,'about']);
Route::get("contact",[WebsiteController::class,'contact']);



Route::get("register",[AuthController::class,"register"]);
Route::get("login",[AuthController::class,"login"])->name("login");
Route::post("login",[AuthController::class,"dologin"])->name("dologin");
Route::get("ViewUser",[AuthController::class,"ViewUser"])->name("viewuser");
Route::get("logout",[AuthController::class,"logout"])->name("logout");

Route::get("onlyConnected",function(){
   return "connected user";
})->middleware("checkauth");



Route::middleware(['checkauth'])->group(function () {
    Route::get('onlyConnected2', function () {
        return "connected user";
    });
    Route::get('/onlyConnected3', function () {
        return "connected user";
    });
});
