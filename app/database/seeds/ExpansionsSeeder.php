<?php

class ExpansionsSeeder extends Seeder {

	public function run() {

		Eloquent::unguard();

		DB::table('expansions')->truncate();

		$expansions = array();
		foreach(glob(__DIR__.'/expansions/*') as $file) {
			$name = basename($file);
			$expansions[] = array(
				'name' => ucwords($name),
				'slug' => Str::slug($name),
				'release' => '0000-00-00',
			);
		}

		Expansion::insert($expansions);
	}

}

?>