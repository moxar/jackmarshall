<?php

class Tournament extends Eloquent {
	
	public function players() {
	
		return $this->belongsToMany('Player', 'players_tournaments', 'tournament', 'player');
	}

}

Tournament::deleting(function($tournament) {
	Tournament::find($tournament->id)->players()->detach();
});


		