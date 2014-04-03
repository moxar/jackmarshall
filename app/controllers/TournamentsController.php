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
	
		$players = Auth::user()->players()->get();
	
		$this->display('tournaments.create', array(
			'title' => 'Tournois',
			'scripts' => array('js/JackForm.js', 'js/tournaments.js', 'js/validator.jquery.js')
		), array(
			'players' => $players
		));
	}
	
	public function postCreate() {
		
		$tournament = new Tournament();
		$tournament->name = Input::get('name');
		$user = Auth::user();
		$tournament = $user->tournaments()->save($tournament);
		
 		if(!empty(Input::get('newPlayers'))) {
 		
 			foreach(Input::get('newPlayers') as $newPlayer)
 			{
 				$player = new Player();
 				$player->name = $newPlayer;
 				$player->user = Auth::user()->id;
 				$player->save();
				
 				$user->tournaments()->find($tournament->id)->players()->attach($player->id);
 			}
 		}
 		
 		if(!empty(Input::get('players'))) {
 			
 			foreach(Input::get('players') as $player_id => $state)
 			{
 				if($state) 
 				{
					$user->tournaments()->find($tournament->id)->players()->attach($player_id);
				}
 			}
 		}
		
		return Redirect::to('tournaments');
	}
	
	public function delete($tournament) {
		
		$tournament->delete();
		return Redirect::back();
	}
}
?>
 
