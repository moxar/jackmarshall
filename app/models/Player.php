<?php

class Player extends Eloquent {
	
	public function tournaments() {
	
		return $this->belongsToMany('Tournament', 'players_tournaments', 'player', 'tournament');
	}
	
	public function neverFought($player, $tournament) {
	
		$players = Player::join('reports', 'report')
			->whereIn('reports.game', function($query) {
				$query->select('games.id')
					->from('games')
					->join('reports', 'report')
					->where('reports.player', '=', $player->id);
			})
			->where('players.id', '<>', $player->id);
			
		print_r($players->toSql()); exit;
	/*
		select players.name from players JOIN reports ON players.id = reports.player WHERE reports.game IN (select games.id from games JOIN reports ON reports.game = games.id WHERE reports.player = 9) AND players.id <> 9;
	*/
	}
}
 
