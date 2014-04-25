<?php

class Faction extends Eloquent {

	public $timestamps = false;
	protected $fillable = array('name', 'slug', 'parent');

}

Faction::creating(function($faction) {
	$faction->slug = Str::slug($faction->name);
});
