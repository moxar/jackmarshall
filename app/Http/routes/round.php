<?php

Route::get('round/{tournament}/create', 	['as' => 'round.create', 	'uses' =>  'RoundController@create', 	'middleware' => 'permission']);
Route::post('round/{tournament}/create', 	['as' => 'round.store', 	'uses' =>  'RoundController@store', 	'middleware' => 'permission']);
Route::get('round/{round}/update', 			['as' => 'round.edit', 		'uses' =>  'RoundController@edit', 		'middleware' => 'permission']);
Route::get('round/{round}/delete', 			['as' => 'round.delete', 	'uses' =>  'RoundController@delete', 	'middleware' => 'permission']);
