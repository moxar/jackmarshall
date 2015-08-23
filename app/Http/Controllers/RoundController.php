<?php

namespace Jackmarshall\Http\Controllers;

use Jackmarshall\Tournament;
use Jackmarshall\Round;
use Jackmarshall\Game;
use Jackmarshall\Report;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;


class RoundController extends Controller
{
	/*
	 * Displays the tournament create form
	 */
	public function create(Tournament $tournament)
	{
		$round = Round::newInstance([
			'number' => 1,
		]);
		$lastRound = $tournament->lastRound();
		if(!is_null($lastRound)) {
			$round->number = $lastRound + 1;
		}
		
		$players = $tournament->players()->ordered()->get()->transform(function($player) 
		{
				$player->id = $player->pivot->player;
		});
		
		$maps = $tournament->maps;
		
		return view('round.create', [
			'tournament' => $tournament,
			'round' => $round,
			'players' => $players,
			'maps' => $maps,
		]);
	}
	
	/*
	 * Create a new round
	 * Also attaches the games and reports related to
	 */
	public function store(Request $request, Redirector $redirector, Tournament $tournament) {
		
		$round = Round::newInstance([
			'number' => $request->input('number'),
			'tournament' => $tournament->id,
		]);
		$round->save();
		
		array_walk($request->input('games'), function($input) use($round) 
		{
			$game = Game::newInstance([
				'round_id' => $round->id,
				'slug' => $input['slug'],
				'map' => $input['map'],
			]);
			$game->save();
			
			array_walk($input['players'], function($input) use($game)
			{
				$report = Report::newInstance([
					'game_id' => $game->id,
					'player_id' => $input,
				]);
				$report->save();
			});
		});
		
		return $redirector->route('round.update', $round->id);
	}
	
	/*
	 * Displays the round edit form
	 */
	public function edit(Round $round)
	{
		$games = $round->games;		
		$players = $round->tournament->players()->ordered()->get();
		
		view('report.update', [
			'round' => $round,
			'games' => $games,
			'players' => $players,
		]);
	}
	
	/*
	 * Removes the given round from database
	 */
	public function delete(Redirector $redirector, Round $round) 
	{		
		$round->delete();
		return $redirector->back();
	}
}
