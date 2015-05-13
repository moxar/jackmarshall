<?php

class MapsController extends BaseController {

	public function index() {
	
		$this->listing();
	}
	
	public function listing() {
		
		$maps = Map::orderBy("name", "ASC")->get();
		
		$this->display('maps.table', [
			'maps' => $maps,
		]);
	}
	
	public function getCreate() {
				
		$this->display(array('maps.create'));
		
	}
	
	public function postCreate() {
		
		$map = new Map;
		$map->user = Auth::user()->id;
		
		return App::make('MapsController')->postUpdate($map);
	}
	
	public function getUpdate($map) {
	
		if($map->user != Auth::user()->id) return Redirect::to('maps');
		
		$this->display(array('maps.update'));
	}
	
	public function postUpdate($map) {
	
		if($map->user != Auth::user()->id) return Redirect::to('maps');
	
		$map->name = Input::get('name');
		$map->save();
		
		return Redirect::to('maps');
	}
	
	public function delete($map) {
	
		if($map->user != Auth::user()->id) return Redirect::to('maps');
		
		$map->delete();
		return Redirect::back();
	}
}

?>
 
