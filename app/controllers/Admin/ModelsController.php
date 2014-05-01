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

	public function view($model) {
		$this->display('admin.models.view', array(
			'model' => $model,
		));
	}

	public function edit($model) {
		$this->display('admin.models.edit', array(
			'model' => $model,
		));
	}

	public function update($model) {
		$validator = Validator::make(Input::all(), array(
			'faction_id' => array('exists:factions,id'),
			'type' => array('in:'.implode(',', Config::get('jack.types'))),
			'name' => array('unique:models,name,'.$model->id),
			'field_allowance' => array('regex:/U|C|[0-9]+/'),
			'parent_id' => array('exists:models,id'),
			'expansion' => array('in:'.implode(',', Config::get('jack.expansions'))),
		));

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$model->update(Input::all());

		return Redirect::to(cross('/models'));
	}
}

?>