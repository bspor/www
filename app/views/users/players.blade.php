@extends('layouts.master')

@section('title')
    @parent
    :: Look Up Users
@stop
@section('content')
    <nav class="navbar breadcrumb">
        <ul class="breadcrumb">
            <li><a href="{{ URL::to('leagueIndex') }}">View All Teams</a></li>
            <li><a href="{{ URL::to('divisions') }}">View All Divisions</a>
        </ul>
    </nav>
    <div class="container" ng-app="myApp" ng-controller="PlayerController" ng-view>
        <h1>Teams with players</h1>
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div ng-repeat="player in players track by $index">
        <h3>  %% player.team_name %% </h3>
            <ul >
                <li ng-repeat="p in player.players track by $index">%% p.username %% </li>
            </ul>
        </div>
    </div>
@stop