<?php

namespace Jackmarshall\Http\Controllers;

use Jackmarshall\Tournament;
use Jackmarshall\Player;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;


class TournamentController extends Controller
{	
	/*
	 * Displays all tournaments with pagination
	 */
	public function index()
	{
		$tournaments = Tournament::orderBy('date', 'DESC')->paginate();
		
		return view('tournament.index', [
			'tournaments' => $tournaments,
		]);
	}
	
	/*
	 * Displays a scored list of players who participates
	 * In a given tournament range
	 */
	public function continuous(Request $request)
	{
	
		$players = Player::all();
		$from = $request->input('from');
		$to = $request->input('to');
		$tournaments = Tournament::range($from, $to)->get();
		
		$tournaments->each(function($tournament) use(&$players) {
			foreach($tournament->players()->ordered()->get() as $ranking => $player) {
				$players->find($player->player)->addTournamentScore($ranking);
			}
		});
		
		$players = $players->filter(function($player) {
			return $player->ts > 0 && $player->name != User::GHOST;
		})->sortByDesc('ts');
		
		return view('tournament.continuous', [
			'players' => $players,
			'from' => $from,
			'to' => $to,
		]);
	}
	
	/*
	 * Displays the given tournament
	 */
	public function show(Tournament $tournament)
	{
	
		$players = $tournament->players()->ordered()->get();
		
		return view('round.show', [
			'tournament' => $tournament,
			'players' => $players,
		]);
	}
	
	/*
	 * Displays the create tournament form
	 */
	public function create(Request $request, Guard $guard)
	{
				
		$term = $request->get('term');
		$players = $guard->user
				->playersButFantom()
				->whereLike('name', '%'.$term.'%')
				->orderBy('name')
				->get();
				
		$maps = $guard->user->maps;
		
		$tournament = Tournament::newInstance();
				
		return view('tournaments.create', [
			'players' => $players,
			'tournament' => $tournament,
			'tournamentPlayers' => [],
			'maps' => $maps,
		]);
	}
	
	/*
	 * Stores the given tournament in database
	 */
	public function store(Guard $guard, Request $request, Redirector $redirector)
	{
		$user = $guard->user();
	
		$tournament = Tournament::newInstance([
			'user_id' => $user->id,
			'name' => $request->input('name'),
			'date' => $request->input('date'),
		]);
	
		$maps = array_keys(Input::get('maps', []));
		$players = array_keys(Input::get('players.ids', []));
		$names = array_keys(Input::get('players.names', []));
		
		// checks map number
		$total = count($names) + count($players);
		if(ceil($total / 2) != count($maps)) {
			return Redirect::back();
		}
		
		$tournament->save();
		$tournament->maps()->sync($maps);
		$tournament->players()->sync($players);
		
		$scenarii = new Collection();
		$tournament->maps->each(function($map) use(&$scenarii, $tournament) {
			if($scenarii->count() < 2) {
					$scenarii = Scenario::where('season', Carbon::now()->year)->get()->shuffle();
			}
			$map->scenarii($tournament)->attach($scenarii->pop()->id, ['tournament' => $tournament->id]);
			$map->scenarii($tournament)->attach($scenarii->pop()->id, ['tournament' => $tournament->id]);
		});
		
		array_map($names, function($name) use($user, $tournament)
		{
			$player = Player::newInstance([
				'name' => $name,
				'user_id' => $user->id
			]);
			$player->save();
			
			$tournament->players()->attach($player->id);
		});
		
		if($total % 2 != 0) {
			$tournament->players()->attach(User::fantom()->id);
		}
		
		return $redirector->route('tournament.show', $tournament->id);
	}
	
	/*
	 * Removes the tournament from database
	 */
	public function delete(Redirector $redirector, Tournament $tournament)
	{
		$tournament->delete();
		return $redirector->back();
	}
}
