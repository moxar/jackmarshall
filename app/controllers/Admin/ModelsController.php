<?php

namespace Admin;

use BaseController as Controller;
use Config;
use Input;
use Model;
use Redirect;
use Validator;

class ModelsController extends Controller {

	public function __construct() {
		$this->beforeFilter('administrator');
	}

	public function listing() {
		$this->display('admin.models.listing');
	}

	public function make() {
		$this->display('admin.models.new');
	}

	public function create() {
		$validator = Validator::make(Input::all(), array(
			'faction_id' => array('required', 'exists:factions,id'),
			'type' => array('required', 'in:'.implode(',', Config::get('jack.types'))),
			'name' => array('required', 'unique:models,name'),
			'points' => array('required', 'regex:/[0-9]+:[0-9]+(,[0-9]+:[0-9]+)*/'),
			'field_allowance' => array('required', 'regex:/U|C|[0-9]+/'),
			'parent_id' => array('exists:models,id'),
			'expansion' => array('required', 'in:'.implode(',', Config::get('jack.expansions'))),
		));

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$model = new Model(Input::all());
		$model->save();

		return Redirect::to(cross('/models'));
	}
}

?>