<?php

Route::get('auth/login', 	['as' => 'auth.login', 		'uses' => 'AuthController@login', 		'middleware' => 'guest']);
Route::post('auth/login', 	['as' => 'auth.attempt', 	'uses' => 'AuthController@attempt', 	'middleware' => 'guest']);
