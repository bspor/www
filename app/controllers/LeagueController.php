<?php

use team\Team;

class LeagueController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $team = Team::all();
		return View::make('leagueIndex')->withTeams($team);
	}
}
