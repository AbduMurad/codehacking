@extends('layouts.admin')

@section('content')

    <h3>Edit Post</h3>

    <div class="row">
            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', array(''=>'options', '1'=>'Science'), null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Content:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>

@endsection