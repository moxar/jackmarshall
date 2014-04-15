<?php

class RoundsController extends BaseController {
	
	public function getCreate($tournament) {
	
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
	
		// Creating round
		$lastRound = $tournament->rounds()->orderBy('number', 'DESC')->first();
		$round = new Round;
		$round->tournament = $tournament;
		$round->number = empty($lastRound) ? 1 : $lastRound->number + 1;
		$round->save();
		
		// Creating games belonging to round
		$gamesNumber = round(count($tournament->players) / 2);
		for($ii = 0; $ii < $gameNumber; $ii++) {
			$game = new Game;
			$game->round = $round->id;
			$game->slug = "Ronde ".$round->number." - Partie ".$ii;
			$game->save();
		}
		
		return Redirect::to('rounds/'.$round->id.'/update');
	}
	
	public function getUpdate($round) {
	
		if($round->tournament()->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$players = $round->tournament()->players();
		$round->games = $this->placeIntoGame($players, $round->games);
		foreach($round->games as &$games)
		{
			$game->report[0] = $game->reports()->where('player', $game->players[0])->first();
			$game->report[1] = $game->reports()->where('player', $game->players[1])->first();
		}
		
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
	
	public function placeIntoGame($players, $games, $gt = 0, $pt = 0) {
	
		while($pt < count($players)) {
			
			if((!isset($games[$gt]) || empty($games[$gt]) || $games[$gt]->players[0]->neverFought($players[$pt])) && count($games[$gt]->players)) < 2 {
				$games[$gt]->players[] = $players[$pt];
				$this->placeIntoGame(&$player, &$games, 0, $pt+1);
			}
			else
			{
				$this->placeIntoGame(&$player, &$games, $gt+1, $pt);
			}
		}
		return $games;
	}
}

?>
 
