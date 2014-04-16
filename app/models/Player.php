<?php

class Player extends Eloquent {

	const GHOST = "fantôme";
	
	public function tournaments() {
	
		return $this->belongsToMany('Tournament', 'players_tournaments', 'player', 'tournament');
	}
	
	public static function fantom() {
	
		return Player::where('name', '=', Player::GHOST)->where('user', '=', Auth::user()->id)->first();
	}
	
	public function hasPlayedWith($player, $tournament) {
	
		$players = Player::join('reports', 'reports.player', '=', 'players.id')
			->whereRaw("reports.game IN (SELECT games.id FROM games JOIN reports ON reports.game = games.id WHERE reports.player = ".DB::getPdo()->quote($this->id).")")
			->where('players.id', '<>', $this->id)
			->where('players.id', '=', $player->id)
			->get();
			
		return count($players) != 0;
	/*
		select players.name from players JOIN reports ON players.id = reports.player WHERE (SELECT games.id FROM games JOIN reports ON reports.game = games.id WHERE reports.player = localPlayer AND players.id <> localPlayer AND players.id = foreignPlayer;
	*/
	}
	
	public static function aggregate($query, $tournament) {
		
		$query->join(DB::raw("
			(
				SELECT players.id AS id, SUM(victory) AS vp, SUM(destruction) AS dp, SUM(control) AS cp
				FROM reports
				JOIN players ON reports.player = players.id
				JOIN games ON reports.game = games.id
				JOIN rounds ON games.round = rounds.id
				JOIN tournaments ON rounds.tournament = tournaments.id
				WHERE tournaments.id = ".DB::getPdo()->quote($tournament)."
				GROUP BY players.id
			) AS aggregate
				
		 "), "players.id", "=",  "aggregate.id");
		
		return $query;
		// print_r($query->toSql());exit;
		 
	}
}
 
