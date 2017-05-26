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

Route::get('/inventory', function () {
    return view('inventory');
});

Route::get('/manteniments', function () {
        return view('manteniments');
});

Route::get('/providers', function () {
    return view('providers');
});

Route::get('/location', function () {
    return view('location');
});

Route::get('/material-type', function () {
    return view('material-type');
});

Route::get('/brand-model', function () {
    return view('brand-model');
});

Route::get('/brand', function () {
    return view('brand');
});

Route::get('/vue', function() {
  return view('vue');
});

Route::resource('inventory', 'InventoryController');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/vuejscrud', 'Inventory_Items@vueCrud');
    Route::resource('vueitems','Inventory_Items');
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
