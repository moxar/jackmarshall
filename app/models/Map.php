<?php

class Map extends Eloquent {

        public $timestamps = false;
	
	public function user() {
	
		return $this->belongsTo('user');
	}
	
	public function maps() {
	
 		return $this->belongsToMany('Tournament', 'tournaments_maps', 'map', 'tournament');
	}
	
	public function scenarii(Tournament $tournament) {
	
		return $this->belongsToMany('Scenario', 'scenarii_maps', 'map', 'scenario')->where('tournament', $tournament->id);
	}
}
