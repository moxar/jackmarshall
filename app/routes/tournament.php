<?php

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

	Route::get('logout', 'Tournament\UsersController@logout');
	Route::get('tournaments/create', 'Tournament\TournamentsController@getCreate');
	Route::post('tournaments/create', 'Tournament\TournamentsController@postCreate');
	Route::get('tournaments/{tournament}/update', 'Tournament\TournamentsController@getUpdate');
	Route::post('tournaments/{tournament}/update', 'Tournament\TournamentsController@postUpdate');
	Route::get('tournaments/{tournament}/delete', 'Tournament\TournamentsController@delete');

	Route::get('rounds/{tournament}/create', 'Tournament\RoundsController@getCreate');
	Route::post('rounds/{tournament}/create', 'Tournament\RoundsController@postCreate');
	Route::get('rounds/{round}/update', 'Tournament\RoundsController@getUpdate');
	Route::post('rounds/{round}/update', 'Tournament\RoundsController@postUpdate');
	Route::get('rounds/{round}/delete', 'Tournament\RoundsController@delete');

	Route::get('reports/{report}/update', 'Tournament\ReportsController@getUpdate');
	Route::post('reports/{report}/update', 'Tournament\ReportsController@postUpdate');
	Route::get('reports/{report}/delete', 'Tournament\ReportsController@delete');
});

Route::group(array('before' => 'guest'), function() {

	Route::get('signin', 'Tournament\UsersController@getSignin');
	Route::post('signin', 'Tournament\UsersController@postSignin');
	Route::get('login', 'Tournament\UsersController@getLogin');
	Route::post('login', 'Tournament\UsersController@postLogin');
});

Route::get('/', 'Tournament\TournamentsController@listing');
Route::get('tournaments', 'Tournament\TournamentsController@listing');
Route::get('tournaments/listing', 'Tournament\TournamentsController@listing');
Route::get('tournaments/{tournament}', 'Tournament\TournamentsController@show');

Route::get('validate/signin', 'Tournament\ValidationsController@validateSignin');
Route::get('validate/login', 'Tournament\ValidationsController@validateLogin');

?>