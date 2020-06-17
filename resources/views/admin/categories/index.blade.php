@extends('layouts.admin')


@section('content')

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Category Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Add Category', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>


    <div class="col-sm-6">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at->diffForhumans()}}</td>
                        <td>{{$category->updated_at->diffForhumans()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection