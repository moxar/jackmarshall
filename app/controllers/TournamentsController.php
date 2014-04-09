<?php

class TournamentsController extends BaseController {

	public function index() {
	
		$this->listing();
	}
	
	public function listing() {
		
		$tournaments = Tournament::get();
		
		$this->display('tournaments.listing', 
			array(
				'title' => 'Tournois',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'tournaments' => $tournaments;
			)
		);
	}
	
	public function show($tournament) {
	
		$players = $tournament->players();
	
		$this->display('tournaments.show',
			array(
				'title' => 'Tournois',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'tournament' => $tournament,
				'players' => $players
			)
		);
	}
	
	public function getCreate() {
	
		$this->beforeFilter('auth');
		
		$players = Auth::user()->players()->get();
		
		$this->display('tournaments.create',
			array(
				'title' => 'Tournois',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'players' => $players
			)
		);
	}
	
	public function postCreate() {
	
		$this->beforeFilter('auth');
	
		$tournament = new Tournament;
		$tournament->name = Input::get('name');
		$tournament->user = Auth::user()->id;
		$tournament->save();
		
		foreach(Input::get('players') as $id => $state) {
		
			if($state == 'active') $tournament->players()->attach($id);
		}
		
		foreach(Input::get('newPlayers') as $name) {
		
			$player = new Player;
			$player->name = $name;
			$player->save();
			$tournament->players()->attach($player->id);
		}
		
		return Redirect::to('tournament/'.$tournament->id);
	}
	
	public function getUpdate($tournament) {
	
		$this->beforeFilter('auth');
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$players = Auth::user()->players()->get();
		$tournamentPlayers = $tournament->players()->select('players.id')->get();
		
		$this->display('tournaments.update',
			array(
				'title' => 'Tournois',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'tournament' => $tournament,
				'players' => $players,
				'tournamentPlayers' => $tournamentPlayers
			)
		);
	}
	
	public function postUpdate($tournament) {
	
		$this->beforeFilter('auth');
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
	
		$tournament->name = Input::get('name');
		$tournament->save();
		
		$tournament->players()->detach();
		
		foreach(Input::get('players') as $id => $state) {
		
			if($state == 'active') $tournament->players()->attach($id);
		}
		
		foreach(Input::get('newPlayers') as $name) {
		
			$player = new Player;
			$player->name = $name;
			$player->save();
			$tournament->players()->attach($player->id);
		}
		
		return Redirect::to('tournament/'.$tournament->id);
	}
	
	public function delete($tournament) {
		
		$this->beforeFilter('auth');
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$tournament->delete();
		return Redirect::back();
	}
}

?>
 
