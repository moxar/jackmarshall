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
		
		$this->display('tournaments.show', array(
			'tournament' => $tournament
		));
	}
	
	public function getCreate() {
		
		$tournament = new Tournament;
		$tournament->user = Auth::user()->id;
		$tournament->save();
		
		return Redirect::to('tournaments/'.$tournament->id.'/update');
	}
	
	public function getUpdate($tournament) {
	
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$tournamentPlayers = array();
		foreach($tournament->players()->select('players.id')->get() as $player) {
			$tournamentPlayers[] = $player;
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
	
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$tournament->delete();
		return Redirect::back();
	}
}

?>
 
