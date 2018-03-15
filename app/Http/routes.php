<?php

Route::resource('itemCRUD', 'ItemCRUDController');
Route::get('manage-vue', 'VueItemController@manageVue');
Route::resource('vueitems', 'VueItemController');

Route::get('linkedin', function () {

    return view('linkedinAuth');

});

Route::get('auth/linkedin', 'Auth\AuthController@redirectToLinkedin');

Route::get('auth/linkedin/callback', 'Auth\AuthController@handleLinkedinCallback');
