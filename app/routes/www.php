<?php

Route::get('/', 'Www\FrontController@index');
Route::get('signin', 'Www\UsersController@signin');
Route::post('signin', 'Www\UsersController@subscribe');
Route::get('login', 'Www\UsersController@login');
Route::post('login', 'Www\UsersController@connect');
Route::get('logout', 'Www\UsersController@disconnect');

?>