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

Route::get('/', 'StadisticsController@index')->name('home');

Route::resource('/clients', 'ClientsController');
Route::resource('/products', 'ProductsController');
Route::resource('/services', 'ServicesController');
Route::resource('/configurations', 'ConfigurationsController');
Route::resource('/stadistics', 'StadisticsController');

Route::get('/orders/select-client', 'OrdersController@selectClient')->name('select-client');
Route::get('/orders/select-vehicle/user/{user}', 'OrdersController@selectVehicle')->name('select-vehicle');
Route::get('/orders/select-vehicle/user/{user}/vehicle/{vehicle}', 'OrdersController@create')->name('add-order');
Route::get('/orders/pdf/{id}', 'OrdersController@pdf')->name('order-pdf');
Route::post('/orders/work/', 'OrdersController@printWorkPaper')->name('print-work-paper');
Route::post('add-ajax', ['as'=>'add-ajax','uses'=>'OrdersController@addAjax']);
Route::post('remove-ajax', ['as'=>'remove-ajax','uses'=>'OrdersController@removeAjax']);

Route::resource('/orders', 'OrdersController');

Route::post('/user/register', 'ClientsController@store')->name('user-store');
Route::post('/user/save', 'ClientsController@save')->name('user-save');

Route::post('/vehicle/store', 'VehiclesController@store')->name('vehicle-store');
