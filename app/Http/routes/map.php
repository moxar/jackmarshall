<?php

Route::get('map', 				['as' => 'map.index', 	'uses' =>  'MapController@index', 	'middleware' => 'auth']);
Route::get('map/create', 		['as' => 'map.create', 	'uses' =>  'MapController@create', 	'middleware' => 'auth']);
Route::post('map/create', 		['as' => 'map.store', 	'uses' =>  'MapController@store', 	'middleware' => 'auth']);
Route::get('map/{map}/update', 	['as' => 'map.edit', 	'uses' =>  'MapController@edit', 	'middleware' => 'auth']);
Route::post('map/{map}/update', ['as' => 'map.update', 	'uses' =>  'MapController@update', 	'middleware' => 'auth']);
Route::get('map/{map}/delete', 	['as' => 'map.delete', 	'uses' =>  'MapController@delete', 	'middleware' => 'auth']);
