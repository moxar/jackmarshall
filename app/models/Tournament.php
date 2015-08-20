<?php

class Tournament extends Eloquent {
	
			// ======== RELATIONS ======== //

	public function user() {
	
		return $this->belongsTo('user');
	}
	
	public function players() {
	
 		return $this->belongsToMany('Player');
	}
	
	public function maps() {
	
 		return $this->belongsToMany('Map');
	}
	
	public function rounds() {
		
		return $this->hasMany('tournament');
	}
	
	public function games() {
	
        	return $this->hasManyThrough('Game', 'Round', 'tournament', 'round');
	}
	
	public function scenarii() {
		return $this->belongsToMany('Scenario');
	}
	
			// ======== FIN RELATIONS ======== //

	public function orderedPlayers() {
	
		return $this->players()
			->select('*')
			->addSelect('victory')
			->addSelect('control')
			->addSelect('destruction')
			->addSelect('sos')
			->orderBy('victory', 'DESC')
			->orderBy('sos', 'DESC')
			->orderBy('control', 'DESC')
			->orderBy('destruction', 'DESC');
	}
	
	public function playersButFantom() {
	
 		return $this->belongsToMany('Player', 'players_tournaments', 'tournament', 'player')->where('players.name', '<>', User::GHOST);
	}
	
	public function reports() {
	
		return Report::where('tournaments.id', '=', $this->id)
			->join('games', 'games.id', '=', 'reports.game')
			->join('rounds', 'rounds.id', '=', 'games.round')
			->join('tournaments', 'tournaments.id', '=', 'rounds.tournament');
	}
	
	public function playerReports($player) {
		
		return $this->reports()->where('reports.player', '=', $player->id);
	}
	
	public function playersReports($players) {
		
		$ids = array();
		foreach($players as $player) {
			$ids[] = $player->id;
		}
		return $this->reports()->whereIn('reports.player', $ids);
	}
	
	public function hasCompleteAccess() {
		return Auth::check() && Auth::user() == $this->user();
	}
}

Tournament::deleting(function($tournament) {

	$rounds = $tournament->rounds()->get();
	foreach($rounds as $round) {
		$round->delete();
	}
	$tournament->players()->detach();
	$tournament->maps()->detach();
	$tournament->scenarii()->detach();
});	
