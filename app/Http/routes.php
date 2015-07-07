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
Route::get('/', function () {
	return view('hello');
});
Route::get('book/drop/{id}', 'BookController@drop');
Route::get('book/drop/{id}', 'BookController@drop');
Route::get('user/add_book/{id}', 'UserController@add_book');
Route::post('user/save_book/{id}', 'UserController@save_book');
Route::resource('user', 'UserController');
Route::resource('book', 'BookController');