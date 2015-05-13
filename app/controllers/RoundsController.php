<?php

class RoundsController extends BaseController {
	
	public function getCreate($tournament) {
	
 		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
	
		// Creating round
		$lastRound = $tournament->rounds()->orderBy('number', 'DESC')->first();
		$round = new Round;
		$round->number = empty($lastRound) ? 1 : $lastRound->number + 1;
		
		$players = $tournament->orderedPlayers()->get();
		$maps = $tournament->maps;
		
		$this->display(array('rounds.create', 'players.ranking'), array(
			'tournament' => $tournament,
			'round' => $round,
			'players' => $players,
			'maps' => $maps,
		));
	}
	
	public function postCreate($tournament) {
	
		if($tournament->user() != Auth::user()) return Redirect::to('tournaments');
		
		$round = new Round;
		$round->number = Input::get('number');
		$round->tournament = $tournament->id;
		$round->save();
		
		App::make('GamesController')->createMultiple($round);
		
		return Redirect::to('rounds/'.$round->id.'/update');
	}
	
	public function getUpdate($round) {
	
		$tournament = $round->tournament();
		if($round->user() != Auth::user()) return Redirect::to('tournaments/'.$tournament->id);
		
		$games = $round->games()->get();
		
		foreach($games as $game) {
		
			$players = array();
			$reports = $game->reports()->get();
			for($pt = 0; $pt < count($reports); $pt++) {
				
				$players[$pt] = $reports[$pt]->player();
			}
			
			foreach($players as $player) {
				$player->report = $round->reports()->select(array('*', 'reports.id AS id'))->where('reports.player', '=', $player->id)->first();
			}
			
			$game->players = $players;
		}
		
		$players = $tournament->orderedPlayers()->get();
		
		$this->display(array('reports.update', 'players.ranking'), array(
			'round' => $round,
			'games' => $games,
			'players' => $players,
		));
	}
	
	public function delete($round) {
	
		if($round->tournament()->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$round->delete();
		return Redirect::back();
	}
}
?>
