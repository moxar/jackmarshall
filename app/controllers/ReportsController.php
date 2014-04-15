<?php

class ReportsController extends BaseController {

	public function __construct()
    {
		$this->beforeFilter('auth');
	}
	
	public function getUpdate() {
	
	}
	
	public function postUpdate() {
	}
	
	public function delete($report) {
		
		$report->delete();
		return Redirect::back();
	}
}
?>
 
