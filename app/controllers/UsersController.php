<?php

class UsersController extends BaseController {

	public function getLogin() {
	
		$this->display('users.login', array(
			'title' => 'Connexion',
		));
	}
	
	public function postLogin() {
	
		if(Auth::attempt(array('name' => Input::get('name'),'password' => Input::get('password'))))
		{					
 			return Redirect::intended('/');
		}
		else
		{
			 return Redirect::to('login');
		}
	}

	public function getSignin() {
	
		$this->display('users.signin', array(
			'title' => 'Inscription',
			'scripts' => array('js/users.js'),
		));
	}
	
	public function postSignin() {
	
		$user = new User();
		$user->name = Input::get('name');
		$user->password = Input::get('password');
		$user->email = Input::get('email');
		
		$user->save();
		return Redirect::to('/');
	}
	
	public function signout()  
	{
		Auth::logout();
		return Redirect::to('/');
	}
	
	public function validateForm() {
	
		$validator = Validator::make(
 			array(
				'name' => Input::get('name'),
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'confirm' => Input::get('confirm')
			), array(
				'name' => array('required', 'min:5', 'unique:users,name'),
				'email' => array('required', 'email', 'unique:users,isEmail'),
				'password' => array('required', 'min:5', 'same:confirm')
			)
		);
		return Response::json($validator->messages()->getMessages());
	}
}

Validator::extend('isEmail', function($attribute, $value, $parameters)
{
    return !empty(Users::whereRaw("LOWER(email) = ?", array(strtolower($parameters['email'])))->get());
});

?>
