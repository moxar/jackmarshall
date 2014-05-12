<?php

class Round extends Eloquent {

	protected $guarded = array('id');
	
	public function contest() {
		return $this->belongsTo('Event');
	}
	
	public function games() {
		return $this->hasMany('Game');
	}
	
	public function reports() {
		return $this->hasManyThrough('Report', 'Game');
	}
	
	public function 
}

?>
 
