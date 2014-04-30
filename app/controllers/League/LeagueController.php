<?php

namespace League;

use BaseController as Controller;

class LeagueController extends Controller {

	public function index() {
		$this->table();
	}
	
	public function table() {
		$leagues = Event::leagues()->orderBy('created_at', 'DESC')->get();
		$this->display('league.league.table', $leagues);
	}

	public function getCreate() {
		$this->display('league.league.create');
	}
	
	public function postCreate() {
		$league = new Event;
		$league->type = 'league';
		$league->name = Input::get('name');
		$league->save();
		$league->attachScores(Input::get('objectives'), Input::get('players'));
		return Redirect::to('league/'.$league->id.'/rounds');
	}
	
	public function getUpdate($league) {
		$this->display('league.league.update', array('league' => $league));
	}
	
	public function postUpdate($league) {
		$league->name = Input::get('name');
		$league->save();
		$league->attachScores(Input::get('objectives'), Input::get('players'));
		return Redirect::to('league/'.$league->id.'/rounds');
	}
	
	public function delete($league) {
		$league->delete();
	}
}

?>