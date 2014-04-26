<?php

namespace Admin;

use BaseController as Controller;
use Faction;
use Input;
use Redirect;
use Validator;

class UsersController extends Controller {

	public function __construct() {
		$this->beforeFilter('administrator');
	}

	public function index() {
		$this->listing();
	}

	public function listing() {
		$this->display('admin.users.listing');
	}

	public function view($user) {
		$this->display('admin.users.view', array(
			'user' => $user,
		));
	}

	public function edit($user) {
		$this->display('admin.users.edit', array(
			'user' => $user,
		));
	}

	public function update($user) {
		$validator = Validator::make(Input::all(), array(
			'login' => array('unique:users,login'),
			'email' => array('email', 'unique:users,email'),
			'password' => array('same:confirmation'),
			'confirmation' => array('same:password')
		));

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		if(Input::has('login')) {
			$user->login = Input::get('login');
		}
		if(Input::has('password')) {
			$user->password = Hash::make(Input::get('password'));
		}
		if(Input::has('email')) {
			$user->email = Input::get('email');
		}
		$user->rank = Input::get('rank');
		$user->save();
		return Redirect::to('/user/'.$user->login);
	}

	public function delete($user) {
		$user->delete();
		return Redirect::to('/users');
	}

}

?>