<?php

class GamesController extends BaseController {

	public function createMultiple($round) {
	
		foreach(Input::get('games') as $game) {
		
			$g = new Game;
			$g->round = $round->id;
			$g->slug = $game['slug'];
			$g->map = $game['map'];
			
			$g->save();
			
			App::make('ReportsController')->createMultiple($g, $game['players']);
		}
	}
}
?>
