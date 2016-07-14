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

Route::get('/', function () {
    return view('welcome');
});


// Admin Interface Routes
Route::group(['prefix' => 'admin', 'middleware' => 'myadmin'], function()
{
    Route::post('signup', 'Auth\AuthController@postAdminRegister');
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::get('dashboard', 'Admin\AdminController@index');
    CRUD::resource('tag', 'Admin\TagCrudController');

});

// Support Interface Routes
Route::group(['prefix' => 'support', 'middleware' => 'support'], function()
{
    Route::get('dashboard', function(){

        return 'Support Login Success, Its supports dashboard';

    });
    CRUD::resource('tag', 'Admin\TagCrudController');

});

Route::auth();
Route::get('/home', 'HomeController@index');

