<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

use team\Division;
use team\Team;

Route::get('/', function()
{
	return View::make('home');
});

Route::any('home', [
    'as' => 'home',
    function() {
        return View::make('home');
    }
]);
Route::get('forum', 'ForumController@index');
// =============================================
// REGISTRATION ROUTE ==========================
// =============================================
Route::get('register', [
    'as' => 'register_path',
    'uses' =>'RegisterController@index'
]);


Route::post('register_action', 'RegisterController@store');

App::missing(function($exception)
{
	return View::make('index');
});

Route::get('statuses', [
    'as' => 'statuses_path',
    'uses' =>'StatusController@index'
]);
Route::post('statuses', [
    'as' => 'statuses_path',
    'uses' =>'StatusController@store'
]);

Route::get('jobs/store','JobsController@store');

Route::get('users',[
    'as' => 'users_path',
    'uses' => 'UsersController@index']);

Route::get('@{username}',[
    'as'=> 'profile_path',
    'uses'=>'UsersController@show'

]);

Route::post('follows', [
    'as' => 'follows_path',
    'uses' => 'FollowsController@store'
]);

Route::delete('follows/{id}', [
    'as' => 'unfollow_path',
    'uses' => 'FollowsController@destroy'
]);

//This is where angular routes come into play
Route::get('leagueIndex', 'LeagueController@index');
Route::group(array('prefix' => '/team'), function() {
    //Get all the teams
    Route::get('get_teams', [
        'as' => 'get_teams',
        'uses' => 'TeamController@index'
    ]);
    //Get unsigned players
    Route::get('get_unsigned', [
        'as' => 'get_unsigned',
        'uses' => 'TeamController@getUnsignedPlayers'
    ]);

    //get one team
    Route::get('get_team/{id}', [
        'as' => 'get_team/{id}',
        'uses' => 'TeamController@show'
    ]);

    //get one team
    Route::PUT('edit_team/{id}', [
        'as' => 'edit_team/{id}',
        'uses' => 'TeamController@update'
    ]);
    //delete a team
    Route::delete('/delete/{id}', [
        'as' => '/delete/{id}',
        'uses' => 'TeamController@delete'
    ]);

    Route::post('create', [
        'as' => 'create_team',
        'uses' => 'TeamController@store'
    ]);

    //This uses the Division controller since I dont want to create a controller for logos only

});

Route::get('logo', 'LogoControler@logo');
Route::group(array('prefix' => '/logo'), function() {
    //upload file
    Route::post('upload', [
        'as' => 'upload',
        'uses' => 'LogoControler@upload'
    ]);
});
Route::get('divisions', 'DivisionsController@index');
Route::group(array('prefix' => '/division'), function() {
    //Get all the teams
    Route::get('get_divs', [
        'as' => 'get_divs',
        'uses' => 'DivisionsController@showall'
    ]);
    //delete a team
    Route::delete('/delete/{id}', [
        'as' => '/delete/{id}',
        'uses' => 'DivisionsController@delete'
    ]);

    Route::post('create', [
        'as' => 'create_div',
        'uses' => 'DivisionsController@store'
    ]);
});

Route::get('players', 'UsersController@players');

Route::get('team/team', function()
{
    return View::make('team/team');
});
Route::group(array('prefix' => '/api'), function() {
    Route::get('players', [
        'as' => 'get_players',
        'uses' => 'PlayerController@showall'
    ]);
});

