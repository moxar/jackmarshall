<?php

class Faction extends Eloquent {

	public $timestamps = false;
	protected $fillable = array('name', 'image');

	public static function boot() {
		parent::boot();

		static::creating(function($faction) {
			$faction->slug = Str::slug($faction->name);

			if(!File::exists($faction->getDirPath(true))) {
				File::makeDirectory($faction->getDirPath(true), 0777, true);
			}

			$image = Image::make($faction->image->getRealPath());
			$faction->image = $faction->getImagePath();
			$image->resize(25, 25);
			$image->save($faction->getImagePath(true));
		});

		static::updating(function($faction) {
			if($faction->isDirty('image')) {
				unlink($faction->getImagePath(true));
				$image = Image::make($faction->image->getRealPath());
				$image->resize(25, 25);
				$image->save($faction->getImagePath(true));
				$faction->image = $faction->getOriginal('image');
			}

			if($faction->isDirty('name')) {
				$oldImagePath = $faction->getImagePath(true);
				$faction->slug = Str::slug($faction->name);
				$faction->image = $faction->getImagePath();
				File::move($oldImagePath, $faction->getImagePath(true));
			}

			return count($faction->getDirty()) != 0;
		});

		static::deleted(function($faction) {
			File::delete($faction->getImagePath(true));
		});
	}

	private function getDirPath($absolute = false) {
		if($absolute) {
			return public_path().'/'.Config::get('jack.paths.factions');
		}
		return Config::get('jack.paths.factions');
	}

	private function getImagePath($absolute = false) {
		if($absolute) {
			return public_path().'/'.Config::get('jack.paths.factions').'/'.$this->slug.'.png';
		}
		return Config::get('jack.paths.factions').'/'.$this->slug.'.png';
	}

}
