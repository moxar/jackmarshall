<?php

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

?>