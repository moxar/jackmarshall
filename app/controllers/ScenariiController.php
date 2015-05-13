<?php

class ScenariiController extends BaseController {

	public function index() {
	
		$this->listing();
	}
	
	public function listing() {
		
		$scenarii = Scenario::orderBy("season", "DESC")->orderBy("reference", "ASC")->get();
		
		$this->display('scenarii.table', [
			'scenarii' => $scenarii,
		]);
	}
	
	public function getCreate() {
				
		$this->display(array('scenarii.create'));
		
	}
	
	public function postCreate() {
		
		$scenario = new Scenario;
		
		return App::make('ScenariiController')->postUpdate($scenario);
	}
	
	public function getUpdate($scenario) {
		
		$this->display(array('scenarii.update'));
	}
	
	public function postUpdate($scenario) {
	
		$scenario->name = Input::get('name');
		$scenario->reference = Input::get('reference');
		$scenario->season = Input::get('season');
		$scenario->save();
		
		return Redirect::to('scenarii');
	}
	
	public function delete($scenario) {
		
		$scenario->delete();
		return Redirect::back();
	}
}

?>
 
