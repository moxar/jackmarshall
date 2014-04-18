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
	
	public function reducePlayersScore() {

		$player = $this->tournament()->players()
			->select('*')
			->addSelect('victory')
			->addSelect('control')
			->addSelect('destruction')
			->addSelect('sos')
			->where('players.id', '=', $this->player()->id)
			->first();
			
		$this->tournament()->players()->updateExistingPivot($player->id, array(
			"victory" => $player->victory - Report::find($this->id)->victory,
			"control" => $player->control - Report::find($this->id)->control,
			"destruction" => $player->destruction - Report::find($this->id)->destruction,
		), true);
	}
	
	public function improvePlayersScore() {

		$player = $this->tournament()->players()
			->select('*')
			->addSelect('victory')
			->addSelect('control')
			->addSelect('destruction')
			->where('players.id', '=', $this->player()->id)
			->first();
		
		$this->tournament()->players()->updateExistingPivot($player->id, array(
			"victory" => $player->victory + $this->victory,
			"control" => $player->control + $this->control,
			"destruction" => $player->destruction + $this->destruction,
		), true);
	}
}

Report::updating(function($report) {

	$report->reducePlayersScore();
});

Report::updated(function($report) {

	$report->improvePlayersScore();
	$report->tournament()->updateSos();
});

Report::deleting(function($report) {

	$report->reducePlayersScore();
});

Report::created(function($report) {

	$report->improvePlayersScore();
	$report->tournament()->updateSos();
});

Report::deleted(function($report) {

	$report->tournament()->updateSos();
});
