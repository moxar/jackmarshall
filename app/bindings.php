<?php

Route::bind('faction', function($value, $route) {
	$faction = Faction::where('slug', $value)->first();
	if($faction == null) {
		throw new NotFoundException;
	}
	return $faction;
});

Route::bind('user', function($value, $route) {
	$user = User::where('login', $value)->first();
	if($user == null) {
		throw new NotFoundException;
	}
	return $user;
});

?>