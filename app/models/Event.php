<?php

class Event extends Eloquent {

	protected $fillable = array('user_id', 'type', 'name', 'slug');

	public static function boot() {
		parent::boot();

		static::saving(function($event) {
			if($event->isDirty('name')) {
				$event->slug = Str::slug($event->name);
			}
			Score::where('event_id', $event->id)->delete();
		});
		
		static::deleting(function($event) {
			Score::where('event_id', $event->id)->delete();
		});
	}

	public function leagues() {
		return Event::where('type', 'league');
	}
	
	public function attachScores($objectives, $players) {
		foreach($objectives as $objective) {
			foreach($players as $player) {
				$score = new Score(array(
					'event_id' => $this->id, 
					'objective_id' => $objective['id'], 
					'player_id' => $player['id'],
				));
				$score->save();
			}
		}
	}
}
?> 
