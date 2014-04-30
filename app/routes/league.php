<?php

// FRONT
Route::get('/', 'League\FrontController@index');

// EVENT
Route::get('leagues', 'League\LeagueController@table');
Route::get('leagues/table', 'League\LeagueController@table');
Route::get('leagues/create', 'League\LeagueController@getCreate');
Route::post('leagues/create', 'League\LeagueController@postCreate');

Route::get('league/{league}/delete', 'League\LeagueController@delete');
Route::get('league/{league}/update', 'League\LeagueController@getUpdate');
Route::post('league/{league}/update', 'League\LeagueController@postUpdate');

// PLAYER
Route::get('players', 'League\PlayerController@index');
Route::get('players/table', 'League\PlayerController@table');
Route::get('players/create', 'League\PlayerController@getCreate');
Route::post('players/create', 'League\PlayerController@postCreate');

Route::get('player/{player}/delete', 'League\PlayerController@delete');
Route::get('player/{player}/update', 'League\PlayerController@getUpdate');
Route::post('player/{player}/update', 'League\PlayerController@postUpdate');

// OBJECTIVE
Route::get('objectives', 'League\ObjectiveController@index');
Route::get('objectives/table', 'League\ObjectiveController@table');
Route::get('objectives/create', 'League\ObjectiveController@getCreate');
Route::post('objectives/create', 'League\ObjectiveController@postCreate');

Route::get('objective/{objective}/delete', 'League\ObjectiveController@delete');
Route::get('objective/{objective}/update', 'League\ObjectiveController@getUpdate');
Route::post('objective/{objective}/update', 'League\ObjectiveController@postUpdate');

// ROUND
Route::get('league/{league}/rounds', 'League\RoundController@table');
Route::get('league/{league}/rounds/table', 'League\RoundController@table');
Route::get('league/{league}/rounds/create', 'League\RoundController@getCreate');
Route::post('league/{league}/rounds/create', 'League\RoundController@postCreate');

Route::get('round/{round}/delete', 'League\RoundController@delete');
Route::get('round/{round}/update', 'League\RoundController@getUpdate');
Route::post('round/{round}/update', 'League\RoundController@postUpdate');

// GAME
Route::get('round/{round}/games', 'League\RoundController@index');
Route::get('round/{round}/games/table', 'League\RoundController@table');
Route::get('round/{round}/games/create', 'League\RoundController@getCreate');
Route::post('round/{round}/games/create', 'League\RoundController@postCreate');

Route::get('game/{game}/delete', 'League\GameController@delete');
Route::get('game/{game}/update', 'League\GameController@getUpdate');
Route::post('game/{game}/update', 'League\GameController@postUpdate');

// REPORT
Route::get('game/{game}/reports', 'League\ReportController@index');
Route::get('game/{game}/reports/table', 'League\ReportController@table');
Route::get('game/{game}/reports/create', 'League\ReportController@getCreate');
Route::post('game/{game}/reports/create', 'League\ReportController@postCreate');

Route::get('report/{report}/delete', 'League\ReportController@delete');
Route::get('report/{report}/update', 'League\ReportController@getUpdate');
Route::post('report/{report}/update', 'League\ReportController@postUpdate');

?> 
