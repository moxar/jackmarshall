<?php

class UsersController extends BaseController {

	public function login() {
	
		$this->display('users.login', array(
			'title' => 'Login'
		));
	}
	
	public function signin() {
	
		if(Auth::attempt(array('name' => Input::get('login'),'password' => Input::get('password'))))
		{					
 			return Redirect::intended('/');
		}
		else
		{
			 return Redirect::to('login');
		}
	}
	
	public function signout()  
	{
		Auth::logout();
		return Redirect::to('/');
	}
}
?>
