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

Route::get('/show', 'SmartphoneController@getShowProperties');

Route::get('/shorten', function () {
    $longUrl = 'https://google.com';
    $shortUrl = Bitly::shorten($longUrl)['data']['url'];
    return View::make('smartphone.show', ['link' => $shortUrl]);
});

Route::get('/app', function () {
    $smartphone = app()->make('Smartphone');
});