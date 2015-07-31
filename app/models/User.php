<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	use UserTrait;

	const GHOST = "Fantôme";
	protected $hidden = array('password');

	public function getAuthIdentifier() {
		return $this->getKey();
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
	
	public function maps() {
	
		return $this->hasMany('Map', 'user');
	}

}

User::deleting(function($user) {
	
	$tournaments = $user->tournaments()->get();
	foreach($tournaments as $tournament) {
		$tournament->delete();
	}
	$user->players()->delete();
});
