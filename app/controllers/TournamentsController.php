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
	
		$players = $tournament->players()->orderBy('vp', 'DESC')->orderBy('cp', 'DESC')->orderBy('dp', 'DESC');
		$players->toSql();
		$players = Player::aggregate($players, $tournament->id)->get();
		
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
 
