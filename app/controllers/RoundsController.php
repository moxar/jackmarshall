<?php

class RoundsController extends BaseController {
	
	public function getCreate($tournament) {
	
 		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
	
		// Creating round
		$lastRound = $tournament->rounds()->orderBy('number', 'DESC')->first();
		$round = new Round;
		$round->tournament = $tournament->id;
		$round->number = empty($lastRound) ? 1 : $lastRound->number + 1;
		$round->save();
		
		// Creating games belonging to round
		$gameNumber = round(count($tournament->players) / 2);
		for($ii = 0; $ii < $gameNumber; $ii++) {
			$game = new Game;
			$game->round = $round->id;
			$game->slug = "Ronde ".$round->number." - Partie ".$ii;
			$game->save();
		}
		
		return Redirect::to('rounds/'.$round->id.'/update');
	}
	
	public function getUpdate($round) {
	
		if($round->user() != Auth::user()) return Redirect::to('tournaments/'.$round->tournament()->id);
		
		$this->display('rounds.update', array(
			'round' => $round
		));
	}
	
	public function postUpdate($round) {
	
		if($round->tournament()->user != Auth::user()->id) return Redirect::to('tournaments');
		
		// Creating games
		foreach(Input::get('games') as $input) {
		
			$game = Game::find($game->id);
			$game->slug = $input['slug'];
			$game->save();
			
			// Creating reports for each game
			foreach($input['player'] as $player) {
			
				$report = new Report(array(
					"game" => $game->id, 
					"player" => $player
				));
				$report->save();
			}
		}
		
		return Redirect::to('rounds/'.$round->id.'/update');
	}
	
	public function delete($round) {
	
		if($round->tournament()->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$round->delete();
		return Redirect::back();
	}
}

?>
 
