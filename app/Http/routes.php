<?php

Route::resource('itemCRUD', 'ItemCRUDController');
Route::get('manage-vue', 'VueItemController@manageVue');
Route::resource('vueitems', 'VueItemController');

Route::get('linkedin', function () {

    return view('linkedinAuth');

});

Route::get('auth/linkedin', 'Auth\AuthController@redirectToLinkedin');

Route::get('auth/linkedin/callback', 'Auth\AuthController@handleLinkedinCallback');

Route::filter('forcehttps', function()
{
  if(!Request::secure())
  {
    return Redirect::secure(Request::getRequestUri(),301);
  }
});

Route::filter('forcehttp', function()
{
  $url = Request::url();
  if(Request::secure()){
    $url = str_replace('https://','http://',$url);
    return Redirect::to($url,301);
  }
});

Route::get('/', array('before'=>'forcehttp', function()
{
    return View::make('home');
}));

Route::get('/login/', array(
  'before'=>'forcehttps',
  'uses' => 'userController@login')
);
