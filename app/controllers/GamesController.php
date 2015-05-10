<?php

class GamesController extends BaseController {

	public function createMultiple($round) {
	
		foreach(Input::get('players') as $k => $game) {
			
			$g = new Game;
			$g->round = $round->id;
			$g->slug = "game ".$k;
			$g->save();
			
			App::make('ReportsController')->createMultiple($g, $game);
		}
	}
}
?>
