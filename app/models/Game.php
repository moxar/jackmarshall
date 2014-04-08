<?php

class Game extends Eloquent {

	public function tournament() {
	
		return $this->round()->tournament();
	}
	
	public function round() {
	
		return $this->belongsTo('Round');
	}
	
	public function reports() {
	
		return $this->hasMany('Report', 'game');
	}
}
 
Game::deleting(function($game) {

	$game->reports()->delete();
});
 
