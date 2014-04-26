<?php

namespace Admin;

use BaseController as Controller;
use Faction;
use Input;
use Redirect;
use Validator;

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

	public function make() {
		$this->display('admin.factions.new');
	}

	public function create() {
		$validator = Validator::make(Input::all(), array(
			'name' => array('required', 'unique:factions,name'),
			'image' => array('required', 'image'),
		));

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$faction = new Faction();
		$faction->name = Input::get('name');
		$faction->image = Input::file('image');
		$faction->save();

		return Redirect::to(cross('/factions'));
	}

	public function edit($faction) {
		$this->display('admin.factions.edit', array(
			'faction' => $faction,
		));
	}

	public function update($faction) {
		$validator = Validator::make(Input::all(), array(
			'name' => array('unique:factions,name'),
			'image' => array('image'),
		));

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		if(Input::has('name')) {
			$faction->name = Input::get('name');
		}
		if(Input::hasFile('image')) {
			$faction->image = Input::file('image');
		}
		$faction->save();

		return Redirect::to(cross('/factions'));
	}

	public function delete($faction) {
		$faction->delete();
		return Redirect::back();
	}

}

?>