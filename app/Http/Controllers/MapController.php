<?php

namespace Jackmarshall\Http\Controllers;

use Jackmarshall\Map;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;


class MapController extends Controller
{
	/*
	 * Displays the maps of the current user
	 */
	public function index(Guard $guard)
	{
		$maps = $guard->user()->maps()->orderBy('name')->get();
		return view('map.index', [
			'maps' => $maps,
		]);
	}

	/*
	 * Displays the create map form.
	 */
	public function create()
	{
		return view('map.create');
	}
	
	/*
	 * Creates a map in database.
	 */
	public function store(Guard $guard, Request $request, Redirector $redirector)
	{
		$map = Map::newInstance([
			'user_id' => $guard->user()->id,
			'name' => $request->input('name'),
		]);
		$map->save();
		return $redirector->route('map.index');
	}
	
	/*
	 * Displays the form edit map.
	 */
	public function edit(Map $map)
	{
		return view('map.create', [
			'map' => $map,
		]);
	}
	
	/*
	 *Uupdates the given map in database
	 */
	public function update(Request $request, Map $map)
	{
		$map->name = $request->input('name');
		$map->save();
		return $redirector->route('map.index');
	}
	
	/*
	 * Removes the given map from database
	 */
	public function delete(Redirector $redirector, Map $map)
	{
		$map->delete();
		return $redirector->back();
	}
}
