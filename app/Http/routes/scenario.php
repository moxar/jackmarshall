<?php

Route::get('scenario', 			['as' => 'scenario.index', 		'uses' =>  'ScenarioController@index', 		'middleware' => 'auth']);
