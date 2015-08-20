<?php

class Map extends Eloquent {

        public $timestamps = false;

			// ======== RELATIONS ======== //

	public function user() {
	
		return $this->belongsTo('user');
	}
	
	public function scenarii(Tournament $tournament) {
	
		return $this->belongsToMany('Scenario')->where('tournament_id', $tournament->id);
	}
}
			// ======== FIN RELATIONS ======== //
