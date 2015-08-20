<?php

class Scenario extends Eloquent {

	public $timestamps = false;
	public $table = "scenarii";
	
	public function maps(Tournament $tournament) {
	
		return $this->belongsToMany('Map', 'scenarii_maps', 'scenario', 'map')->where('tournament', $tournament->id);
	}
}
