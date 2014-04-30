<?php

namespace League;

use BaseController as Controller;

class LeagueController extends Controller {

	public function index() {
		$this->table();
	}
	
	public function table() {
		$leagues = Event::leagues()->get();
		$this->display('league.league.table', $leagues);
	}

	public function getCreate() {
		$this->display('league.league.create');
	}
	
	public function postCreate() {
		$league = new League(Input::all());
		$league->save();
		return Redirect::to('league/'.$league->id.'/rounds');
	}
	
	public function getUpdate($league) {
		$this->display('league.league.update', array('league' => $league));
	}
	
	public function postUpdate($league) {
		foreach(Input::all() as $key => $value) {
			$league->{$key} = $value;
		}
		$league->save();
		return Redirect::to('league/'.$league->id.'/rounds');
	}
	
	public function delete($league) {
		$league->delete();
	}
}

?>