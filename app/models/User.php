<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	const GHOST = "fantôme";
	protected $hidden = array('password');

	public function getAuthIdentifier() {
		return $this->getKey();
	}

	public function getAuthPassword() {
		return $this->password;
	}

	public function getReminderEmail() {
		return $this->email;
	}
	
	public function getRememberToken() {
		return $this->remember_token;
	}

	public function setRememberToken($value) {
		$this->remember_token = $value;
	}

	public function getRememberTokenName() {
		return 'remember_token';
	}
	
	public function players() {
	
		return $this->hasMany('Player', 'user');
	}
	
	public function playersButFantom() {
	
 		return $this->hasMany('Player', 'user')->where('players.name', '<>', User::GHOST);
	}
	
	public static function fantom() {
	
		return Player::where('name', '=', User::GHOST)->where('user', '=', Auth::user()->id)->first();
	}
	
	public function tournaments() {
	
		return $this->hasMany('Tournament', 'user');
	}

}

User::deleting(function($user) {
	
	$tournaments = $user->tournaments()->get();
	foreach($tournaments as $tournament) {
		$tournament->delete();
	}
	$user->players()->delete();
});