@extends('layouts.master')

@section('title')
    @parent
    :: Team Editor
@stop

@section('content')
    @include('layouts.partials.admin_nav')
    <style>
        div[ng-app] { margin: 10px; }
        .table {width: 100% }
        form[editable-form] > div {margin: 10px 0;}
    </style>
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
                <td><span editable-text="team.team_name" ng-model="team.name" e-required>%% team.team_name || 'empty' %%</span></td>
                <td><span editable-text="team.logo" ng-model="team.logo">%% team.logo || 'empty' %%</span></td>
                <td><span editable-text="team.wins" ng-model="team.wins">%% team.wins || 'empty' %%</span></td>
                <td><span editable-text="team.losses" ng-model="team.losses">%% team.losses || 'empty' %%</span></td>
                <td><span editable-text="team.points" ng-model="team.points">%% team.points || 'empty' %%</span></td>
                <td><span editable-text="team.div_id" ng-model="team.div_id">%% team.div_id || 'empty' %%</span></td>
                <td>
                    <select>
                        <option ng-repeat="player in team.players" value="player.username">%% player.username %%</option>
                    </select>
                </td>
                <td style="white-space: nowrap">
                    <a class="btn btn-sm btn-primary" href="#" ng-click="addTeam(team)" class="text-muted">Save</a>
                    <a class="btn btn-sm btn-danger" href="#" ng-click="deleteTeam(team.id)" class="text-muted">Delete</a>

                </td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-sm btn-success" ng-href="team/get_team/%%team.id%%" >Edit Roster</a>

                </td>
            </tr>
            </tbody>
        </table>
        <button class="btn btn-success" ng-click="addUser()">Add row</button>
    </div>
@stop