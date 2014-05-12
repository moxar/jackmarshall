<?php

namespace Admin;

use BaseController as Controller;
use Config;
use Input;
use Model;
use Redirect;
use Validator;
use Urlstack;

class ModelsController extends Controller {

	public function __construct() {
		$this->beforeFilter('administrator');
	}

	public function listing() {
		$models = Model::select('*');
		if(Input::has('sort')) {
			$sorts = explode(',', Input::get('sort'));
			$orders = explode(',', Input::get('order'));
			for($i = 0; $i < count($sorts); $i++) {
				$models = $models->orderBy($sorts[$i], $orders[$i]);
			}
		}
		$this->display('admin.models.listing', array(
			'models' => $models->paginate(15),
		));
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
			'expansion_id' => array('required', 'exists:expansions,id'),
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
			'expansion_id' => array('exists:expansions,id'),
		));

		if($validator->fails()) {
			Urlstack::rewind(2);
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$model->update(Input::all());

		return Redirect::to(Urlstack::top(3));
	}
}

?>