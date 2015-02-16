@extends('layouts.master')

@section('title')
    @parent
    :: Team Editor
@stop

@section('content')
    <nav class="navbar breadcrumb">
        <ul class="breadcrumb">
            <li><a href="{{ URL::to('divisions') }}">View All Divisions</a></li>
            <li><a href="{{ URL::to('players') }}">View All Players</a>
        </ul>
    </nav>

    <div class="container" ng-app="myApp" ng-controller="TeamsController" >
        <h1>Teams</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Name</td>
                <td>Logo</td>
                <td>Wins</td>
                <td>Losses</td>
                <td>Points</td>
                <td>Division</td>
                <td>Players</td>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="team in teams track by $index">
                <td>%% team.team_name %%</td>
                <td>%% team.logo %%</td>
                <td>%% team.wins %%</td>
                <td>%% team.losses %%</td>
                <td>%% team.points %%</td>
                <td >%% team.division.name %%</td>
                <td>
                    <select>
                        <option ng-repeat="player in team.players" value="player.username">%% player.username %%</option>
                    </select>
                </td>


                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-sm btn-success" ng-href="team/get_team/%%team.id%%" >Edit this Team</a>
                    <a class="btn btn-sm btn-danger" href="#" ng-click="deleteTeam(team.id)" class="text-muted">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="form-control-static">
            <!-- NEW team FORM =============================================== -->
            <form ng-submit="addTeam()"> <!-- ng-submit will disable the default form action and use our function -->

                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="name" ng-model="team.name"
                           placeholder="Name">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="logo" ng-model="team.logo"
                           placeholder="Logo URL">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="wins" ng-model="team.wins"
                           placeholder="Wins">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="losses" ng-model="team.losses"
                           placeholder="losses">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="points" ng-model="team.points"
                           placeholder="Points">
                </div>

                <!-- SUBMIT BUTTON -->
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary btn-lg">Create Team</button>
                </div>
            </form>

        </div>
    </div>
@stop