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
*
*/


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



Route::get('home/', 'UserController@index');
Route::get('login/{provider?}', 'Auth\AuthController@login');
Route::get('/user/signout', 'UserController@getSignout');
Route::get('book/drop/{id}', 'BookController@drop');
Route::get('book/drop/{id}', 'BookController@drop');
Route::get('user/add_book/{id}', 'UserController@add_book');
Route::post('user/save_book/{id}', 'UserController@save_book');

Route::get('/', function(){
	return view('hello');
});

Route::resource('user', 'UserController');
Route::resource('book', 'BookController');


