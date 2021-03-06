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


Route::bind('map', function($key, $route)
{
	$round = Map::find($key);
	if($round == null)
	{
		App::abort(404);
	}
	else
	{
		return $round;
	}
});


Route::bind('scenario', function($key, $route)
{
	$round = Scenario::find($key);
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
	Route::post('tournaments/create', 'TournamentsController@postCreate');
	Route::post('tournaments/{tournament}/update', 'TournamentsController@postUpdate');
	Route::get('tournaments/{tournament}/delete', 'TournamentsController@delete');
	
	Route::get('maps', 'MapsController@listing');
	Route::get('maps/create', 'MapsController@getCreate');
	Route::post('maps/create', 'MapsController@postCreate');
	Route::get('maps/{map}/update', 'MapsController@getUpdate');
	Route::post('maps/{map}/update', 'MapsController@postUpdate');
	Route::get('maps/{map}/delete', 'MapsController@delete');

	Route::get('rounds/{tournament}/create', 'RoundsController@getCreate');
	Route::post('rounds/{tournament}/create', 'RoundsController@postCreate');
	Route::get('rounds/{round}/update', 'RoundsController@getUpdate');
	Route::post('rounds/{round}/update', 'RoundsController@postUpdate');
	Route::get('rounds/{round}/delete', 'RoundsController@delete');
	
	Route::get('scenarii', 'ScenariiController@listing');
	Route::get('scenarii/create', 'ScenariiController@getCreate');
	Route::post('scenarii/create', 'ScenariiController@postCreate');
// 	Route::get('scenarii/{scenario}/delete', 'ScenariiController@delete');

	Route::post('reports/update', 'ReportsController@postUpdate');
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
Route::get('tournaments/continuous', 'TournamentsController@continuous');
Route::get('tournaments/{tournament}', 'TournamentsController@show');

Route::get('validate/signin', 'ValidationsController@validateSignin');
Route::get('validate/login', 'ValidationsController@validateLogin');