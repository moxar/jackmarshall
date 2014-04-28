<?php

class Model extends Eloquent {

	public $timestamps = false;
	protected $fillable = array('faction_id', 'type', 'name', 'field_allowance', 'parent_id', 'expansion');

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
}

?>