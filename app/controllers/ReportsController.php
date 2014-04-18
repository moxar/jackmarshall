<?php

class ReportsController extends BaseController {

	public function __construct()
    {
		$this->beforeFilter('auth');
	}
	
	public function getUpdate($report) {
	
		$this->display('reports.update', array(
			'report' => $report
		));
	}
	
	public function postUpdate($report) {
		
		$report->victory = Input::get('victory') ? 1 : 0;
		$report->control = Input::get('control');
		$report->destruction = Input::get('destruction');
		$report->save();
		
		return Redirect::to('rounds/'.$report->round().'/update');
	}
	
	public function delete($report) {
		
		$report->delete();
		return Redirect::back();
	}
	
	public function createMultiple($game) {
			
		foreach($game->players as $player) {
		
			$report = new Report;
			$report->game = $game->id;
			$report->player = $player;
			$report->save();
		}
	}
}
?>
