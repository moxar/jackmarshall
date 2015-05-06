<?php

class TournamentsController extends BaseController {

	public function index() {
	
		$this->listing();
	}
	
	public function listing() {
		
		$tournaments = Tournament::orderBy("created_at", "DESC")->get();
		
		$this->display('tournaments.table', [
			'tournaments' => $tournaments,
		]);
	}
	
	public function ranking($tournament) {
		
		$players = $tournament->orderedPlayers()->get();
		
		return View::make('players.ranking', array('players' => $players));
	}
	
	public function show($tournament) {
	
		$players = $tournament->orderedPlayers()->get();
		
		$this->display(array('rounds.table', 'players.ranking'), array(
			'tournament' => $tournament,
			'players' => $players,
		)
		);
	}
	
	public function getCreate() {
				
		$term = Input::get('term', '');
		$players =  Auth::user()
				->playersButFantom()
				->where('name', 'LIKE', '%'.$term.'%')
				->orderBy('name')
				->get();
				
		$this->display(array('tournaments.create', 'players.management'), array(
			'players' => $players,
			'tournament' => new Tournament,
			'tournamentPlayers' => array()
		));
		
	}
	
	public function postCreate() {
		
		$tournament = new Tournament;
		$tournament->user = Auth::user()->id;
		
		return App::make('TournamentsController')->postUpdate($tournament);
	}
	
	public function continuous() {
	
		$ids = array_keys(Input::get('tournaments'));
		$tournaments = Tournament::WhereIn('id', $ids)->get();
		$players = Player::all();
		
		$tournaments->each(function($t) use(&$players) {
			foreach($t->orderedPlayers()->get() as $ranking => $player) {
				$players->find($player->id)->addTournamentScore($ranking);
			}
		});
		
		$players = $players->filter(function($player) {
			return $player->ts > 0;
		})->sortByDesc('ts');
		
		$this->display('tournaments.continuous', [
			'players' => $players,
		]);
		
	}
	
	public function getUpdate($tournament) {
	
		if($tournament->user != Auth::user()->id) return Redirect::to('tournaments');
		
		$tournamentPlayers = array();
		foreach($tournament->players as $player) {
			$tournamentPlayers[] = $player->id;
		}
				
		$this->display(array('tournaments.update', 'players.management'), array(
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
		
		$ids = Input::get('players.ids', []);
		$names = Input::get('players.names', []);
		
		foreach($ids as $key => $value) {
			$tournament->players()->attach($key);
		}		
		
		foreach($names as $name => $void) {
			$player = new Player;
			$player->name = $name;
			$player->user = Auth::user()->id;
			$player->save();
			$tournament->players()->attach($player->id);
		}
		
		if(count($names) + count($ids) % 2 != 0) {
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
 
