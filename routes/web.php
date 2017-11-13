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

Route::get('/vue', function () {
    return view('vue');
});

Route::resource('inventory', 'InventoryController');

Route::get('foo', function () {
    return 'Hello World';
});

Route::get('/mnt/provider/create', function () {
    return view('create');
});

Route::get('/test/datepicker', function () {
    return view('datepicker');
});

Route:: get('dashboard', function () {
    return view('dashboard');
});

Route::resource('mnt/provider', 'ProviderController');
Route::post('mnt/provider/search', 'ProviderController@search')->name('provider.search');

Route::resource('mnt/moneySource', 'MoneySourceController');
Route::post('mnt/moneySource/search', 'MoneySourceController@search')->name('moneySource.search');

Route::resource('mnt/location', 'LocationController');
Route::post('mnt/location/search', 'LocationController@search')->name('location.search');

Route::resource('mnt/brand', 'BrandController');
Route::post('mnt/brand/search', 'BrandController@search')->name('brand.search');

Route::resource('mnt/material_type', 'Material_TypeController');
Route::post('mnt/material_type/search', 'Material_TypeController@search')->name('material_type.search');

Route::resource('mnt/brand_model', 'Brand_ModelController');
Route::post('mnt/brand_model/search', 'Brand_ModelController@search')->name('brand_model.search');

Route::resource('inventory-mnt', 'InventoryController');
Route::post('inventory-mnt/search', 'InventoryController@search')->name('inventory.search');

Auth::routes();

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::get('app/public/', 'InventoryController@load');

Route::get('mnt-export', 'ExportController@index');
Route::post('mnt-export/search', 'ExportController@search')->name('export.search');
Route::post('mnt-export/excel', 'ExportController@exportExcel')->name('export.excel');
Route::post('mnt-export/pdf', 'ExportController@exportPDF')->name('export.pdf');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('tasks', 'DashboardController@tasks')->name('tasks');

Route::resource('/task', 'TaskController');

Route::get('/redirect', 'SocialAuthTwitterController@redirect');
Route::get('/callback', 'SocialAuthTwitterController@callback');

Route::group(['middleware' => 'web'], function () {
});
