<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UserTableSeeder');        
        $this->call('PlayerTableSeeder');        
        $this->call('TournamentTableSeeder');  
        $this->call('RoundTableSeeder');  
        $this->call('GameTableSeeder');
        $this->call('ReportTableSeeder');
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
		DB::table('players_tournaments')->delete();
		
		$user = User::first();
		$tournament = new Tournament(array(
			'user' => $user->id,
			'name' => 'Tournois du 26 avril',
		));
		$tournament->save();
		
		foreach(Players::get() as $player) {
			$tournament->players()->attach($player->id);
		}
	}
}

class RoundTableSeeder extends Seeder {
	
	public function run() {
	
		Eloquent::unguard();
		DB::table('rounds')->delete();
		
		$tournament = Tournament::first();
        Round::create(array(
			'tournament' => $tournament->id,
			'number' => 1
		));
        Round::create(array(
			'tournament' => $tournament->id,
			'number' => 2
		));
        Round::create(array(
			'tournament' => $tournament->id,
			'number' => 3
		));
	}
}

class GameTableSeeder extends Seeder {

	public function run() {
	
		Eloquent::unguard();
		DB::table('games')->delete();
		
		$rounds = Round::get();
		foreach($rounds as $round) {
			for($ii = 1; $ii <= 4; $ii++) {
				Game::create(array(
					'round' => $round->id,
					'slug' => 'ronde '.$round->number.': table '.$ii,
				));
			}
		}
	}
}

class ReportTableSeeder extends Seeder {

	public function run() {
	
		Eloquent::unguard();
		DB::table('reports')->delete();
		
		$games = Game::get();
		$players = Player::get();
		
		Report::create(array('game' => $games[0]->id, 'player' => $players[0]->id, 'victory' => 1, 'control' => 5, 'destruction' => 18));
		Report::create(array('game' => $games[0]->id, 'player' => $players[1]->id, 'victory' => 0, 'control' => 4, 'destruction' => 05));
		Report::create(array('game' => $games[1]->id, 'player' => $players[2]->id, 'victory' => 1, 'control' => 2, 'destruction' => 22));
		Report::create(array('game' => $games[1]->id, 'player' => $players[3]->id, 'victory' => 0, 'control' => 0, 'destruction' => 06));
		Report::create(array('game' => $games[2]->id, 'player' => $players[4]->id, 'victory' => 1, 'control' => 5, 'destruction' => 21));
		Report::create(array('game' => $games[2]->id, 'player' => $players[5]->id, 'victory' => 0, 'control' => 1, 'destruction' => 16));
		Report::create(array('game' => $games[3]->id, 'player' => $players[6]->id, 'victory' => 1, 'control' => 0, 'destruction' => 16));
		Report::create(array('game' => $games[3]->id, 'player' => $players[7]->id, 'victory' => 0, 'control' => 0, 'destruction' => 08));
		
		
		Report::create(array('game' => $games[4]->id, 'player' => $players[0]->id, 'victory' => 1, 'control' => 5, 'destruction' => 18));
		Report::create(array('game' => $games[4]->id, 'player' => $players[2]->id, 'victory' => 0, 'control' => 4, 'destruction' => 05));
		Report::create(array('game' => $games[5]->id, 'player' => $players[4]->id, 'victory' => 1, 'control' => 2, 'destruction' => 22));
		Report::create(array('game' => $games[5]->id, 'player' => $players[6]->id, 'victory' => 0, 'control' => 0, 'destruction' => 06));
		Report::create(array('game' => $games[6]->id, 'player' => $players[1]->id, 'victory' => 1, 'control' => 5, 'destruction' => 21));
		Report::create(array('game' => $games[6]->id, 'player' => $players[3]->id, 'victory' => 0, 'control' => 1, 'destruction' => 16));
		Report::create(array('game' => $games[7]->id, 'player' => $players[5]->id, 'victory' => 1, 'control' => 0, 'destruction' => 16));
		Report::create(array('game' => $games[7]->id, 'player' => $players[7]->id, 'victory' => 0, 'control' => 0, 'destruction' => 08));
		
		
		Report::create(array('game' => $games[8]->id, 'player' => $players[0]->id, 'victory' => 1, 'control' => 5, 'destruction' => 18));
		Report::create(array('game' => $games[8]->id, 'player' => $players[4]->id, 'victory' => 0, 'control' => 4, 'destruction' => 05));
		Report::create(array('game' => $games[9]->id, 'player' => $players[1]->id, 'victory' => 1, 'control' => 2, 'destruction' => 22));
		Report::create(array('game' => $games[9]->id, 'player' => $players[2]->id, 'victory' => 0, 'control' => 0, 'destruction' => 06));
		Report::create(array('game' => $games[10]->id, 'player' => $players[5]->id, 'victory' => 1, 'control' => 5, 'destruction' => 21));
		Report::create(array('game' => $games[10]->id, 'player' => $players[6]->id, 'victory' => 0, 'control' => 1, 'destruction' => 16));
		Report::create(array('game' => $games[11]->id, 'player' => $players[3]->id, 'victory' => 1, 'control' => 0, 'destruction' => 16));
		Report::create(array('game' => $games[11]->id, 'player' => $players[7]->id, 'victory' => 0, 'control' => 0, 'destruction' => 08));
	}
}