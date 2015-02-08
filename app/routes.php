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


Route::group(array('prefix' => '/api'), function() {

	// since we will be using this just for CRUD, we won't need create and edit
	// Angular will handle both of those forms
	// this ensures that a user can't access api/create or api/edit when there's nothing there
	Route::resource('comment', 'CommentController', 
		array('only' => array('index', 'store', 'destroy')));
});
// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception)
{
	return View::make('index');
});


Route::get('leagueIndex', function() {

    return View::make('bearsExample')
// all the bears (will also return the fish, trees, and picnics that belong to them)
        ->with('bears', Bear::all());

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