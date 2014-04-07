<?php

class ReportsController extends BaseController {

	public function getCreate($tournament) {
	
		$players = $tournament->players()->get();
		$opponent = Report::join('players', 'reports.player', '=', 'players.id')->where('game', Input::get('game'))->first();
		
		$this->display('reports.create', array(
			'title' => 'Tournois',
			'scripts' => array('js/JackForm.js', 'js/validator.jquery.js')
		), array(
			'players' => $players,
			'opponent' => $opponent
		));
	}
	
	public function postCreate($tournament) {
	
		$report = new Report();
		$report->tournament = $tournament->id;
		$report->player = Input::get('player');
		$report->victory = is_null(Input::get('victory'))?0:1;
		$report->control = Input::get('control');
		$report->destruction = Input::get('destruction');
		$report->save();
		$report->game = !is_null(Input::get('game'))?Input::get('game'):$report->id;
		$report->save();
		
		if(is_null(Input::get('game')))
			return Redirect::to('reports/'.$tournament->id.'/create?game='.$report->game);
		else
			return Redirect::to('tournaments/'.$tournament->id);
	}
}
?>