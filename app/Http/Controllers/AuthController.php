<?php

namespace Jackmarshall\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;


class AuthController extends Controller
{
	/*
	 * Displays the login form.
	 */
	public function login()
	{
		return view('auth.login');
	}
	
	/*
	 * Attempts to connect the user.
	 * Redirects back if auth fails.
	 */
	public function attempt(Guard $guard, Request $request, Redirector $redirector)
	{
		if($guard->attempt($request->only('name', 'password'), $request->has('remember_me'))) {
			return $redirector->intended('home.index');
		}
		return $redirector->back();
	}
	
	/*
	 * Logs the user out.
	 */
	public function logout(Guard $guard, Redirector $redirector)
	{
		$guard->logout();
		return $redirector->route('home.index');
	}
}
