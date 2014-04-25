<?php

namespace Www;

use Auth;
use BaseController as Controller;
use Hash;
use Input;
use Redirect;
use Session;
use User;
use Validator;

class UsersController extends Controller {

	public function signin() {
		$this->display('www.users.signin');
	}

	public function subscribe() {
		$validator = Validator::make(Input::all(), array(
			'login' => array('required', 'unique:users,login'),
			'email' => array('required', 'email', 'unique:users,email'),
			'password' => array('required', 'same:confirmation'),
			'confirmation' => array('required', 'same:password')
		));

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$user = new User();
		$user->login = Input::get('login');
		$user->password = Hash::make(Input::get('password'));
		$user->email = Input::get('email');
		$user->save();
		return Redirect::to('/');
	}

	public function login() {
		$this->display('www.users.login');
	}

	public function connect() {
		if(Auth::attempt(array(
			'login' => Input::get('login'),
			'password' => Input::get('password')
		))) {
 			return Redirect::intended('/');
		}

		Session::flash('error', true);
		return Redirect::back()->withInput();
	}

	public function disconnect() {
		Auth::logout();
		return Redirect::back();
	}
}

?>