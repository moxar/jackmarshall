<?php

class Player extends Eloquent {

	public static function boot() {
		parent::boot();
		
		static::deleting(function($player) {
			Score::where('player_id', $player->id)->delete();
		});
}
?> 
 
