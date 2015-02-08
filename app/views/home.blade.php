@extends('layouts.master')

@section('title')
    @parent
    :: Home
@stop

@section('content')
    <div class="jumbotron">
        <h1>Welcome to Larabook</h1>

        <p>This page is created using a master template.</p>

        <p>This page is created using a master template.</p>
        @if(!Sentry::check())
            {{ HTML::link('/user/signup', 'Sign Up', ['class' => 'btn btn-lg btn-primary'])}}

        @endif
    </div>
@stop