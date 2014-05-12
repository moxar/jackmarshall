<?php

class ModelsSeeder extends Seeder {

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
		$costs = array();
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
			$costs = array();
			$quantities = explode(',', $reference['number']);
			$points = explode(',', $reference['cost']);
			for($i = 0; $i < count($quantities); $i++) {
				$costs[] = array(
					'model_id' => $reference['id'],
					'quantity' => $quantities[$i],
					'cost' => $points[$i],
				);
			}

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

		$chunks = array_chunk($costs, 100);
		foreach($chunks as $chunk) {
			ModelCost::insert($chunk);
		}
	}
}

?>