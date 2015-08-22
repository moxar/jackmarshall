<?php

namespace Jackmarshall;

use Illuminate\Database\Eloquent\Model;

class Report extends Model 
{
	protected $guarded = ['report'];

	public function player() 
	{
			return $this->belongsTo('Jackmarshall\Player', 'player')->firstOrFail();
	}
	public function tournament() 
	{
			return $this->game()->round()->tournament();
	}
	
	public function round() 
	{
				return $this->game()->round();
	}
	
	public function game()
	{		
		return $this->belongsTo('Jackmarshall\Game', 'game')->first();
	}
	
	public function user() 
	{
		return $this->tournament()->user();
	}
	
	public function reset() 
	{
		$this->victory = 0;
		$this->control = 0;
		$this->destruction = 0;
		$this->save();
	}
}

Report::saved(function(Report $report) 
{
	$tournament = $report->tournament();
	$player = $report->player();
	$player->updateScore($tournament);
	$opponents = $player->opponents($tournament)->get();
	foreach($opponents as $opponent) {
		$opponent->updateSos($tournament);
	}
});
