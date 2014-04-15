<?php

class Round extends Eloquent {

	public function tournament() {
		
		return $this->belongsTo('Tournament', 'tournament')->first();
	}

	public function games() {
		
		return $this->hasMany('Game', 'round');
	}
	
	public function reports() {
	
        return $this->games()->reports();
	}
	
	public function user() {
	
		return $this->tournament()->user()->first();
	}
}
 
Round::deleting(function($round) {

	$round->games()->delete();
});
