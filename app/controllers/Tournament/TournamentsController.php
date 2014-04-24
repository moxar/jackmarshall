<?php

namespace Tournament;

use App;
use Auth;
use BaseController;
use Input;
use Player;
use Redirect;
use Tournament;

class TournamentsController extends BaseController {

	public function index() {
		$this->listing();
	}

	public function listing() {
		$this->display('tournament.tournaments.table', array(
			'tournaments' => Tournament::get()
		));
	}

	public function ranking($tournament) {
		$players = $tournament->orderedPlayers()->get();
		return View::make('players.ranking', array('players' => $players));
	}

	public function show($tournament) {
		$players = $tournament->orderedPlayers()->get();
		$this->display(array(
				'tournament.rounds.table',
				'tournament.players.ranking',
			), array(
				'tournament' => $tournament,
				'players' => $players,
			)
		);
	}

	public function getCreate() {
		$this->display(array('tournament.tournaments.create', 'tournament.players.management'), array(
			'players' => Auth::user()->playersButFantom()->get(),
			'tournament' => new Tournament,
			'tournamentPlayers' => array()
		));
	}

	public function postCreate() {
		$tournament = new Tournament;
		$tournament->user = Auth::user()->id;
		return App::make('TournamentsController')->postUpdate($tournament);
	}

	public function getUpdate($tournament) {
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
		$tournamentPlayers = array();
		foreach($tournament->players as $player) {
			$tournamentPlayers[] = $player->id;
		}
		$this->display(array('tournament.tournaments.update', 'tournament.players.management'), array(
			'players' => Auth::user()->playersButFantom()->get(),
			'tournament' => $tournament,
			'tournamentPlayers' => $tournamentPlayers
		));
	}

	public function postUpdate($tournament) {
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
		$tournament->name = Input::get('name');
		$tournament->save();
		$tournament->players()->detach();
		if(is_array(Input::get('players'))) {
			foreach(Input::get('players') as $key => $value) {
				$tournament->players()->attach($key);
			}
		}
		if(is_array(Input::get('newPlayers'))) {
			foreach(Input::get('newPlayers') as $name) {
				$player = new Player;
				$player->name = $name;
				$player->user = Auth::user()->id;
				$player->save();
				$tournament->players()->attach($player->id);
			}
		}
		if(count(Input::get('newPlayers')) + count(Input::get('players')) % 2 != 0) {
			$tournament->players()->attach(User::fantom()->id);
		}
		return Redirect::to('tournaments/'.$tournament->id);
	}

	public function delete($tournament) {
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
		$tournament->delete();
		return Redirect::back();
	}
}

?>