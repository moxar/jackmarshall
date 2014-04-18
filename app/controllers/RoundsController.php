<?php

class RoundsController extends BaseController {
	
	public function getCreate($tournament) {
	
 		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
	
		// Creating round
		$lastRound = $tournament->rounds()->orderBy('number', 'DESC')->first();
		$round = new Round;
		$round->number = empty($lastRound) ? 1 : $lastRound->number + 1;
		$round->tournament = $tournament->id;
		
		$games = $round->assignPlayersToGames();
		$this->display('rounds.update', array(
			'round' => $round,
			'games' => $games,
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
		
		$games = $round->assignPlayersToGames();
		
		$this->display('rounds.update', array(
			'round' => $round,
			'games' => $games
		));
	}
	
	public function postUpdate($round) {
	
		if($round->tournament()->user != Auth::user()->id) return Redirect::to('tournaments');
		
		App::make('GamesController')->createMultiple($round);
		
		return Redirect::to('rounds/'.$round->id.'/update');
	}
	
	public function delete($round) {
	
		if($round->tournament()->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$round->delete();
		return Redirect::back();
	}
}
?>
