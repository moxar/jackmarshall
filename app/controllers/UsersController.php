<?php

class UsersController extends BaseController {

	public function getLogin() {
	
		$this->beforeFilter('guest');
		$this->display('users.login', array(
			'title' => 'Connexion',
			'scripts' => array('js/validator.jquery.js', 'js/login.js', 'js/JackForm.js'),
		));
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
	
		$this->beforeFilter('guest');
		$this->display('users.signin', array(
			'title' => 'Inscription',
			'scripts' => array('js/validator.jquery.js', 'js/signin.js', 'js/JackForm.js'),
		));
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
		
		if($validator->passes())
		{
			$user = new User();
			$user->name = Input::get('name');
			$user->password = Hash::make(Input::get('password'));
			$user->email = Input::get('email');
			$user->save();
		}
		return Redirect::to('home');
	}
	
	public function logout() {
		
		$this->beforeFilter('auth');
		Auth::logout();
		return Redirect::to('home');
	}
}

?>
