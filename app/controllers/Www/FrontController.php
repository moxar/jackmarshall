<?php

namespace Www;

class FrontController extends BaseController {

	public function index() {
		$this->home();
	}

	public function home() {
		$this->display('www.front.home');
	}
}

?>