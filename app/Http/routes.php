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
use App\Binary\Smartphone\ISmartphone;
Route::get('as/', function () {
    return view('welcome');
});

//Route::get('/phone', 'SmartphoneController@getShowProperties');

Route::get('/shorten', function () {
	$link = 'https://google.com';
	$shortUrl = Bitly::shorten($link)['data']['url'];
    return view('shorten', ['url' => $shortUrl]);
});

Route::get('/phone', function () {
    $smartphone = app()->make('CustomSmartphone');
    return view('smartphone.show', ['smartphone' => (string)$smartphone]);
});

Route::get('/phone_another', 'SmartphoneController@getShowProperties');
