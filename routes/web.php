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

Route::get('foo', function () {
    return 'Hello World';
});

Route::get('news', array('as' => 'news.index', 'uses' => 'NewsController@index'));
Route::get('news/add', array('as' => 'news.create', 'uses' => 'NewsController@create'));
Route::post('news/store', array('as' => 'news.store', 'uses' => 'NewsController@store'));
Route::get('news/edit/{id}', array('as' => 'news.edit', 'uses' => 'NewsController@edit'));
Route::patch('news/update/{id}', array('as' => 'news.update', 'uses' => 'NewsController@update'));
Route::delete('news/delete/{id}', array('as' => 'news.destroy', 'uses' => 'NewsController@destroy'));
Route::get('news/{slug}', array('as' => 'news.show', 'uses' => 'NewsController@show'));


Route::group(['middleware' => 'web'], function () {
Route::get('/vuejscrud', 'BlogController@vueCrud');
Route::resource('vueitems','BlogController');
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
