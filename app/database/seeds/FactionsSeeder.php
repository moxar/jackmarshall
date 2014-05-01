<?php

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FactionsSeeder extends Seeder {

	public function run() {

		Eloquent::unguard();

		DB::table('factions')->truncate();

		$references = include __DIR__.'/factions/factions.php';

		foreach($references as $id => $reference) {
			$image = __DIR__.'/factions/'.$reference['image'];
			$faction = new Faction();
			$faction->id = $id;
			$faction->name = $reference['name'];
			$faction->image = new UploadedFile($image, $reference['image'], mime_content_type($image), filesize($image), UPLOAD_ERR_OK, false);
			$faction->save();
		}
	}

}

?>