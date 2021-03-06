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
    return view('auth.login');
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::get('/register', function () {
    return abort(404);
});

Auth::routes();

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/', 'StadisticsController@index')->name('home');

    Route::resource('/clients', 'ClientsController');
    Route::resource('/products', 'ProductsController');
    Route::get('/product/historic', 'ProductsController@historic')->name('products.historic');

    Route::resource('/services', 'ServicesController');
    Route::resource('/configurations', 'ConfigurationsController');

    Route::get('/expenses-resume', 'ExpensesController@resume')->name('expenses-resume');
    Route::post('/expenses-search', 'ExpensesController@expensesSearch')->name('expenses.search');
    Route::resource('/expenses', 'ExpensesController');

    Route::get('/fixed-expenses/close', 'FixedExpensesController@closeMonth')->name('close-month');
    Route::post('/fixed-expenses/close', 'FixedExpensesController@closeMonth')->name('close-month');
    Route::resource('/fixed-expenses', 'FixedExpensesController');

    // Route::resource('/stadistics', 'StadisticsController');
    Route::resource('/product/categories', 'ProductCategoriesController');

    Route::resource('/vehicles', 'VehiclesController');
    Route::post('/vehicle/vehicle-select/{order?}/{user?}', 'VehiclesController@vehicleStore')->name('vehicle-select');

    Route::post('select-brands-ajax', 'OrdersController@selectBrandsAjax')->name('select-brands-ajax');
//    Route::post('select-category-ajax', 'OrdersController@selectCategoriesAjax')->name('select-brands-ajax');
    Route::post('select-models-ajax', 'OrdersController@selectModelsAjax')->name('select-models-ajax');
    Route::get('/orders/select-client', 'OrdersController@selectClient')->name('select-client');
    Route::get('/orders/select-vehicle/user/{user}', 'OrdersController@selectVehicle')->name('select-vehicle');
    Route::get('/orders/select-vehicle/user/{user}/vehicle/{vehicle}', 'OrdersController@create')->name('add-order');
    Route::get('/orders/pdf/{id}', 'OrdersController@pdf')->name('order-pdf');
    Route::post('/orders/work/', 'OrdersController@printWorkPaper')->name('print-work-paper');
    Route::get('/orders/{id}/change-user', 'OrdersController@selectClientToChange')->name('select-change-client');
    Route::get('/orders/{id}/change-user/{user}', 'OrdersController@changeClient')->name('change-client');
    Route::get('/orders/open/{id}', 'OrdersController@openOrder')->name('open-order');
    Route::post('add-ajax', ['as' => 'add-ajax', 'uses' => 'OrdersController@addAjax']);
    Route::post('remove-ajax', ['as' => 'remove-ajax', 'uses' => 'OrdersController@removeAjax']);

    //Duplicate order
    Route::get('/orders/duplicate/{order}/select-client', 'OrdersController@duplicateSelectClient')->name('duplicate-select-client');
    Route::get('/orders/duplicate/{order}/user/{user}/select-vehicle/', 'OrdersController@duplicateSelectVehicle')->name('duplicate-select-vehicle');
    Route::get('/orders/duplicate/{order}/user/{user}/select-vehicle/{vehicle}', 'OrdersController@duplicateOrder')->name('duplicate-order');

    //End duplicate order

    Route::get('/orders/resumen', 'OrdersController@resume')->name('orders.resume');
    Route::get('/orders/ultimos', 'OrdersController@lasts')->name('orders.lasts');
    Route::get('/orders/plantillas', 'OrdersController@plantillas')->name('orders.plantillas');
    Route::get('/orders/express/', 'OrdersController@express')->name('add-order-express');
    Route::resource('/orders', 'OrdersController');

    Route::post('/user/register/{order?}', 'ClientsController@store')->name('user-store');
    Route::post('/user/save', 'ClientsController@save')->name('user-save');

    //Emails
    Route::get('/email/order/{id}', 'EmailsController@sendOrderByEmail')->name('email-order');
    //Route::get('/email/order/{id}/', 'EmailsController@sendOrderByEmail')->name('email-order-client');

    //Deudas por cobrar
    Route::get('/debts/', 'DebtsController@index')->name('debts.index');

    //Stadistics
    Route::get('/stadistics', 'StadisticsController@index')->name('stadistics.index');
    Route::post('/stadistics', 'StadisticsController@store')->name('stadistics.store');
    Route::get('/stadistics/searcher', 'StadisticsController@searcher')->name('stadistics.searcher');
    Route::post('/stadistics/search', 'StadisticsController@search')->name('stadistics.search');
    Route::get('/stadistics/stock', 'StadisticsController@lowStock')->name('stadistics.stock');
    Route::get('/stadistics/demand', 'StadisticsController@demand')->name('stadistics.demand');
    Route::get('/stadistics/demand', 'StadisticsController@budget')->name('stadistics.budget');

    Route::get('/export', 'ExportController@export')->name('stadistics.export');
    Route::get('/export/orders', 'ExportController@exportOrders')->name('export.orders');
    Route::get('/export/products', 'ExportController@exportProducts')->name('export.products');
    Route::get('/export/vehicles', 'ExportController@exportVehicles')->name('export.vehicles');
    Route::get('/export/clients', 'ExportController@exportClients')->name('export.clients');
    Route::get('/export/services', 'ExportController@exportServices')->name('export.services');
    Route::get('/export/debts', 'ExportController@exportDebts')->name('export.debts');
    Route::get('/export/all', 'ExportController@exportAll')->name('export.all');

    Route::resource('/users', 'UsersController');
    Route::post('/users/store-admin', 'UsersController@storeAdmin')->name('users.store.admin');

    Route::get('/maintenances', 'MaintenancesController@index')->name('maintenances.index');
    Route::post('/maintenances', 'MaintenancesController@send')->name('maintenances.send');

    Route::get('/standards/activate', 'StandardsController@index')->name('standards.index');
    Route::get('/standards/express', 'StandardsController@express')->name('standards.express');
    Route::get('/standards/expressComma', 'StandardsController@expressComma')->name('standards.expressComma');

});