<?php

class TournamentsController extends BaseController {

	public function index() {
	
		$this->listing();
	}
	
	public function listing() {
				
		$this->display('tournaments.listing', array(
			'tournaments' => Tournament::get()
		));
	}
	
	public function show($tournament) {
	
		$players = $tournament->players()
			->select('*')
			->addSelect('victory')
			->addSelect('control')
			->addSelect('destruction')
			->orderBy('victory', 'DESC')
			->orderBy('control', 'DESC')
			->orderBy('destruction', 'DESC')
			->get();
			
		foreach($players as $player) {
			$player->sos = $player->opponents($tournament)
			->join("players_tournaments", "players.id", "=", "players_tournaments.player")
			->sum('players_tournaments.victory');
		}
		
		$this->display('tournaments.show', array(
			'tournament' => $tournament,
			'players' => $players
		));
	}
	
	public function getCreate() {
				
		$this->display('tournaments.update', array(
			'tournament' => new Tournament,
			'tournamentPlayers' => array()
		));
		
	}
	
	public function postCreate() {
		
		$tournament = new Tournament;
		$tournament->user = Auth::user()->id;
		
		return App::make('TournamentsController')->postUpdate($tournament);
	}
	
	public function getUpdate($tournament) {
	
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$tournamentPlayers = array();
		foreach($tournament->players as $player) {
			$tournamentPlayers[] = $player->id;
		}
				
		$this->display('tournaments.update', array(
			'tournament' => $tournament,
			'tournamentPlayers' => $tournamentPlayers
		));
	}
	
	public function postUpdate($tournament) {
	
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
	
		$tournament->name = Input::get('name');
		$tournament->save();
		
		$tournament->players()->detach();
		
		if(is_array(Input::get('players'))) {
		
			foreach(Input::get('players') as $key => $value) {
			
				$tournament->players()->attach($key);
			}
		}
		
		if(is_array(Input::get('newPlayers'))) {
		
			foreach(Input::get('newPlayers') as $name) {
			
				$player = new Player;
				$player->name = $name;
				$player->user = Auth::user()->id;
				$player->save();
				$tournament->players()->attach($player->id);
			}
		}
		
		if(count(Input::get('newPlayers')) + count(Input::get('players')) % 2 != 0) {
			$tournament->players()->attach(Player::fantom()->id);
		}
		
		return Redirect::to('tournaments/'.$tournament->id);
	}
	
	public function delete($tournament) {
	
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$tournament->delete();
		return Redirect::back();
	}
}

?>
 
