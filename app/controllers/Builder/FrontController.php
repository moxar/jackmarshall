<?php

namespace Builder;

class FrontController extends BaseController {

	public function index() {
		$this->home();
	}

	public function home() {
		$this->display('builder.front.home');
	}
}

?>