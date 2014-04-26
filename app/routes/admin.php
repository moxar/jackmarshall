<?php

Route::get('/', 'Admin\FrontController@index');
Route::get('/factions', 'Admin\FactionsController@index');
Route::get('/factions/new', 'Admin\FactionsController@make');
Route::post('/factions/new', 'Admin\FactionsController@create');
Route::get('/faction/{faction}/delete', 'Admin\FactionsController@delete');

?>