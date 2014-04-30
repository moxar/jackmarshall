<?php

// FRONT
Route::get('/', 'League\FrontController@index');

// LEAGUE
Route::get('leagues', 'League\LeagueController@index');
Route::get('leagues/table', 'League\LeagueController@table');

Route::group(array('before' => 'auth'), function() {

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

	// SEASON
	Route::get('league/{league}/seasons', 'League\SeasonController@table');
	Route::get('league/{league}/seasons/table', 'League\SeasonController@table');
	Route::get('league/{league}/seasons/create', 'League\SeasonController@getCreate');
	Route::post('league/{league}/seasons/create', 'League\SeasonController@postCreate');

	Route::get('season/{season}/delete', 'League\SeasonController@delete');
	Route::get('season/{season}/update', 'League\SeasonController@getUpdate');
	Route::post('season/{season}/update', 'League\SeasonController@postUpdate');

	// GAME
	Route::get('season/{season}/games', 'League\GameController@index');
	Route::get('season/{season}/games/table', 'League\GameController@table');
	Route::get('season/{season}/games/create', 'League\GameController@getCreate');
	Route::post('season/{season}/games/create', 'League\GameController@postCreate');

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
});

?> 
