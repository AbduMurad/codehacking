@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    <div class="row">
        @if(session('deleted-post'))
            <div class="alert alert-danger">
                {{session('deleted-post')}}
            </div>
        @elseif(session('updated-post'))
            <div class="alert alert-warning">
                {{session('updated-post')}}
            </div>
        @endif
    </div>

    @if($posts)

        <table class="table">
            <thead>
            <th>Id</th>
            <th>User</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category_id}}</td>
                    <td>
                        <img height="40" src="{{$post->photo ? $post->photo->file : "No Image To Show"}}" alt="">
                    </td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForhumans()}}</td>
                    <td>{{$post->updated_at->diffForhumans()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <h3>No posts to show</h3>
    @endif

@endsection