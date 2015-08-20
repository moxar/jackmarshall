<?php

class Game extends Eloquent {

			// ======== RELATIONS ======== //

	public function tournament() {
	
		return $this->round()->tournament();
	}
	
	public function round() {
	
		return $this->belongsTo('round');
	}
	
	public function reports() {
	
		return $this->hasMany('game');
	}
	
	public function user() {
	
		return $this->round()->tournament()->user();
	}
}
			// ======== FIN RELATIONS ======== //
