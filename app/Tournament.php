<?php

namespace Jackmarshall;

use Auth;
use Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Tournament extends Model 
{
	public function user() 
	{
		return $this->belongsTo('Jackmarshall\User', 'user')->first();
	}
	
	public function players() 
	{
 		return $this->belongsToMany('Jackmarshall\Player', 'players_tournaments', 'tournament', 'player');
	}
	
	public function maps() 
	{
 		return $this->belongsToMany('Jackmarshall\Map', 'tournaments_maps', 'map', 'tournament');
	}
	
	public function scopeOrdered($query) 
	{
		return $query->select('*')
			->addSelect('victory')
			->addSelect('control')
			->addSelect('destruction')
			->addSelect('sos')
			->orderBy('victory', 'DESC')
			->orderBy('sos', 'DESC')
			->orderBy('control', 'DESC')
			->orderBy('destruction', 'DESC');
	}
	
	public function scopeRange($query, $from, $to)
	{
		return $query->whereBetween('date', [Carbon::parse($from), Carbon::parse($to)]);
	}
	
	public function playersButFantom() 
	{
 		return $this->belongsToMany('Jackmarshall\Player', 'players_tournaments', 'tournament', 'player')->where('players.name', '<>', User::GHOST);
	}
	
	public function rounds() 
	{
		return $this->hasMany('Jackmarshall\Round', 'tournament');
	}
	
	public function games() 
	{
        return $this->hasManyThrough('Jackmarshall\Game', 'Jackmarshall\Round', 'tournament', 'round');
	}
	
	public function reports() 
	{
		return Report::where('tournaments.id', '=', $this->id)
			->join('games', 'games.id', '=', 'reports.game')
			->join('rounds', 'rounds.id', '=', 'games.round')
			->join('tournaments', 'tournaments.id', '=', 'rounds.tournament');
	}
	
	public function playerReports(Player $player) 
	{
		return $this->reports()->where('reports.player', '=', $player->id);
	}
	
	public function playersReports(Collection $players) 
	{
		$ids = [];
		foreach($players as $player) {
			$ids[] = $player->id;
		}
		return $this->reports()->whereIn('reports.player', $ids);
	}
	
	public function scenarii() 
	{
		return $this->belongsToMany('Jackmarshall\Scenario', 'scenarii_maps', 'tournament', 'scenario');
	}
	
	public function hasCompleteAccess() 
	{
		return Auth::check() && Auth::user() == $this->user();
	}
	
	public function lastRound()
	{
		return $this->rounds()->orderBy('number', 'DESC')->first();
	}
}
Tournament::deleting(function(Tournament $tournament) 
{
	$rounds = $tournament->rounds()->get();
	foreach($rounds as $round) {
		$round->delete();
	}
	$tournament->players()->detach();
	$tournament->maps()->detach();
	$tournament->scenarii()->detach();
});