<?php

Route::get('scenario', 			['as' => 'scenario.index', 		'uses' =>  'ScenarioController@index', 		'middleware' => 'auth']);
Route::get('scenario/create', 	['as' => 'scenario.create', 	'uses' =>  'ScenarioController@create', 	'middleware' => 'auth']);
Route::post('scenario/create', 	['as' => 'scenario.store', 		'uses' =>  'ScenarioController@store', 		'middleware' => 'auth']);
