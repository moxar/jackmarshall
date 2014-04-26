<?php

class Faction extends Eloquent {

	public $timestamps = false;

	public static function boot() {
		parent::boot();

		static::creating(function($faction) {
			$faction->slug = Str::slug($faction->name);

			if(!File::exists(Config::get('jack.paths.assets').'/'.Config::get('jack.paths.factions'))) {
				File::makeDirectory(Config::get('jack.paths.assets').'/'.Config::get('jack.paths.factions'), 0777, true);
			}

			$image = Image::make($faction->image->getRealPath());
			$faction->image = Config::get('jack.paths.factions').'/'.$faction->slug.'.png';
			$image->resize(25, 25);
			$image->save(Config::get('jack.paths.assets').'/'.$faction->image);
		});

		static::deleted(function($faction) {
			File::delete(Config::get('jack.paths.assets').'/'.$faction->image);
		});
	}

}
