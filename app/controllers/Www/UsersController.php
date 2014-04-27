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
			'password' => array('required', 'confirmed'),
		));

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$user = new User();
		$user->login = Input::get('login');
		$user->password = Hash::make(Input::get('password'));
		$user->email = Input::get('email');
		$user->rank = 'user';
		$user->save();
		Auth::login($user);
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

		Session::flash('errors', array(trans('validation.custom.wrong_credentials')));
		return Redirect::back()->withInput();
	}

	public function disconnect() {
		Auth::logout();
		return Redirect::back();
	}
}

?>