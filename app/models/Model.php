<?php

class Model extends Eloquent {

	public $timestamps = false;
	protected $guarded = array('id', 'slug');

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

	public function faction() {
		return $this->belongsTo('Faction');
	}

	public function expansion() {
		return $this->belongsTo('Expansion');
	}

	public function costs() {
		return $this->hasMany('ModelCost');
	}
}

?>