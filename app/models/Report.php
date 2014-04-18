<?php

class Report extends Eloquent {

	public function player() {
	
		return $this->belongsTo('Player', 'player')->first();
	}

	public function tournament() {
	
		return $this->game()->round()->tournament();
	}
	
	public function round() {
		
		return $this->game()->round();
	}
	
	public function game() {
		
		return $this->belongsTo('Game', 'game')->first();
	}
	
	public function user() {
		
		return $this->tournament()->user();
	}
}

Report::saving(function($report) {

	$player = $report->tournament()->players()
		->select('*')
		->addSelect('victory')
		->addSelect('control')
		->addSelect('destruction')
		->where('players.id', '=', $report->player()->id)
		->first();
		
	$report->tournament()->players()->updateExistingPivot($player->id, array(
		"victory" => $player->victory + $report->victory,
		"control" => $player->control + $report->control,
		"destruction" => $player->destruction + $report->destruction,
	), true);
});

Report::updating(function($report) {

	$player = $report->tournament()->players()
		->select('*')
		->addSelect('victory')
		->addSelect('control')
		->addSelect('destruction')
		->where('players.id', '=', $report->player()->id)
		->first();
		
	$report->tournament()->players()->updateExistingPivot($player->id, array(
		"victory" => $player->victory - $report->victory,
		"control" => $player->control - $report->control,
		"destruction" => $player->destruction - $report->destruction,
	), true);
});

Report::deleting(function($report) {

	$player = $report->tournament()->players()
		->select('*')
		->addSelect('victory')
		->addSelect('control')
		->addSelect('destruction')
		->where('players.id', '=', $report->player()->id)
		->first();
		
	$report->tournament()->players()->updateExistingPivot($player->id, array(
		"victory" => $player->victory - $report->victory,
		"control" => $player->control - $report->control,
		"destruction" => $player->destruction - $report->destruction,
	), true);
});