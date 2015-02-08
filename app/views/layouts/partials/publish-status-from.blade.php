<h1>Post an Update!</h1>
@include('layouts.partials.erros')
<div class="status-post">
    {{ Form::open(['route' => 'statuses_path']) }}
    <div class="form-group">
        {{Form::label('body', 'Status:')}}
        {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'placeholder'=>"Whats on your mind?"]) }}
    </div>
    <div class="form-group status-post-submit">
        {{Form::submit('Post Status', ['class'=>'btn btn-primary'])}}

    </div>
    {{Form::close()}}
</div>