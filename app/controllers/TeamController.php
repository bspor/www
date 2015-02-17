<?php

use Illuminate\Support\Facades\View;
use models\User;
use team\Team;

class TeamController extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /team
     *
     * @return Response
     */
    public function index()
    {
        $teams = Team::with('Division', 'Players')->get();
        return $teams;
    }

    /**
     * Show the form for creating a new resource.
     * GET /team/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /team
     *
     * @return Response
     */
    public function store()
    {
        return Team::create(Input::all());
    }

    /**
     * Display the specified resource.
     * GET /team/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $team = Team::with('Division', 'Players')->findOrFail($id);
        //return $team;
        return View::make('team/team')->withTeam($team);
    }


    public function getUnsignedPlayers()
    {
        $unsigned = User::where('team_id', '<', '1')->get(array('id', 'username'));//array can be passed in here
        //$someUsers = User::where('team_id', '<', 1)->paginate(15, array('id', 'username'));
        return $unsigned;
    }

    /**
     * Show the form for editing the specified resource.
     * GET /team/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        dd('dat edit!');
    }

    /**
     * Update the specified resource in storage.
     * PUT /team/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
            $team = Team::find($id);
            $team->team_name = Input::get('team_name');
            $team->logo = Input::get('logo');
            $team->wins = Input::get('wins');
            $team->losses = Input::get('losses');
            $team->points = Input::get('points');
            $team->div_id = Input::get('div_id');

            $team->save();

            // redirect
            Session::flash('message', 'Successfully updated team!');
            return 'success';
            //return Redirect::to('leagueIndex')with($team->name);

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /team/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function delete($id)
    {
        Team::destroy($id);
        Session::flash('message', 'Successfully deleted team!');
        return Response::json(array('success' => true));
    }

}