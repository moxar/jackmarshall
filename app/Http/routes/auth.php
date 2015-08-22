<?php

Route::get('login', 	['as' => 'auth.login', 		'uses' => 'AuthController@login', 	'middleware' => 'guest']);
Route::post('login', 	['as' => 'auth.attempt', 	'uses' => 'AuthController@attempt', 'middleware' => 'guest']);
Route::get('logout', 	['as' => 'auth.logout', 	'uses' => 'AuthController@logout', 	'middleware' => 'auth']);
