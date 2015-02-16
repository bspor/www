@extends('layouts.master')

@section('title')
    @parent
    :: Bears
@stop

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
    {{ HTML:: script('js/main.js') }}
    <style>
        small { font-size: .8em; color: grey; }
    </style>
    <div ng-app="myApp" ng-controller="BearsController" ng-view>

    <h1>
        Bears
        <small ng-if="remaining()">(%% remaining() %% remaining)</small>
    </h1>

    <input type="text" placeholder="Filter bears" ng-model="search">

    <ul>
        <li ng-repeat="bear in bears | filter:search">
            <input type="checkbox" ng-model="bear">
            %% bear.name %% , %%bear.danger_level%%, %%bear.type%%
        </li>
    </ul>
        <!-- NEW bear FORM =============================================== -->
        <form ng-submit="addBear()"> <!-- ng-submit will disable the default form action and use our function -->

            <div class="form-group">
                <input type="text" class="form-control input-sm" name="name" ng-model="bear.name" placeholder="Name">
            </div>

            <div class="form-group">
                <input type="text" class="form-control input-lg" name="type" ng-model="bear.type" placeholder="Type">
            </div>

            <div class="form-group">
                <input type="text" class="form-control input-lg" name="danger_level" ng-model="bear.danger_level" placeholder="Danger level">
            </div>

            <!-- SUBMIT BUTTON -->
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>

    </div>
@stop

