<?php

class Tournament extends Eloquent {
	
	public function players() {
	
		return $this->belongsToMany('Player', 'players_tournaments', 'tournament', 'player');
	}
	
	public function reports() {
		return $this->hasMany('Report', 'tournament');
	}

}

Tournament::deleting(function($tournament) {
	Tournament::find($tournament->id)->players()->detach();
});


		