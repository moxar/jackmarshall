<?php

Route::get('register', 	['as' => 'user.create', 	'uses' => 'UserController@create', 	'middleware' => 'guest']);
Route::post('register', 	['as' => 'user.store', 		'uses' => 'UserController@store', 	'middleware' => 'guest']);
