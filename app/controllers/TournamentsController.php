<?php

class TournamentsController extends BaseController {

	public function __construct()
    {
		$this->beforeFilter('auth');
	}

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
	
	public function manage($tournament) {
	
		$players = $tournament->reports()
			->join('players', 'players.id', '=', 'reports.player')
			->select(DB::raw('sum(victory) as victory'))
			->select(DB::raw('sum(control) as control'))
			->select(DB::raw('sum(destruction) as destruction'))
			->select(DB::raw('(SELECT sum(victory) FROM reports WHERE tournament = '.$tournament->id.' AND player <> reports.player AND game IN (SELECT game FROM reports WHERE tournament = '.$tournament->id.' AND player = reports.player)) as sos'))
			->groupBy('player')
			->orderBy('victory', 'DESC')
			->orderBy('sos', 'DESC')
			->orderBy('control', 'DESC')
			->orderBy('destruction', 'DESC')
			->get();	
		
		$this->display('tournaments.manage', array(
			'title' => 'Tournois',
			'scripts' => array('js/JackForm.js', 'js/tournaments.manage.js', 'js/validator.jquery.js')
		), array(
			'players' => $players
		));
	}
	
	public function getCreate() {
	
		$players = Auth::user()->players()->get();
	
		$this->display('tournaments.create', array(
			'title' => 'Tournois',
			'scripts' => array('js/JackForm.js', 'js/tournaments.create.js', 'js/validator.jquery.js')
		), array(
			'players' => $players
		));
	}
	
	public function postCreate() {
		
		$user = Auth::user();
		$tournament = new Tournament();
		$tournament->name = Input::get('name');
		$tournament = $user->tournaments()->save($tournament);
		
		$newPlayers = Input::get('newPlayers');
 		if(!empty($newPlayers)) {
 		
 			foreach($newPlayers as $newPlayer)
 			{
 				$player = new Player();
 				$player->name = $newPlayer;
 				$player = $user->players()->save($player);
				$tournament->players()->attach($player->id);
 			}
 		}
 		
		$players = Input::get('players');
 		if(!empty($players)) {
 			
 			foreach($players as $player_id => $state)
 			{
 				if($state != "active") continue;
				$tournament->players()->attach($player_id);
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
 
