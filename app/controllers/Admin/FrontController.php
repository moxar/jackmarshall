<?php

namespace Admin;

use BaseController as Controller;

class FrontController extends Controller {

	public function __construct() {
		$this->beforeFilter('administrator');
	}

	public function home() {
		$this->display('admin.front.home');
	}

}

?>