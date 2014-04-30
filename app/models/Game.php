<?php

class Game extends Eloquent {

	protected $guarded = array('id');
	
	public function round() {
		return $this->belongsTo('Round');
	}
	
	public function reports() {
		return $this->hasMany('Report');
	}
}

?>
