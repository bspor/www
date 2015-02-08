@extends('layouts.master')
<?php $currentUser=Sentry::getUser() ?>
@section('title')
    @parent
    :: View User
@stop
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="pull-left">
                {{$user->username}}
                <p class="text-muted">{{$statusCount = $user->statuses->count()}}  {{str_plural('Status',$statusCount)}}</p>
                <p> {{$user->present()->followerCount}}</p>
                @include ('layouts.partials.avatar', ['size' => 50])
                @unless($user->is($currentUser))
                @include ('layouts.partials.follow-form')
                @endunless
            </div>
        </div>
        <div class="col-md-6">
            @if($user->is($currentUser))
                @include('layouts.partials.publish-status-from')
            @endif

            @if($user->statuses->count())
            @foreach($user->statuses as $status)
                <article class="media">

                    <div class="status-media media-body">
                        <div class="pull-left">
                            @include ('layouts.partials.avatar', ['size' => 25])
                        </div>

                        <h4>{{$status->user->username}}</h4>

                        <p>{{$status->created_at->diffForHumans()}}</p>
                        {{$status->body}}

                    </div>

                </article>
            @endforeach
                @else
                <p>This user hasn't yet posted a status.</p>
            @endif


        </div>
    </div>

@stop