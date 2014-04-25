<?php

namespace Admin;

use BaseController as Controller;

class FrontController extends Controller {

	public function index() {
		$this->home();
	}

	public function home() {
		$this->display('admin.front.home');
	}
}

?>