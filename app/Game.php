<?php

namespace Jackmarshall;

use Illuminate\Database\Eloquent\Model;

class Game extends Model 
{
	public function tournament() 
	{
			return $this->round()->tournament();
	}
	
	public function round() 
	{
			return $this->belongsTo('Jackmarshall/Round', 'round')->first();
	}
	
	public function reports() 
	{
			return $this->hasMany('Jackmarshall/Report', 'game');
	}
	
	public function user() 
	{
			return $this->tournament()->user();
	}
}
