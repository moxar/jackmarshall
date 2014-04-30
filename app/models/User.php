<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	protected $hidden = array('password');

	public function getAuthIdentifier() {
		return $this->getKey();
	}

	public function getAuthPassword() {
		return $this->password;
	}

	public function getRememberToken() {
		return $this->remember_token;
	}

	public function setRememberToken($value) {
		//$this->remember_token = $value;
	}

	public function getRememberTokenName() {
		return 'remember_token';
	}
	
	public function players() {
		return $this->hasMany('Player')->where('players.slug', '<>', Player::FANTOM);
	}

	public function fantom() {
		return $this->players()->where('players.slug', Player::FANTOM);
	}
	
	public function contests() {
		return $this->hasMany('Contest');
	}
	
	public function objectives() {
		return $this->hasMany('Objective');
	}

}

?>