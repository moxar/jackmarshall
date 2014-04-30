<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		$this->call('UsersSeeder');
// 		$this->call('FactionsSeeder');
//		$this->call('ModelsSeeder');
		$this->call('PlayersSeeder');
	}

}

?>
