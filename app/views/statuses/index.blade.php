@extends('layouts.master')

@section('title')
    @parent
    :: Post Status
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            @include('layouts.partials.publish-status-from')
            <h2>Statuses</h2>
            @foreach($statuses as $status)
                <article class="media">
                    <div class="status-media media-body">
                        <h4>{{$status->user->username}}</h4>

                        <p>{{$status->created_at->diffForHumans()}}</p>
                        {{$status->body}}

                    </div>

                </article>
            @endforeach
        </div>
    </div>
@stop