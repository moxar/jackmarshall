<?php

class Player extends Eloquent {
	
	public function tournaments() {
	
		return $this->belongsToMany('Tournament', 'players_tournaments', 'player', 'tournament');
	}
}
 
