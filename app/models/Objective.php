<?php

class Objective extends Eloquent {

	protected $guarded = array('id');
	
	public function user() {
		return $this->belongsTo('User');
	}
}

?> 
 
