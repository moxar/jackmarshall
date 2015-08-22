<?php

namespace Jackmarshall;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Auth;

class User extends Model implements AuthenticatableContract 
{
    use Authenticatable;
    
    // Constant name of the ghost player for this user.
    // TODO: rename it afther the User name
	const GHOST = "Fantôme";
	
	protected $hidden = ['password', 'remember_token'];
	
	public function players() 
	{
			return $this->hasMany('Jackmarshall/Player', 'user');
	}
	
	public function playersButFantom() 
	{
	 		return $this->hasMany('Jackmarshall/Player', 'user')->where('players.name', '<>', User::GHOST);
	}
	
	public static function fantom() 
	{
			return Player::where('name', '=', User::GHOST)->where('user', '=', Auth::user()->id)->first();
	}
	
	public function tournaments() 
	{
			return $this->hasMany('Jackmarshall/Tournament', 'user');
	}
	
	public function maps() 
	{
			return $this->hasMany('Jackmarshall/Map', 'user');
	}
}

User::deleting(function(User $user) 
{
	$tournaments = $user->tournaments()->get();
	foreach($tournaments as $tournament) {
		$tournament->delete();
	}
	$user->players()->delete();
});
