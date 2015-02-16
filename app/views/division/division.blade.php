@extends('layouts.master')

@section('title')
    @parent
    :: Team Editor
@stop

@section('content')
    <nav class="navbar breadcrumb">
        <ul class="breadcrumb">
            <li><a href="{{ URL::to('leagueIndex') }}">View All Teams</a></li>
            <li><a href="{{ URL::to('players') }}">View All Players</a>
        </ul>
    </nav>
    <div class="container" ng-app="myApp" ng-controller="DivisionController">
        <h1>All the Divisions</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Division ID</td>
                <td>Division Name</td>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="div in divisions  | orderBy: 'div_id'">
                <td>%%div.div_id%%</td>
                <td>%%div.name%%</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <a class="btn btn-sm btn-danger" href="#" ng-click="deleteDivision(div.id)" class="text-muted">Delete</a>
                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('nerds/' ) }}">Division Profile</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . '/edit') }}">Edit this Division</a>

                </td>
            </tr>
            </tbody>
        </table>
        <div class="form-control-static">
            <!-- NEW team FORM =============================================== -->
            <form ng-submit="addDiv()"> <!-- ng-submit will disable the default form action and use our function -->

                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="name" ng-model="div.div_id"
                           placeholder="Division Id">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control input-sm" name="logo" ng-model="div.name"
                           placeholder="Division name">
                </div>

                <!-- SUBMIT BUTTON -->
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary btn-lg">Create Team</button>
                </div>
            </form>

        </div>
    </div>
@stop