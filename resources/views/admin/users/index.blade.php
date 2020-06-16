@extends('layouts.admin')

@section('content')

    <h1>Users</h1>

    <div class="row">
            @if(session('deleted-user'))
                <div class="alert alert-danger">
                    {{session('deleted-user')}}
                </div>
            @elseif(session('updated-user'))
            <div class="alert alert-warning">
                {{session('updated-user')}}
            </div>
            @endif
    </div>

    <table class="table">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Photo</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Delete</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                <td>
                    <img height="40" src="{{$user->photo ? $user->photo->file : App\Photo::place_holder}}" alt="" class="img-circle">
                </td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                <td>{{$user->created_at->diffForhumans()}}</td>
                <td>{{$user->updated_at->diffForhumans()}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
                        {!! Form::submit('Delete User', ['class' => 'btn btn-danger pull-right']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection