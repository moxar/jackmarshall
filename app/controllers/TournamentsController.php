<?php

class TournamentsController extends BaseController {

	public function index() {
	
		$this->listing();
	}
	
	public function listing() {
	
		$tournaments = Tournament::get();
	
		$this->display('tournaments.listing', array(
			'title' => 'Tournois',
		), array(
			'tournaments' => $tournaments
		));
	}
	
	public function getCreate() {
	
		$this->display('tournaments.create', array(
			'title' => 'Tournois',
			'scripts' => array('js/JackForm.js', 'js/tournaments.js', 'js/validator.jquery.js')
		));
	}
	
	public function postCreate() {
	}
}
?>
 
