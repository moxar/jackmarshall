<?php

Route::post('report/update', 			['as' => 'report.update', 	'uses' =>  'ReportController@update', 	'middleware' => 'auth']);
Route::get('report/{report}/delete', 	['as' => 'report.delete', 	'uses' =>  'ReportController@delete', 	'middleware' => 'auth']);
