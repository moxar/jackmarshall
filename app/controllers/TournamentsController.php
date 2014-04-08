<?php

class TournamentsController extends BaseController {

	public function __construct()
    {
		$this->beforeFilter('auth');
	}

	public function index() {
	
		$this->listing();
	}
	
	public function listing() {
	}
	
	public function show($tournament) {
	}
	
	public function getCreate() {
	}
	
	public function postCreate() {
	}
	
	public function getUpdate() {
	}
	
	public function postUpdate() {
	}
	
	public function delete($tournament) {
		
		$tournament->delete();
		return Redirect::back();
	}
}
?>
 
