<?php

class Objective extends Eloquent {

	public static function boot() {
		parent::boot();
		
		static::deleting(function($objective) {
			Score::where('objective_id', $objective->id)->delete();
		});
	}
}
?> 
 
