<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
//go to all_barbers page
Route::get('/all/barbers',"BarberController@all_barbers");

//go to add_barber page
Route::get('/add/barber',"BarberController@add_barber");

//go to add_new_barber
Route::post('/add/new/barber',"BarberController@add_new_barber");

//go to edit_barber page
Route::get('/edit/barber/{b_id}',"BarberController@edit_barber");

//go to update_barber
Route::post('/update/barber/{b_id}',"BarberController@update_barber");

//go to delete_barber
Route::get('/delete/barber/{b_id}',"BarberController@delete_barber");

///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////

//go to all_customers page
Route::get('/all/customers',"CustomerController@all_customers");

//go to add_customer page
Route::get('/add/customer',"CustomerController@add_customer");

//go to add_new_customer
Route::post('/add/new/customer',"CustomerController@add_new_customer");

//go to edit_customer page
Route::get('/edit/customer/{c_id}',"CustomerController@edit_customer");

//go to update_customer
Route::post('/update/customer/{c_id}',"CustomerController@update_customer");

//go to delete_customer
Route::get('/delete/customer/{c_id}',"CustomerController@delete_customer");

///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
