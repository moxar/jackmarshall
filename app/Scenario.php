<?php

namespace Jackmarshall;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model 
{
	public $timestamps = false;
	public $table = "scenarii";
	
	public function maps(Tournament $tournament) 
	{
		return $this->belongsToMany('Jackmarshall\Map', 'scenarii_maps', 'scenario', 'map')->where('tournament', $tournament->id);
	}
}
