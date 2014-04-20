<?php

class Tournament extends Eloquent {
	
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
	
 		return $this->belongsToMany('Player', 'players_tournaments', 'tournament', 'player')->where('players.name', '<>', Player::GHOST);
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
				
	public function user() {
	
		return $this->belongsTo('User', 'user')->first();
	}
	
	public function updateSos() {
		
		foreach($this->players()->get() as $player) {
			$sos = $player->opponents($this)->join('players_tournaments', 'players.id', '=', 'players_tournaments.player')->sum('players_tournaments.victory');
			$this->players()->updateExistingPivot($player->id, array(
				'sos' => empty($sos) ? 0 : $sos
			), true);
		}
	}
}

Tournament::deleting(function($tournament) {

	foreach($tournament->rounds()->get() as $round) {
		$round->delete();
	}
	$tournament->players()->detach();
});


		