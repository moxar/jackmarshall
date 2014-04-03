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
		
		// creer le tournois
		// enregister chaque nouveau joueur
		// enregistrer chaque nouveau joueur dans le pivot tournois joueur
		// enregistrer chaque ancien joueur dans le pivot tournois
		
		$tournament = new Tournament();
		$tournament->name = Input::get('name');
		$tournament->save();
		
		foreach(Input::get('newPlayers') as $newPlayer)
		{
			$player = new Player();
			$player->name = $newPlayer;
			$player->user = Auth::user()->id;
			Tournament::find($tournament->id)->players()->save($player);
		}
		
		print_r(Input::get('newPlayers'));
		exit;
	}
}
?>
 
