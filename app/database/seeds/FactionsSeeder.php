<?php

use Symfony\Component\HttpFoundation\File\UploadedFile;

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

?>