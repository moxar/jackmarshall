<?php

namespace League;

use BaseController as Controller;
use Contest;
use Redirect;

class LeagueController extends Controller {

	public function index() {
		$this->table();
	}
	
	public function table() {
		$this->display('league.league.table');
	}

	public function getCreate() {
		$this->display('league.league.create');
	}
	
	public function postCreate() {
		$league = new Contest(Input::all());
		$league->save();
		$objectives = array();
		foreach(Input::get('objectives') as $key => $value) {
			$objectives[] = $key;
		}
		$players = array();
		foreach(Input::get('players') as $key => $value) {
			$players[] = $key;
		}
		$league->resetScores($objectives, $players);
		return Redirect::to('league/'.$league->id.'/rounds');
	}
	
	public function getUpdate($league) {
		$this->display('league.league.update', array('league' => $league));
	}
	
	public function postUpdate($league) {
		$league->name = Input::get('name');
		$league->save();
		$objectives = array();
		foreach(Input::get('objectives') as $key => $value) {
			$objectives[] = $key;
		}
		$players = array();
		foreach(Input::get('players') as $key => $value) {
			$players[] = $key;
		}
		$league->resetScores($objectives, $players);
		return Redirect::to('league/'.$league->id.'/rounds');
	}
	
	public function delete($league) {
		$league->delete();
	}
}

?>