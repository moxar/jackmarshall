<?php

namespace League;

use BaseController as Controller;

class LeagueController extends Controller {

	public function index() {
		$this->table();
	}
	
	public function table() {
		$leagues = Contest::leagues()->orderBy('created_at', 'DESC');
		echo $leagues->toSql();exit;//->get();
		$this->display('league.league.table', $leagues);
	}

	public function getCreate() {
		$this->display('league.league.create');
	}
	
	public function postCreate() {
		$league = new Contest(Input::all());
		$league->save();
		$league->resetScores(Input::get('objectives'), Input::get('players'));
		return Redirect::to('league/'.$league->id.'/rounds');
	}
	
	public function getUpdate($league) {
		$this->display('league.league.update', array('league' => $league));
	}
	
	public function postUpdate($league) {
		$league->name = Input::get('name');
		$league->save();
		$league->resetScores(Input::get('objectives'), Input::get('players'));
		return Redirect::to('league/'.$league->id.'/rounds');
	}
	
	public function delete($league) {
		$league->delete();
	}
}

?>