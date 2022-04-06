<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\firstAPIController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get("data/{id?}",[firstAPIController::class,'getData']);
    });

//Route::get("data/{id?}",[firstAPIController::class,'getData']);
Route::post("add",[firstAPIController::class,'postData']);
Route::put("update",[firstAPIController::class,'putData']);
Route::get("search/{username}",[firstAPIController::class,'searchData']);
Route::delete("delete/{id}",[firstAPIController::class,'deleteData']);
Route::post("upload",[firstAPIController::class,'fileUpload']);
Route::post("validate",[firstAPIController::class,'validationData']);

Route::post("login",[UserController::class,'login']);
