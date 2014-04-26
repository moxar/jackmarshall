<?php

Route::filter('auth', function()
{
	if(Auth::guest()) {
		return Redirect::guest('login');
	}
});

Route::filter('administrator', function() {
	if(Auth::guest() || Auth::user()->rank != 'administrator') {
		return Redirect::to(Helper::link('login'));
	}
});

?>