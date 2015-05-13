<?php

class Map extends Eloquent {

        public $timestamps = false;
	
	public function user() {
	
		return $this->belongsTo('User', 'user')->first();
	}
	
	public function maps() {
	
 		return $this->belongsToMany('Tournament', 'tournaments_maps', 'tournament', 'map');
	}
}
 
