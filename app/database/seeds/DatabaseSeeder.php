<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UserTableSeeder');        
        $this->call('PlayerTableSeeder');        
        $this->call('TournamentTableSeeder');
    }

}

class UserTableSeeder extends Seeder {

    public function run() {
    
		Eloquent::unguard();
        DB::table('users')->delete();

        User::create(array(
			'name' => 'UchroniesGames',
			'password' => 'password',
			'email' => 'contact@uchroniesgames.fr',
		));
    }
}

class PlayerTableSeeder extends Seeder {

	public function run() {
    
		Eloquent::unguard();
        DB::table('players')->delete();

		$user = User::first();
        Player::create(array(
			'user' => $user->id,
			'name' => 'Moxar',
		));
        Player::create(array(
			'user' => $user->id,
			'name' => 'Meta',
		));
        Player::create(array(
			'user' => $user->id,
			'name' => 'Aspha',
		));
        Player::create(array(
			'user' => $user->id,
			'name' => 'Naethiel',
		));
        Player::create(array(
			'user' => $user->id,
			'name' => 'Tinkou',
		));
        Player::create(array(
			'user' => $user->id,
			'name' => 'Komikaz',
		));
        Player::create(array(
			'user' => $user->id,
			'name' => 'Mr.B',
		));
        Player::create(array(
			'user' => $user->id,
			'name' => 'Connetable_PA',
		));
    }
}

class TournamentTableSeeder extends Seeder {
	
	public function run() {
	
		Eloquent::unguard();
		DB::table('tournaments')->delete();
		
		$user = User::first();
        Tournament::create(array(
			'user' => $user->id,
			'name' => 'Tournois du 26 avril',
		));
	}
}