<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            Team Leagues
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSS are placed here -->
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/bootstrap-theme.css') }}
        {{ HTML::style('packages/jacopo/laravel-authentication-acl/css/bootstrap.min.css') }}
        {{ HTML::style('packages/jacopo/laravel-authentication-acl/css/style.css') }}
        {{ HTML::style('packages/jacopo/laravel-authentication-acl/css/baselayout.css') }}
        {{ HTML::style('packages/jacopo/laravel-authentication-acl/css/fonts.css') }}
        {{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}
        {{ HTML::style('css/myCss.css') }}
        {{ HTML:: script('//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js') }}
        {{ HTML:: script('http://code.angularjs.org/1.2.3/angular-route.js') }}
        
        <style>
        @section('styles')
            body {
                padding-top: 60px;
            }
        @show
        </style>
        <!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    </head>

    <body>
    @include('layouts.nav')

        <!-- Container -->
        <div class="container">

            <!-- Success-Messages -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Success</h4>
                    {{{ $message }}}
                </div>
            @endif

            <!-- Content -->
            @yield('content')

        </div>
    <!-- Scripts are placed here -->
    {{ HTML::script('js/jquery-1.11.1.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

    {{ HTML:: script('js/main.js') }}
    </body>
</html>