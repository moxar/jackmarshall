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
		
        DB::table('users')->truncate();
        User::create(array(
			'name' => 'UchroniesGames',
			'password' => Hash::make('password'),
			'email' => 'contact@uchroniesgames.fr',
		));
    }
}

class PlayerTableSeeder extends Seeder {

	public function run() {
    
		Eloquent::unguard();
		$user = User::first();
		
        DB::table('players')->truncate();
		DB::table('players')->insert(array(
			array('user' =>$user->id, 'name' => Player::GHOST),
			array('user' => $user->id, 'name' => 'Moxar'),
			array('user' => $user->id, 'name' => 'Meta'),
			array('user' => $user->id, 'name' => 'Aspha'),
			array('user' => $user->id, 'name' => 'Naethiel'),
			array('user' => $user->id, 'name' => 'Tinkou'),
			array('user' => $user->id, 'name' => 'Komikaz'),
			array('user' => $user->id, 'name' => 'Mr.B'),
			array('user' => $user->id,'name' => 'Connetable_PA'),
		));
    }
}

class TournamentTableSeeder extends Seeder {
	
	public function run() {
	
		Eloquent::unguard();
		$user = User::first();
		DB::table('tournaments')->truncate();
		DB::table('players_tournaments')->truncate();
		
		$tournament = new Tournament(array(
			'user' => $user->id,
			'name' => 'Tournois du 26 avril',
		));
		$tournament->save();
		
		foreach(Player::where('name', '<>', Player::GHOST)->get() as $player) {
			$tournament->players()->attach($player->id);
		}
	}
}

class RoundTableSeeder extends Seeder {
	
	public function run() {
	
		Eloquent::unguard();
		
		$tournament = Tournament::first();
		$players = count($tournament->players()->get());
		$rounds = array();
		
		$rt = 1;
		while($players != 1) {
			$rounds[] = array('tournament' => $tournament->id, 'number' => $rt);
			$players /= 2;
			$rt++;
		}
		
		DB::table('rounds')->truncate();
		DB::table('rounds')->insert($rounds);
	}
}

class GameTableSeeder extends Seeder {

	public function run() {
	
		Eloquent::unguard();
		$rounds = Round::get();
		$games = array();
		
		foreach($rounds as $round) {
			for($gt = 1; $gt <= 4; $gt++) {
				$games[] = array('round' => $round->id, 'slug' => 'ronde '.$round->number.': table '.$gt);
			}
		}
		
		DB::table('games')->truncate();
		DB::table('games')->insert($games);
	}
}

class ReportTableSeeder extends Seeder {

	public function run() {
	
		Eloquent::unguard();
		$tournament = Tournament::first();
		$games = $tournament->games()->orderBy('id', 'ASC')->get();
		$players = $tournament->players()->orderBy('id', 'ASC')->get();
		
		DB::table('reports')->truncate();
		DB::table('reports')->insert(array(
			array('game' => $games[0]->id, 'player' => $players[0]->id, 'victory' => 1, 'control' => 5, 'destruction' => 18),
			array('game' => $games[0]->id, 'player' => $players[1]->id, 'victory' => 0, 'control' => 4, 'destruction' => 5),
			array('game' => $games[1]->id, 'player' => $players[2]->id, 'victory' => 1, 'control' => 2, 'destruction' => 22),
			array('game' => $games[1]->id, 'player' => $players[3]->id, 'victory' => 0, 'control' => 0, 'destruction' => 6),
			array('game' => $games[2]->id, 'player' => $players[4]->id, 'victory' => 1, 'control' => 5, 'destruction' => 21),
			array('game' => $games[2]->id, 'player' => $players[5]->id, 'victory' => 0, 'control' => 1, 'destruction' => 16),
			array('game' => $games[3]->id, 'player' => $players[6]->id, 'victory' => 1, 'control' => 0, 'destruction' => 16),
			array('game' => $games[3]->id, 'player' => $players[7]->id, 'victory' => 0, 'control' => 0, 'destruction' => 12),
			
			array('game' => $games[4]->id, 'player' => $players[0]->id, 'victory' => 1, 'control' => 5, 'destruction' => 18),
			array('game' => $games[4]->id, 'player' => $players[2]->id, 'victory' => 0, 'control' => 4, 'destruction' => 5),
			array('game' => $games[5]->id, 'player' => $players[4]->id, 'victory' => 1, 'control' => 2, 'destruction' => 22),
			array('game' => $games[5]->id, 'player' => $players[6]->id, 'victory' => 0, 'control' => 0, 'destruction' => 6),
			array('game' => $games[6]->id, 'player' => $players[1]->id, 'victory' => 1, 'control' => 5, 'destruction' => 21),
			array('game' => $games[6]->id, 'player' => $players[3]->id, 'victory' => 0, 'control' => 1, 'destruction' => 16),
			array('game' => $games[7]->id, 'player' => $players[5]->id, 'victory' => 1, 'control' => 0, 'destruction' => 16),
			array('game' => $games[7]->id, 'player' => $players[7]->id, 'victory' => 0, 'control' => 0, 'destruction' => 12),
			
			array('game' => $games[8]->id, 'player' => $players[0]->id, 'victory' => 1, 'control' => 5, 'destruction' => 18),
			array('game' => $games[8]->id, 'player' => $players[4]->id, 'victory' => 0, 'control' => 4, 'destruction' => 5),
			array('game' => $games[9]->id, 'player' => $players[1]->id, 'victory' => 1, 'control' => 2, 'destruction' => 22),
			array('game' => $games[9]->id, 'player' => $players[2]->id, 'victory' => 0, 'control' => 0, 'destruction' => 6),
			array('game' => $games[10]->id, 'player' => $players[5]->id, 'victory' => 1, 'control' => 5, 'destruction' => 21),
			array('game' => $games[10]->id, 'player' => $players[6]->id, 'victory' => 0, 'control' => 1, 'destruction' => 16),
			array('game' => $games[11]->id, 'player' => $players[3]->id, 'victory' => 1, 'control' => 0, 'destruction' => 16),
			array('game' => $games[11]->id, 'player' => $players[7]->id, 'victory' => 0, 'control' => 0, 'destruction' => 12),
		));
		
		foreach($players as $player) {
			$player->updateScore($tournament);
		}
	}
}