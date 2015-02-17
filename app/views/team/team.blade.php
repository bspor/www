@extends('layouts.master')

@section('title')
    @parent
    :: Team Editor
@stop

@section('content')
@include('layouts.partials.admin_nav')
    <h2>Now editing {{$team->team_name}}</h2>
    <p>{{$team}}</p>

    <style>
        .newspaper {
            -webkit-column-count: 3; /* Chrome, Safari, Opera */
            -moz-column-count: 3; /* Firefox */
            column-count: 3;
        }
        .span {
            float:right;
        }
    </style>
    <div class="container newspaper" ng-app="myApp" ng-controller="TeamController">
        <span>%%count%%</span>
        <div ng-repeat="player in players">
            <label><input type="checkbox" name="checkbox" value=%%player.id%% ng-model="todo.completed">   %%player.username%%</label>
        </div>
    </div>

    <div class="form-control-static">
        {{ Form::model($team, array('route' => array('edit_team/{id}', $team->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::text('team_name', null, array('class' => 'form-control input-sm')) }}
        </div>
        <div class="form-group">
            {{ Form::text('logo', null, array('class' => 'form-control input-sm')) }}
        </div>
        <div class="form-group">
            {{ Form::text('wins', null, array('class' => 'form-control input-sm')) }}
        </div>
        <div class="form-group">
            {{ Form::text('losses', null, array('class' => 'form-control input-sm')) }}
        </div>
        <div class="form-group">
            {{ Form::text('points', null, array('class' => 'form-control input-sm')) }}
        </div>
        <div class="form-group">
            {{ Form::text('div_id', null, array('class' => 'form-control input-sm')) }}
        </div>


        {{ Form::submit('Make edits!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>

@stop