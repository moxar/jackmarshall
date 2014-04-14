<?php

class RoundsController extends BaseController {
	
	public function listing($tournament) {
		
		$this->display('rounds.listing', 
			array(
				'title' => 'Rondes',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'tournament' => $tournament
			)
		);
	}
	
	public function show($round) {
		
		$this->display('rounds.show', 
			array(
				'title' => 'Rondes',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'round' => $round,
				'players' => $round->tournament()->players()
			)
		);
	}
	
	public function getCreate($tournament) {
	
		$this->beforeFilter('auth');
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
	
		$lastRound = $tournament->rounds()->orderBy('number', 'DESC')->first();
		$round = new Round;
		$round->tournament = $tournament;
		$round->number = empty($lastRound) ? 1 : $lastRound->number + 1;
		$round->save();
		
		return Redirect::to('rounds/'.$round->id.'/update');
	}
	
	public function getUpdate($round) {
	
		$this->beforeFilter('auth');
		if($round->tournament()->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$this->display('rounds.update', 
			array(
				'title' => 'Rondes',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'round' => $round,
				'players' => $round->tournament()->players
			)
		);
	}
	
	public function postUpdate($round) {
	
		$this->beforeFilter('auth');
		if($round->tournament()->user != Auth::user()->id) return Redirect::to('tournaments');
		
		foreach(Input::get('games') as $input) {
		
			$game = new Game(array(
				"slug" => $input['slug'],
				"round" => $round->id
			));
			$game->save();
			
			foreach($input['player'] as $player) {
			
				$report = new Report(array(
					"game" => $game->id, 
					"player" => $player
				));
				$report->save();
			}
		}
	}
	
	public function delete($round) {
	
		$this->beforeFilter('auth');
		if($round->tournament()->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$round->delete();
		return Redirect::back();
	}
}

?>
 
