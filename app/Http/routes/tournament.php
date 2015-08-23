<?php

Route::get('tournament', 						['as' => 'tournament.index', 		'uses' =>  'TournamentController@index']);
Route::get('tournament/continuous', 			['as' => 'tournament.continuous', 	'uses' =>  'TournamentController@continuous']);
Route::get('tournament/{tournament}', 			['as' => 'tournament.show', 		'uses' =>  'TournamentController@show']);
Route::get('tournament/create', 				['as' => 'tournament.create', 		'uses' =>  'TournamentController@create', 		'middleware' => 'auth']);
Route::post('tournament/create', 				['as' => 'tournament.store', 		'uses' =>  'TournamentController@store', 		'middleware' => 'auth']);
Route::get('tournament/{tournament}/delete', 	['as' => 'tournament.delete',		'uses' =>  'TournamentController@delete', 		'middleware' => 'permission']);
