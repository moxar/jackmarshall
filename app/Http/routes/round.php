<?php

Route::get('round/{tournament}/create', 	['as' => 'round.create', 	'uses' =>  'RoundController@create', 	'middleware' => 'auth']);
Route::post('round/{tournament}/create', 	['as' => 'round.store', 	'uses' =>  'RoundController@store', 	'middleware' => 'auth']);
Route::get('round/{round}/update', 			['as' => 'round.edit', 		'uses' =>  'RoundController@edit', 		'middleware' => 'auth']);
Route::post('round/{round}/update', 		['as' => 'round.update', 	'uses' =>  'RoundController@update', 	'middleware' => 'auth']);
Route::get('round/{round}/delete', 			['as' => 'round.delete', 	'uses' =>  'RoundController@delete', 	'middleware' => 'auth']);
