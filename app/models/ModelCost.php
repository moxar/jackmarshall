<?php

class ModelCost extends Eloquent {

	public $timestamps = false;
	protected $table = 'models_costs';

	public function model() {
		return $this->belongsTo('Model');
	}
}

?>