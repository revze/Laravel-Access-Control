<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',function(){
  return view('welcome');
});

Route::group(['prefix'=>'roles','middleware'=>'role:admin'],function(){
  Route::get('/','HomeController@index');
  Route::get('{id}/edit','HomeController@edit');
  Route::post('update','HomeController@update');
});

Route::group(['prefix'=>'categories'],function(){
  Route::get('/',['middleware'=>'permission:read-category','uses'=>function(){
    return 'read category';
  }]);
  Route::get('create',['middleware'=>'permission:create-category','uses'=>function(){
    return 'create category';
  }]);
  Route::get('edit',['middleware'=>'permission:edit-category','uses'=>function(){
    return 'edit category';
  }]);
  Route::get('delete',['middleware'=>'permission:delete-category','uses'=>function(){
    return 'delete category';
  }]);
});

Route::get('profile',['middleware'=>'permission:setting-profile','uses'=>function(){
  return 'setting profile';
}]);

Route::get('privacy-policy',['middleware'=>'permission:setting-privacy-policy','uses'=>function(){
  return 'setting privacy & policy';
}]);

Route::get('language',['middleware'=>'permission:setting-language','uses'=>function(){
  return 'setting language';
}]);

Route::auth();
