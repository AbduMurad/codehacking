@extends('layouts.admin')

@section('content')

    @if($comments)
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>body</th>
                <th>Post</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('admin.post', $comment->post_id)}}">View Post</a></td>
                    <td>
                        @if($comment->is_active == 0)
                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            {!! Form::submit('Disapprove', ['class'=>'btn btn-secondary']) !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'Delete', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td><a href="{{route('admin.comment.replies.show', $comment->id)}}">View Replies</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center">No Comments To Show</h1>
    @endif

@endsection