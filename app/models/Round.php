<?php

class Round extends Eloquent {

	public function tournament() {
		
		return $this->belongsTo('Tournament', 'tournament')->first();
	}

	public function games() {
		
		return $this->hasMany('Game', 'round');
	}
	
	public function reports() {
	
        return $this->hasManyThrough('Report', 'Game', 'round', 'game');
	}
	
	public function user() {
	
		return $this->tournament()->user()->first();
	}
	
	public function assignPlayersToGames() {
	
		$tournament = $this->tournament();
		
		// Getting players
		$players = array();
		foreach($tournament->orderedPlayers()->get() as $player) {
			$players[] = $player;
		}
		
		// Creating games
		$games = array();
		for($gt = 0; $gt < round(count($players) / 2); $gt++) {
			$game = new Game();
			$game->slug = "Ronde ".$this->number." - Partie ".$gt;
			$game->id = $gt;
			$games[] = $game;
		}
		
		// Placing players into games
		$pt = 0;
		$gt = 0;
		while(!empty($players))
		{
			$pt++;
			
			if($pt > count($players) - 1) {
				$games[$gt]->players = array($players[0], $players[count($players)-1]);
				$gt++;
				break;
			}
			
			if(count($players[0]->opponents($tournament)->where('players.id', '=', $players[$pt])->get()) == 0) {
			
				$games[$gt]->players = array($players[0], $players[$pt]);
				$gt++;
				unset($players[$pt]);
				unset($players[0]);
				$players = array_values($players);
				$pt = 0;
				continue;
			}			
		}
		
		return $games;
	}
}
 
Round::deleting(function($round) {

	$games = $round->games()->get();
	$gamesToDelete = array();
	foreach($games as $game) {
		$gamesToDelete[] = $game->id;
	}
	Report::whereIn('game', $gamesToDelete)->delete();
	Game::whereIn('id', $gamesToDelete)->delete();
	$tournament = $round->tournament();
	$players = $tournament->players()->get();
	foreach($players as $player) {
		$player->updateScore($tournament);
		$player->updateSos($tournament);
	}
});
