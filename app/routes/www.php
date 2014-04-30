<?php

Route::get('/', 'Www\FrontController@index');

Route::group(array('before' => 'guest'), function() {

	Route::get('signin', 'Www\UsersController@signin');
	Route::post('signin', 'Www\UsersController@subscribe');
	Route::get('login', 'Www\UsersController@login');
	Route::post('login', 'Www\UsersController@connect');
});

Route::group(array('before' => 'auth'), function() {

	Route::get('logout', 'Www\UsersController@disconnect');
});

?>