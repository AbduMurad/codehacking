@extends('layouts.admin')

@section('content')

    @if(count($replies) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>body</th>
                <th>Post</th>
                <th>Option</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('admin.post', $reply->comment->post_id)}}">View Post</a></td>
                    <td>
                        @if($reply->is_active == 0)
                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            {!! Form::submit('Disapprove', ['class'=>'btn btn-secondary']) !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'Delete', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center">No Replies To Show</h1>
    @endif

@endsection