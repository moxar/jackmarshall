<?php

namespace Tournament;

use BaseController;
use Response;
use Validator;

class ValidationsController extends BaseController {

	public function validateSignin() {
		$validator = Validator::make(
 			array(
				'name' => Input::get('name'),
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'confirm' => Input::get('confirm'),
			), array(
				'name' => array('required', 'min:5', 'isUnique:users,name'),
				'email' => array('required', 'email', 'isUnique:users,email'),
				'password' => array('required', 'min:5', 'same:confirm'),
				'confirm' => array('required', 'min:5', 'same:password'),
			)
		);
		return Response::json($validator->messages()->getMessages());
	}

	public function validateLogin() {
		$validator = Validator::make(
 			array(
				'name' => Input::get('name'),
				'password' => Input::get('password'),
			), array(
				'name' => array('required'),
				'password' => array('required'),
			)
		);
		return Response::json($validator->messages()->getMessages());
	}
}

?>