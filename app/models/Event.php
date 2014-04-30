<?php

class Event extends Eloquent {

	protected $fillable = array('user_id', 'type', 'name', 'slug');

	public static function boot() {
		parent::boot();

		static::creating(function($model) {
			$model->slug = Str::slug($model->name);
		});

		static::updating(function($model) {
			if($model->isDirty('name')) {
				$model->slug = Str::slug($model->name);
			}
		});
	}

	public function leagues() {
		return Event::where('type', 'league');
	}
}

?> 
