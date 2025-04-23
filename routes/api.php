<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\UniApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//api/user
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post("login",[AuthApiController::class,'login'])
->name("login");
Route::post("register",[AuthApiController::class,'register']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get("all-uni",[UniApiController::class,"index"]);
    Route::post("save-uni",[UniApiController::class,"store"]);
    Route::get("show-uni/{id}",[UniApiController::class,"show"]);
    Route::put("update-uni/{id}",[UniApiController::class,"update"]);
    Route::delete("delete-uni/{id}",[UniApiController::class,"delete"]);
});
