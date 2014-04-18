<?php

class Player extends Eloquent {

	const GHOST = "fantôme";
	
	public function tournaments() {
	
		return $this->belongsToMany('Tournament', 'players_tournaments', 'player', 'tournament');
	}
	
	public static function fantom() {
	
		return Player::where('name', '=', Player::GHOST)->where('user', '=', Auth::user()->id)->first();
	}
	
	public function opponents($tournament) {
		
		return $players = Player::join('reports', 'reports.player', '=', 'players.id')
				->whereRaw("reports.game IN (
					SELECT games.id 
					FROM games 
					JOIN reports ON reports.game = games.id 
					WHERE reports.player = ".DB::getPdo()->quote($this->id)."
				)")->where('players.id', '<>', $this->id);
	}
}
 
 

