<?php

namespace Jackmarshall\Http\Controllers;

use Jackmarshall\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;


class UserController extends Controller
{
	/*
	 * Displays the create user form.
	 */
	public function create()
	{
		return view('user.create');
	}
	
	/*
	 * Creates a user in database.
	 */
	public function store(Guard $guard, Request $request, Redirector $redirector)
	{
		// TODO: add a column label to users table.
		// The name column should contain the lowerstring value
		// The label value should contain the properly formated case value
		$this->validate($request, [
			'name' => 'required|unique:users,name|max:255',
			'password' => 'required|confirmed',
		]);
		
		$user = User::newInstance([
			'name' => $request->input('name'),
			'password' => bcrypt($request->input('name')),
		]);
		$user->save();
		
		$guard->login($user);
		
		return $redirector->route('home.index');
	}
}
