<?php

class Scenario extends Eloquent {

	public $timestamps = false;
	public $table = "scenarii";

			// ======== RELATIONS ======== //

	public function maps(Tournament $tournament) {
	
		return $this->belongsToMany('Map')->where('tournament', $tournament->id);
	}
}
			// ======== FIN RELATIONS ======== //
