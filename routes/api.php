<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/login/customer',"Api\CustomerController@login_customer");
Route::post('/register/customer',"Api\CustomerController@register_customer");
Route::post('/logout/customer',"Api\CustomerController@logout_customer");
Route::post('/show/barbersList',"Api\CustomerController@show_customer_list");
Route::post('/like/barberShop',"Api\CustomerController@like_barber_shop");

//solvingProblem
Route::post('/solving/problem',"Api\CustomerController@solvingProblem");
