<?php

class UsersSeeder extends Seeder {

	public function run() {

		Eloquent::unguard();

		DB::table('users')->truncate();

		User::create(array(
			'login' => 'UchroniesGames',
			'password' => Hash::make('password'),
			'email' => 'contact@uchroniesgames.fr',
			'rank' => 'administrator',
		));

		User::create(array(
			'login' => 'Elwinar',
			'password' => Hash::make('el01ro'),
			'email' => 'romain.baugue@elwinar.com',
			'rank' => 'administrator',
		));
	}

}

?>