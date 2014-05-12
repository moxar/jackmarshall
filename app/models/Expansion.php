<?php

class Expansion extends Eloquent {

	public $timestamps = false;
	protected $guarded = array('id', 'slug');

	public static function boot() {
		parent::boot();

		static::saving(function($faction) {
			$faction->slug = Str::slug($faction->name);
		});
	}

	public function models() {
		return $this->hasMany('Model');
	}

}
