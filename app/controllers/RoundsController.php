<?php

class RoundsController extends BaseController {

	public function __construct()
    {
		$this->beforeFilter('auth');
	}

	public function index() {
	
		$this->listing();
	}
	
	public function listing() {
	}
	
	public function show($round) {
	}
	
	public function getCreate() {
	}
	
	public function postCreate() {
	}
	
	public function getUpdate() {
	}
	
	public function postUpdate() {
	}
	
	public function delete($round) {
		
		$round->delete();
		return Redirect::back();
	}
}
?>
 
