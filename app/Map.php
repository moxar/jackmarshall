<?php

namespace Jackmarshall;

use Illuminate\Database\Eloquent\Model;

class Map extends Model 
{
	public $timestamps = false;
	
	public function user() 
	{
			return $this->belongsTo('Jackmarshall\User', 'user')->first();
	}
	
	public function maps() 
	{
	 		return $this->belongsToMany('Jackmarshall\Tournament', 'tournaments_maps', 'map', 'tournament');
	}
	
	public function scenarii(Tournament $tournament) 
	{
			return $this->belongsToMany('Jackmarshall\Scenario', 'scenarii_maps', 'map', 'scenario')->where('tournament', $tournament->id);
	}
}