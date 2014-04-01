<?php

class HomeController extends BaseController {

	public function index() {
	
		$this->display('home', array(
			'title' => 'Accueil',
		));
	}
}
?>
 
