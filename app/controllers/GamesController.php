<?php

class GamesController extends BaseController {

	public function __construct()
    {
		$this->beforeFilter('auth');
	}

	public function index() {
	
		$this->listing();
	}
	
	public function listing() {
	}
	
	public function show($game) {
	}
	
	public function getCreate() {
	}
	
	public function postCreate() {
	}
	
	public function getUpdate() {
	}
	
	public function postUpdate() {
	}
	
	public function delete($game) {
		
		$game->delete();
		return Redirect::back();
	}
}
?>
 
