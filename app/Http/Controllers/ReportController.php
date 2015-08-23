<?php

namespace Jackmarshall\Http\Controllers;

use Jackmarshall\Report;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;


class ReportController extends Controller
{	
	/*
	 * Updates a batch of reports
	 */
	public function batchUpdate(Request $request, Redirector $redirector)
	{		
		array_map($request->input('reports', []), function($input)
		{
				$report = Report::findOrFail($input['id']);
				$report->fill($input);
				$report->save();
		});
		
		return App::make('TournamentsController')->ranking(Tournament::findOrFail(Input::get('tournament')));
	}
	
	/*
	 * Removes the given report
	 */
	public function delete(Report $report, Redirector $redirector)
	{
		$report->delete();
		return $redirector->back();
	}
}
