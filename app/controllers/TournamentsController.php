<?php

class TournamentsController extends BaseController {

	public function __construct()
    {
	}

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
	
		$this->display('tournaments.show',
			array(
				'title' => 'Tournois',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'tournament' => $tournament;
			)
		);
	}
	
	public function getCreate() {
	
		$this->beforeFilter('auth');
		
		$this->display('tournaments.create',
			array(
				'title' => 'Tournois',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
			)
		);
	}
	
	public function postCreate() {
	
		$tournament = new Tournament;
		$tournament->name = Input::get('name');
		$tournament->user = Auth::user()->id;
		$tournament->save();
		
		return Redirect::to('tournament/'.$tournament->id);
	}
	
	public function getUpdate($tournament) {
	
		$this->beforeFilter('auth');
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$this->display('tournaments.create',
			array(
				'title' => 'Tournois',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'tournament' => $tournament;
			)
		);
	}
	
	public function postUpdate($tournament) {
	
		$tournament->name = Input::get('name');
		$tournament->save();
		
		return Redirect::to('tournament/'.$tournament->id);
	}
	
	public function delete($tournament) {
		
		$tournament->delete();
		return Redirect::back();
	}
}
?>
 
