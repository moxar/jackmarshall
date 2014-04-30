<?php

Route::filter('administrator', function() {
	if(Auth::guest() || Auth::user()->rank != 'administrator') {
		return Redirect::guest(cross(':/login'));
	}
});

Route::filter('auth', function() {
	if (Auth::guest()) {
		return Redirect::guest(cross(':/login'));
	}
});

Route::filter('guest', function() {
	if (Auth::check()) {
		return Redirect::to(cross(':/'));
	}
});

?>