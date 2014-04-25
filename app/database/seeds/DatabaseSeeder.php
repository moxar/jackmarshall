<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		$this->call('UserSeeder');
	}

}

class UserSeeder extends Seeder {

	public function run() {

		Eloquent::unguard();

		DB::table('users')->truncate();
		User::create(array(
			'name' => 'UchroniesGames',
			'password' => Hash::make('password'),
			'email' => 'contact@uchroniesgames.fr',
		));
	}
}
