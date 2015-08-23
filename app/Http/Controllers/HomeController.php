<?php

namespace Jackmarshall\Http\Controllers;

class HomeController extends Controller
{
	/*
	 * Displays the home page
	 */
	public function index()
	{
		return view('home.index');
	}
}
