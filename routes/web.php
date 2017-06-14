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

Route::resource('/products', 'ProductsController');
Route::resource('/services', 'ServicesController');

Route::get('/orders/select-client', 'OrdersController@selectClient')->name('select-client');
Route::get('/orders/select-vehicle/{id}', 'OrdersController@selectVehicle')->name('select-vehicle');

Route::resource('/orders', 'OrdersController');