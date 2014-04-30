<?php

class Report extends Eloquent {

	protected $fillable = array('*');
	
	public function game() {
		return $this->belongsTo('Game');
	}
	
	public function player() {
		return $this->belongsTo('Player');
	}
	
	public function objective() {
		return $this->belongsTo('Objective');
	}
}

?>
 
