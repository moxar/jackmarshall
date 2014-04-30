<?php

class Event extends Eloquent {

	protected $fillable = array('user_id', 'type', 'name', 'slug');

	public static function boot() {
		parent::boot();

		static::saving(function($event) {
			if($event->isDirty('name')) {
				$event->slug = Str::slug($event->name);
			}
		});
	}

	public function leagues() {
		return Event::where('type', 'league');
	}
}

?> 
