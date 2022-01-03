<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Src\Application\Controllers\CustomerController;
use Src\Application\Controllers\HobbieController;
use Src\Application\Controllers\UserController;

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


Route::post('user/auth/login', [UserController::class, 'login']);


Route::get('customer/list', [CustomerController::class, 'index']);




Route::group(['middleware'=>['auth:api']],function(){

    Route::get('customer/{id}/show-hobbies', [HobbieController::class, 'show']);

    //--Rol admin required--
    Route::group(['middleware'=>['adminMiddleware:api']],function(){
        Route::post('customer/{id}/create-hobbie', [HobbieController::class, 'store']);
        Route::delete('customer/{id}/delete-hobbie/{hobbie_id}', [HobbieController::class, 'delete']);
        Route::put('customer/{id}/update-hobbie', [HobbieController::class, 'update']);

    });

});



