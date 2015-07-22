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

Route::get('/mission/{id}/members', 'MissionController@getMembers');
Route::get('/mission/{id}/goals', 'MissionController@getGoals');
Route::post('/mission/{id}/member', 'MissionController@postMember');
Route::post('/mission/{id}/goal', 'MissionController@postGoal');
Route::put('/mission/{id}', 'MissionController@putStatusMission');


Route::resource('mission', 'MissionController');
Route::resource('member', 'MemberController');
Route::resource('goal', 'GoalController');
