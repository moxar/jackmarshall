<?php

namespace Tournament;

use App;
use BaseController;
use Input;
use Redirect;
use Report;

class ReportsController extends BaseController {

	public function __construct() {
		$this->beforeFilter('auth');
	}

	public function getUpdate($report) {
		$this->display('reports.update', array(
			'report' => $report
		));
	}

	public function postUpdate($report) {
		if(!is_null(Input::get('victory'))) {
			$report->victory = Input::get('victory');
		}
		if(!is_null(Input::get('control'))) {
			$report->control = Input::get('control');
		}
		if(!is_null(Input::get('destruction'))) {
			$report->destruction = Input::get('destruction');
		}
		$report->save();

		if(Request::ajax()) {
			return App::make('TournamentsController')->ranking($report->tournament());
		}
		else
		{
			return Redirect::to('rounds/'.$report->round()->id.'/update');
		}
	}

	public function delete($report) {
		$report->delete();
		return Redirect::back();
	}

	public function createMultiple($object, $game) {
		foreach($game['players'] as $player) {
			$report = new Report;
			$report->game = $object->id;
			$report->player = $player;
			$report->save();
		}
	}
}

?>