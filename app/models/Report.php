<?php

class Report extends Eloquent {

	public function player() {
	
		return $this->belongsTo('Player', 'player')->first();
	}

	public function tournament() {
	
		return $this->game()->round()->tournament();
	}
	
	public function round() {
		
		return $this->game()->round();
	}
	
	public function game() {
		
		return $this->belongsTo('Game', 'game')->first();
	}
	
	public function user() {
		
		return $this->tournament()->user();
	}
}
