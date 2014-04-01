<?php

class UsersController extends BaseController {

	public function getLogin() {
	
		$this->display('users.login', array(
			'title' => 'Login',
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
			'title' => 'Signin',
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
	
	public function isValidEmail() {
	
		$response = array();
		$response['email'] = "valid";
		$email = Input::get('email');
		if(($email) == null) $response['email'] = "null";
// 		if(!is_email($email)) $response['email'] = "invalid";
		if(!empty(User::where('email', $email)->first())) $response['email'] = "used";
		return Response::json($response);
	}
	
	public function isValidUserName() {
		$reponse = array();
		$response['name'] = "valid";
		if((Input::get('name')) == null) $response['name'] = "null";
		if(!empty(User::where('name', Input::get('name'))->first())) $response['name'] = "used";
		return Response::json($response);
	}
	
	public function isValidPassword()
	{
		$response = array();
		$response['password'] = "valid";
		if(Input::get('password') == null || Input::get('confirm') == null) $response['password'] = "null";
		if(Input::get('password') != Input::get('confirm')) $response['password'] = "invalid";
		return Response::json($response);
	}
}
?>
