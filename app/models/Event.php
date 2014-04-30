<?php

class Event extends Eloquent {

	protected $guarded = array('id');

	static public function leagues() {
		return Event::where('type', 'league');
	}

	static public function tournaments() {
		return Event::where('type', 'tournament');
	}
	
	public function rounds() {
		return $this->hasMany('Round');
	}
	
	public function games() {
		return $this->hasManyThrough('Game', 'Round');
	}
	
	public function user() {
		return $this->belongsTo('User');
	}
	
	public function reports() {
		return $this->games()->join('reports', 'reports.game_id', '=', 'games.id');
	}
	
	public function scores() {
		return $this->hasMany('Score');
	}
	
	public function players() {
		return $this->scores()->join('players', 'scores.player_id', '=', 'players.id')
			->select('players.id as id', 'players.name as name', 'players.slug as slug', 'players.user_id as user_id')
			->distinct();
	}
	
	public function objectives() {
		return $this->scores()->join('objectives', 'scores.objective_id', '=', 'objectives.id')
			->select('objectives.id as id', 'objectives.name as name', 'objectives.slug as slug', 'objectives.user_id as user_id')
			->distinct();
	}
	
	public function resetScores($objectives, $players) {
		Score::where('event_id', $this->id)->delete();
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

Event::saving(function($event) {
	if($event->isDirty('name')) {
		$event->slug = Str::slug($event->name);
	}
});
?> 
