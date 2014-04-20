<?php

class RoundsController extends BaseController {
	
	public function getCreate($tournament) {
	
 		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
	
		// Creating round
		$lastRound = $tournament->rounds()->orderBy('number', 'DESC')->first();
		$round = new Round;
		$round->number = empty($lastRound) ? 1 : $lastRound->number + 1;
		$round->tournament = $tournament->id;
		$round->placeHolder = true;
		
		$games = $round->assignPlayersToGames();
		
		$players = $tournament->orderedPlayers()->get();
		
		$this->display(array('rounds.update', 'tournaments.ranking'), array(
			'round' => $round,
			'games' => $games,
			'players' => $players,
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
		$round->placeHolder = false;
		
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
		
		$this->display(array('rounds.update', 'tournaments.ranking'), array(
			'round' => $round,
			'games' => $games,
			'players' => $players,
		));
	}
	
	public function postUpdate($round) {
	
		if($round->tournament()->user != Auth::user()->id) return Redirect::to('tournaments');
		
		App::make('GamesController')->updateMultiple($round);
		
		return Redirect::to('rounds/'.$round->id.'/update');
	}
	
	public function delete($round) {
	
		if($round->tournament()->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$round->delete();
		return Redirect::back();
	}
}
?>
