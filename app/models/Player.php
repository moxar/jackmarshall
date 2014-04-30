<?php

class Player extends Eloquent {

	const FANTOM = 'Fantom';
	
	protected $guarded = array('id');
	public $timestamps = false;
	
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
 
