<?php

use Symfony\Component\HttpFoundation\File\UploadedFile;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		$this->call('UsersSeeder');
		$this->call('FactionsSeeder');
		$this->call('ModelsSeeder');
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

class FactionsSeeder extends Seeder {

	public function run() {

		Eloquent::unguard();

		$references = include __DIR__.'/references.php';

		DB::table('factions')->truncate();

		foreach($references['factions'] as $id => $entry) {
			$image = __DIR__.'/'.$entry['image'];
			$faction = new Faction();
			$faction->id = $id;
			$faction->name = $entry['name'];
			$faction->image = new UploadedFile($image, $entry['image'], mime_content_type($image), filesize($image), UPLOAD_ERR_OK, false);
			$faction->save();
		}
	}

}

class ModelsSeeder extends Seeder {

	public function run() {

		Eloquent::unguard();

		$references = include __DIR__.'/references.php';

		DB::table('models')->truncate();

		foreach($references['models'] as $entry) {
			$model = new Model();
			$model->id = $entry['unit_id'];
			$model->name = $entry['unit_name'];
			if($entry['unit_rank'] > 4) {
				$model->type = $references['ranks'][$entry['unit_rank']];
			} else {
				$model->type = $references['ranks'][$entry['unit_rank']][floor($entry['faction_id']/8)];
			}
			$model->field_allowance = $entry['unit_fa'];
			$model->expansion = 'prime';
			$model->faction_id = $entry['faction_id'];
			$model->save();
		}
	}

}
