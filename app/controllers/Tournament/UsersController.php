<?php

namespace Tournament;

use Auth;
use BaseController;
use Hash;
use Input;
use Redirect;
use User;
use Validator;

class UsersController extends BaseController {

	public function getLogin() {
		$this->display('users.login');
	}

	public function postLogin() {
		if(Auth::attempt(array(
			'name' => Input::get('name'),
			'password' => Input::get('password')
		)))
		{
 			return Redirect::intended('/');
		}
		else
		{
			return Redirect::to('login');
		}
	}

	public function getSignin() {
		$this->display('users.signin');
	}

	public function postSignin() {
		$validator = Validator::make(
 			array(
				'name' => Input::get('name'),
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'confirm' => Input::get('confirm')
			), array(
				'name' => array('required', 'min:5', 'isUnique:users,name'),
				'email' => array('required', 'email', 'isUnique:users,email'),
				'password' => array('required', 'min:5', 'same:confirm'),
				'confirm' => array('required', 'min:5', 'same:password')
			)
		);
		if($validator->passes()) {
			$user = new User();
			$user->name = Input::get('name');
			$user->password = Hash::make(Input::get('password'));
			$user->email = Input::get('email');
			$user->save();
		}
		return Redirect::to('/');
	}

	public function logout() {
		Auth::logout();
		return Redirect::to('/');
	}
}

?>