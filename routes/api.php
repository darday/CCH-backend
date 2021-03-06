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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login','AuthController@login');
Route::post('register','AuthController@register');
Route::get('findUserById/{id}','UserController@findUserById');
//tours


Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('logout','AuthController@logout');
    Route::post('add-tour/','TourController@store');
});