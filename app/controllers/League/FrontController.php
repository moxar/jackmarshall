<?php

namespace League;

class FrontController extends BaseController {

	public function index() {
		$this->home();
	}

	public function home() {
		$this->display('league.front.home');
	}
}

?>