<?php

namespace Admin;

use BaseController as Controller;
use Redirect;

class FactionsController extends Controller {

	public function __construct() {
		$this->beforeFilter('administrator');
	}

	public function index() {
		$this->listing();
	}

	public function listing() {
		$this->display('admin.factions.listing');
	}

	public function delete($faction) {
		$faction->delete();
		return Redirect::back();
	}

}

?>