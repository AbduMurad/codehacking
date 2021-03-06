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
                {!! Form::select('category_id',  $categories, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Choose New Photo:') !!}
                {!! Form::file('photo_id', null) !!}
            </div>
            <div class="img-thumbnail">
                <img height="" src="{{$post->photo ? $post->photo->file : ""}}" alt="">
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Content:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-3">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
        {!! Form::submit('Delete Post', ['class' => 'btn btn-danger pull-right']) !!}
        {!! Form::close() !!}
    </div>

@endsection