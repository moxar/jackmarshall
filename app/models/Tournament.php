<?php

class Tournament extends Eloquent {
	
	public function players() {
		
		return $this->belongsToMany('Player', 'players_tournaments', 'player', 'tournament');
	}

}
