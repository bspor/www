@extends('layouts.master')

@section('title')
    @parent
    :: Secret
@stop

@section('content')

    {{ HTML:: script('js/mainCtrl.js') }}
    {{ HTML:: script('js/commentService.js') }}
    {{ HTML:: script('js/app.js') }}
    <body ng-app="eSport" ng-controller="BearController">
    <div class="col-md-8 col-md-offset-2" ng-view>

        <!-- PAGE TITLE =============================================== -->
        <div class="page-header">
            <h2>Laravel and Angular Single Page Application</h2>
            <h4>Commenting System</h4>
        </div>

        <!-- NEW COMMENT FORM =============================================== -->
        <form ng-submit="submitBear()"> <!-- ng-submit will disable the default form action and use our function -->

            <!-- AUTHOR -->
            <div class="form-group">
                <input type="text" class="form-control input-sm" name="author" ng-model="BearData.name"
                       placeholder="Name">
            </div>
            <!-- AUTHOR -->
            <div class="form-group">
                <input type="text" class="form-control input-sm" name="author" ng-model="BearData.type"
                       placeholder="type">
            </div>
            <!-- AUTHOR -->
            <div class="form-group">
                <input type="text" class="form-control input-sm" name="author" ng-model="BearData.danger_level"
                       placeholder="type">
            </div>


            <!-- SUBMIT BUTTON -->
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>

        <!-- LOADING ICON =============================================== -->
        <!-- show loading icon if the loading variable is set to true -->
        <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

        <!-- THE COMMENTS =============================================== -->
        <!-- hide these comments if the loading variable is true -->
        <div class="comment" ng-hide="loading" ng-repeat="comment in comments">
            <h3>Comment # %% Bear.id %% by %% Bear.name %% is very %% Bear.danger_type %%</h3>

            <p>%% comment.text %%</p>

            <p><a href="#" ng-click="deleteBear(Bear.id)" class="text-muted">Delete</a></p>
        </div>

    </div>
    </body>
@stop

