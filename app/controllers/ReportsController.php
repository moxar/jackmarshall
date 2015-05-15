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
	
	public function postUpdate() {
	
		$reports = Input::get('reports');
		if(is_null($reports)) {
				Redirect::back();
		}
		
		foreach($reports as $r) {
				$report = Report::findOrFail($r)->first();
				$report->fill($r);
				$report->save();
		}
		
		return App::make('TournamentsController')->ranking(Tournament::findOrFail(Input::get('tournament')));
	}
	
	public function delete($report) {
		
		$report->delete();
		return Redirect::back();
	}
	
	public function createMultiple($gameModel, $gameInputs) {
			
		foreach($gameInputs as $player) {
			$report = new Report;
			$report->game = $gameModel->id;
			$report->player = $player;
			$report->save();
		}
	}
}
?>
