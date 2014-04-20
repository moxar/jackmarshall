<?php

class GamesController extends BaseController {

	public function createMultiple($round) {
	
		foreach(Input::get('games') as $game) {
			
			$g = new Game;
			$g->round = $round->id;
			$g->slug = $game['slug'];
			$g->save();
			
			App::make('reportsController')->createMultiple($g, $game);
		}
	}
}
?>
