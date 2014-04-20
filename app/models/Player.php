<?php

class Player extends Eloquent {
	
	public function tournaments() {
	
		return $this->belongsToMany('Tournament', 'players_tournaments', 'player', 'tournament');
	}
		
	public function opponents($tournament) {
		
		return $players = Player::select(array('*','players.id AS id'))
			->distinct()
			->join('reports', 'reports.player', '=', 'players.id')
			->whereRaw('reports.game IN (
				SELECT games.id 
				FROM reports
				JOIN games ON games.id =  reports.game
				JOIN rounds ON rounds.id = games.round
				WHERE reports.player = '.DB::getPdo()->quote($this->id).'
				AND rounds.tournament = '.DB::getPdo()->quote($tournament->id).'
			)')->where('players.id', '<>', $this->id);
	}
	
	public function updateScore($tournament) {
		
		$scores = $tournament->playerReports($this)
			->select(
				array(
					DB::raw('SUM(reports.victory) AS victory'),
					DB::raw('SUM(reports.control) AS control'),
					DB::raw('SUM(reports.destruction) AS destruction'),
				)
			)
			->groupBy('reports.player')
			->first();
			
		if(is_null($scores)) {
			$scores = new StdClass;
			$scores->victory = 0;
			$scores->control = 0;
			$scores->destruction = 0;
		}
		
		DB::table('players_tournaments')
			->where('player', '=', $this->id)
			->where('tournament', '=', $tournament->id)
			->update(
				array(
					'victory' => $scores->victory,
					'control' => $scores->control,
					'destruction' => $scores->destruction,
				)
			);
	}
	
	public function updateSos($tournament) {
	
		$opponents = $this->opponents($tournament)->get();
		$sos = $tournament->playersReports($opponents)->sum('victory');
		DB::table('players_tournaments')
			->where('player', '=', $this->id)
			->where('tournament', '=', $tournament->id)
			->update(array('sos' => $sos));
	}
}
 

