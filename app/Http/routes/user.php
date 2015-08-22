<?php

Route::get('logout', ['middleware' => 'auth', 'uses' => 'UsersController@logout']);
Route::get('login', ['middleware' => 'guest','uses' => 'UsersController@getLogin']);
Route::post('login', ['middleware' => 'guest','uses' => 'UsersController@postLogin']);
