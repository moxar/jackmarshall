<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	use UserTrait;

	const GHOST = "Fantôme";
	protected $hidden = array('password');

			// ======== RELATIONS ======== //

	public function players() {
	
		return $this->hasMany('user');
	}
	
	public function tournaments() {
	
		return $this->hasMany('user');
	}
	
	public function maps() {
	
		return $this->hasMany('user');
	}

			// ======== FIN RELATIONS ======== //
	
	public function playersButFantom() {
	
 		return $this->hasMany('Player', 'user')->where('players.name', '<>', User::GHOST);
	}
	
	public static function fantom() {
	
		return Player::where('name', '=', User::GHOST)->where('user', '=', Auth::user()->id)->first();
	}

}

User::deleting(function($user) {
	
	$tournaments = $user->tournaments()->get();
	foreach($tournaments as $tournament) {
		$tournament->delete();
	}
	$user->players()->delete();
});
