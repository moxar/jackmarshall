<?php

class RoundsController extends BaseController {
	
	public function listing($tournament) {
		
		$this->display('rounds.listing', 
			array(
				'title' => 'Rondes',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'tournament' => $tournament
			)
		);
	}
	
	public function show($round) {
		
		$this->display('rounds.show', 
			array(
				'title' => 'Rondes',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'round' => $round
			)
		);
	}
	
	public function getCreate($tournament) {
		
		$this->display('rounds.create', 
			array(
				'title' => 'Rondes',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'tournament' => $tournament
			)
		);
	}
	}
	
	public function postCreate($tournament) {
	
		$round = new Round;
		foreach(Input::get('games') as $name) {
			
			$game = new Game;
			$game->name = $name;
			$game->save();
		}
	}
	
	public function getUpdate($round) {
		
		$this->display('rounds.update', 
			array(
				'title' => 'Rondes',
				'scripts' => array('js/validator.jquery.js', 'js/JackForm.js')
			),
			array(
				'round' => $round
			)
		);
	}
	
	public function postUpdate($round) {
	}
	
	public function delete($round) {
		
		$round->delete();
		return Redirect::back();
	}
}

?>
 
