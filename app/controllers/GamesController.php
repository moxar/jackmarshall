<?php

class GamesController extends BaseController {

	public function createMultiple($round) {
	
		foreach(Input::get('games') as $input) {
			
			$game = new Game;
			$game->round = $round->id;
			$game->slug = $input['slug'];
			$game->save();
			$game->players = $input['players'];
			
			App::make('reportsController')->createMultiple($game);
		}
	}
	
	public function updateMultiple($round) {
	
		foreach(Input::get('games') as $input) {
			
			$game = Game::find($input['id']);
			$game->slug = $input['slug'];
			$game->save();
			$game->players = $input['players'];
		}
	}
}
?>
