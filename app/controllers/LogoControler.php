<?php

use GuzzleHttp\Subscriber\Redirect;
use Intervention\Image\Facades\Image;
use team\Team;

class LogoControler extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /logocontroler
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}
    public function logo () {
        return View::make('team/logo');
    }

    public function upload () {
        $input = Input::all();
        $file_name = $input['LogoUpload']->getClientOriginalName();
        $team = Team::where('team_id', '=', $input['team_id'])->get(array('id', 'team_name'))->first();;
        $upload_path = storage_path().'images/'.$team->teamname.'/';
        //Checks to see if the directory exists, if not create it
        $image = Image::make($input['LogoUpload']->getRealPath());
        File::exists($upload_path) or File::makeDirectory($upload_path);
        //$team = DB::table('teams')->where('team_id', '=', $input['team_id'])->first(); another way to do db queries
        //dd($team->team_name);
        //dd($file_name);

        $image->save($upload_path . $file_name)
            ->resize(200,200)->greyscale()->save($upload_path .'200' .$file_name);
        Session::flash('message', 'Successfully uploaded photo!');
        return View::make('team/logo');
    }
}