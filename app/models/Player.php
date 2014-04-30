<?php

class Player extends Eloquent {

	protected $guarded = array('id');
	
	public function user() {
		return $this->belongsTo('User');
	}
	
	public function reports() {
		return $this->hasMany('Report');
	}
	
	public function scores() {
		return $this->hasMany('Score');
	}
}

?> 
 
