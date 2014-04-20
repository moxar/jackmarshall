<?php

class Tournament extends Eloquent {
	
	public function user() {
	
		return $this->belongsTo('User', 'user')->first();
	}
	
	public function players() {
	
 		return $this->belongsToMany('Player', 'players_tournaments', 'tournament', 'player');
	}
	
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
	
	public function rounds() {
		
		return $this->hasMany('Round', 'tournament');
	}
	
	public function games() {
	
        return $this->hasManyThrough('Game', 'Round', 'tournament', 'round');
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
}

Tournament::deleting(function($tournament) {

	foreach($tournament->rounds()->get() as $round) {
		$round->delete();
	}
	$tournament->players()->detach();
});


		