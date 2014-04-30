<?php

function binder($class, $field) {
	return function($value, $route) use($class, $field) {
		$object = call_user_func($class.'::where', $field, $value)->first();
		if($object == null) {
			throw new NotFoundException;
		}
		return $object;
	};
}

Route::bind('faction', binder('Faction', 'slug'));
Route::bind('game', binder('Game', 'slug'));
Route::bind('league', binder('League', 'slug'));
Route::bind('model', binder('Model', 'slug'));
Route::bind('objective', binder('Objective', 'slug'));
Route::bind('player', binder('Player', 'slug'));
Route::bind('report', binder('Report', 'slug'));
Route::bind('round', binder('Round', 'slug'));
Route::bind('user', binder('User', 'login'));

?>