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
Route::get('/orders/select-vehicle/user/{user}', 'OrdersController@selectVehicle')->name('select-vehicle');
Route::get('/orders/select-vehicle/user/{user}/vehicle/{vehicle}', 'OrdersController@create')->name('add-order');

Route::resource('/orders', 'OrdersController');

Route::post('/user/register', 'ClientsController@store')->name('user-store');
Route::post('/vehicle/store', 'VehiclesController@store')->name('vehicle-store');
