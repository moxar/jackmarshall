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

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route::get('signin', 'UsersController@getSignin');
Route::post('signin', 'UsersController@postSignin');
Route::get('login', 'UsersController@getLogin');
Route::post('login', 'UsersController@postLogin');
Route::get('logout', 'UsersController@logout');

Route::get('tournaments', 'TournamentsController@listing');
Route::get('tournaments/listing', 'TournamentsController@listing');
Route::get('tournaments/create', 'TournamentsController@getCreate');
Route::post('tournaments/create', 'TournamentsController@postCreate');
Route::get('tournaments/{tournament}/delete', 'TournamentsController@delete');

Route::get('validate/signin', 'ValidationsController@validateSignin');
Route::get('validate/login', 'ValidationsController@validateLogin');