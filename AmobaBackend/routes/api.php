<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('error', function (Request $e) {
    return custom_response(false, $e->error);
})->name('error');

Route::middleware(['cors'])->group(function () {

    Route::post('login', 'AuthController@Login');

    Route::middleware('auth:api')->group(function () {
        Route::get('logout', 'AuthController@Logout');
        Route::get('/user', 'AuthController@user');
        Route::apiResource('persons', 'PersonController')->except([
            'update'
        ]);
        Route::post('persons/{person}', 'PersonController@update');
    });
});
