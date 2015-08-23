<?php

namespace Jackmarshall\Http\Controllers;

use Jackmarshall\Scenario;
use Illuminate\Http\Request;

class ScenarioController extends Controller
{	
	/*
	 * Displays the scenario list, ordered by season and reference
	 * If a season is specified, the scenarios are filtered in consequence
	 */
	public function index(Request $request)
	{		
		$term = $request->input('season');
		if(is_null($term)) {
			$scenarios = Scenario::orderBy('season');
		}
		else {
			$scenarios = Scenario::where('season', $term);
		}
		
		$scenarios = $scenarios->orderBy('reference')->get();
		return view('scenario.index', [
			'scenarios' => $scenarios,
		]);
	}
}
