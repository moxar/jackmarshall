<?php

class Tournament extends Eloquent {
	
	public function players() {
	
		return $this->belongsToMany('Player', 'players_tournaments', 'tournament', 'player');
	}
	
	public function rounds() {
		
		return $this->hasMany('Round', 'tournament');
	}
	
	public function games() {
	
        return $this->rounds()->games();
	}
	
	public function reports() {
	
		return $this->rounds()->games()->reports();
	}

}

Tournament::deleting(function($tournament) {

	$tournament->players()->detach();
	$tournament->rounds()->delete();
});


		