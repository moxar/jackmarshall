<?php

Route::post('report/batch-update', 		['as' => 'report.batchUpdate', 	'uses' => 'ReportController@batchUpdate', 	'middleware' => 'permission']);
Route::get('report/{report}/delete', 	['as' => 'report.delete', 		'uses' => 'ReportController@delete', 		'middleware' => 'permission']);
