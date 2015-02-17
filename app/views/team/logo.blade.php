@extends('layouts.master')

@section('title')
    @parent
    :: Team Editor
@stop

@section('content')
    @include('layouts.partials.admin_nav')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="container">
        <div class="form-inline">
            {{ Form::open(array('url'=>'logo/upload','files'=>true)) }}
            {{Form::hidden('team_id', Sentry::getUser()->team_id)}}

            {{ Form::label('LogoName','Logo Upload',array('id'=>'','class'=>'')) }}
            {{ Form::file('LogoUpload','',array('id'=>'','class'=>'')) }}
            <br/>
            <!-- submit buttons -->
            {{ Form::submit('Save') }}

            <!-- reset buttons -->
            {{ Form::reset('Reset') }}

            {{ Form::close() }}
        </div>
    </div>
@stop
