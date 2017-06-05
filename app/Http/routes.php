<?php

Route::resource('itemCRUD', 'ItemCRUDController');
Route::get('manage-vue', 'VueItemController@manageVue');
Route::resource('vueitems', 'VueItemController');
