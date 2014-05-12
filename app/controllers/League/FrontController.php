<?php

namespace League;

use BaseController as Controller;

class FrontController extends Controller {

	public function index() {
		$this->home();
	}

	public function home() {
		$this->display('league.front.home');
	}
}

?>