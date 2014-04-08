<?php

class Round extends Eloquent {

	public function tournament() {
		
		return $this->belongsTo('Tournament');
	}

	public function games() {
		
		return $this->hasMany('Game', 'round');
	}
	
	public function reports() {
	
        return $this->games()->reports();
	}
}
 
Round::deleting(function($round) {

	$round->games()->delete();
});
