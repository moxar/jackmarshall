<?php

Route::filter('administrator', function() {
	if(Auth::guest() || Auth::user()->rank != 'administrator') {
		return Redirect::to(cross(':/login'));
	}
});

?>