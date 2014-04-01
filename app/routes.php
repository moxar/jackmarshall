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

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route::get('signin', 'UsersController@getSignin');
Route::post('signin', 'UsersController@postSignin');
Route::get('login', 'UsersController@getLogin');
Route::post('login', 'UsersController@postLogin');
Route::post('logout', 'UsersController@singout');

Route::get('signin/validate', 'UsersController@validateForm');