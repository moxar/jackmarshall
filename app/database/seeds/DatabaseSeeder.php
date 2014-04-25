<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		$this->call('UsersSeeder');
		$this->call('FactionsSeeder');
	}

}

class UsersSeeder extends Seeder {

	public function run() {

		Eloquent::unguard();

		DB::table('users')->truncate();
		User::create(array(
			'login' => 'UchroniesGames',
			'password' => Hash::make('password'),
			'email' => 'contact@uchroniesgames.fr',
		));
	}
}

class FactionsSeeder extends Seeder {

	public function run() {

		Eloquent::unguard();

		DB::table('factions')->truncate();

		$factions = array(
			array('name' => 'Protectorate of Menoth'),
			array('name' => 'Cygnar'),
			array('name' => 'Khador'),
			array('name' => 'Cryx'),
			array('name' => 'Retribution of Scyrah'),
			array('name' => 'Convergence of Cyriss'),
			array('name' => 'Mercenaries'),
			array('name' => 'Trollbloods'),
			array('name' => 'Legion of Everblight'),
			array('name' => 'Circle of Orboros'),
			array('name' => 'Skorne'),
			array('name' => 'Minions'),
		);

		foreach($factions as $faction) {
			Faction::create($faction);
		}
	}
}
