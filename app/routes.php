<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::bind('tournament', function($key, $route)
{
	$tournament = Tournament::find($key);
	if($tournament == null)
	{
		App::abort(404);
	}
	else
	{
		return $tournament;
	}
});


Route::bind('round', function($key, $route)
{
	$round = Round::find($key);
	if($round == null)
	{
		App::abort(404);
	}
	else
	{
		return $round;
	}
});


Route::bind('report', function($key, $route)
{
	$report = Report::find($key);
	if($report == null)
	{
		App::abort(404);
	}
	else
	{
		return $report;
	}
});

Route::group(array('before' => 'auth'), function() {

	Route::get('logout', 'UsersController@logout');
	Route::get('tournaments/create', 'TournamentsController@getCreate');
	Route::get('tournaments/{tournament}/update', 'TournamentsController@getUpdate');
	Route::post('tournaments/{tournament}/update', 'TournamentsController@postUpdate');
	Route::get('tournaments/{tournament}/delete', 'TournamentsController@delete');

	Route::get('rounds/{tournament}/create', 'RoundsController@getCreate');
	Route::get('rounds/{round}/update', 'RoundsController@getUpdate');
	Route::post('rounds/{round}/update', 'RoundsController@postUpdate');
	Route::get('rounds/{round}/delete', 'RoundsController@delete');

	Route::get('reports/{report}/update', 'ReportsController@getUpdate');
	Route::post('reports/{report}/update', 'ReportsController@postUpdate');
	Route::get('reports/{report}/delete', 'ReportsController@delete');
});

Route::group(array('before' => 'guest'), function() {

	Route::get('signin', 'UsersController@getSignin');
	Route::post('signin', 'UsersController@postSignin');
	Route::get('login', 'UsersController@getLogin');
	Route::post('login', 'UsersController@postLogin');
});

Route::get('/', 'TournamentsController@listing');
Route::get('tournaments', 'TournamentsController@listing');
Route::get('tournaments/listing', 'TournamentsController@listing');
Route::get('tournaments/{tournament}', 'TournamentsController@show');

Route::get('validate/signin', 'ValidationsController@validateSignin');
Route::get('validate/login', 'ValidationsController@validateLogin');