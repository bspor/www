<?php
use team\Division;

/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 2/14/2015
 * Time: 8:01 PM
 */


class DivisionsController  extends \BaseController {
    public function index()
    {
        return View::make('division/division');
    }

    public  function showall () {
        $divs = Division::all();
        return $divs ;
    }

    public function delete ($id) {
        Division::destroy($id);
        //return View::make('division/division');
        return Response::json(array('success' => true));
    }

    public function store () {
        return Division::create(Input::all());
    }
}