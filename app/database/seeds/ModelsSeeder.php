<?php

class ModelsSeeder extends Seeder {

	/*
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
	*/

	public function run() {

		Eloquent::unguard();

		DB::table('models')->truncate();

		$factions = array();
		foreach(Faction::all() as $faction) {
			$factions[$faction->slug] = $faction->id;
		}

		$expansions = array();
		foreach(Expansion::all() as $expansion) {
			$expansions[$expansion->slug] = $expansion->id;
		}

		$files = array();
		foreach(glob(__DIR__.'/expansions/*') as $file) {
			$files[basename($file)] = file($file);
		}

		$references = include 'models/references.php';

		$models = array();
		foreach($references as $reference) {
			$model = array(
				'id' => $reference['id'],
				'name' => trim($reference['name']),
				'slug' => Str::slug(trim($reference['name'])),
				'type' => $reference['type'],
				'field_allowance' => $reference['field_allowance'],
				'faction_id' => $factions[$reference['faction']],
				'parent_id' => $reference['parent'],
			);
			foreach($files as $name => $lines) {
				foreach($lines as $line) {
					if(strpos(trim($line), $model['name']) !== false) {
						$model['expansion_id'] = $expansions[Str::slug($name)];
						$models[] = $model;
						continue 3;
					}
				}
			}
			$model['expansion_id'] = null;
			$models[] = $model;
		}

		$chunks = array_chunk($models, 100);
		foreach($chunks as $chunk) {
			Model::insert($chunk);
		}
	}
}

?>