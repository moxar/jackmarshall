<?php

Route::get('/', 'Admin\FrontController@home');

Route::get('/factions', 'Admin\FactionsController@listing');
Route::get('/factions/new', 'Admin\FactionsController@make');
Route::post('/factions/new', 'Admin\FactionsController@create');
Route::get('/faction/{faction}', 'Admin\FactionsController@view');
Route::get('/faction/{faction}/edit', 'Admin\FactionsController@edit');
Route::post('/faction/{faction}/edit', 'Admin\FactionsController@update');
Route::get('/faction/{faction}/delete', 'Admin\FactionsController@delete');

Route::get('/users', 'Admin\UsersController@listing');
Route::get('/user/{user}', 'Admin\UsersController@view');
Route::get('/user/{user}/edit', 'Admin\UsersController@edit');
Route::post('/user/{user}/edit', 'Admin\UsersController@update');
Route::get('/user/{user}/delete', 'Admin\UsersController@delete');

Route::get('/models', 'Admin\ModelsController@listing');
Route::get('/models/new', 'Admin\ModelsController@make');
Route::post('/models/new', 'Admin\ModelsController@create');
Route::get('/model/{model}/edit', 'Admin\ModelsController@edit');
Route::post('/model/{model}/edit', 'Admin\ModelsController@update');

?>