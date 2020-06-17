@extends('layouts.admin')

@section('content')
    
    <h3>Photos</h3>
    
    @if($photos)
        
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Uploaded</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($photos as $photo)
                        <tr>
                            <td>{{$photo->id}}</td>
                            <td><img height="80" width="100" src="{{$photo->file}}" alt=""></td>
                            <td>{{$photo->created_at}}</td>
                            <td>
                                {{Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]])}}
                                <div class="form-group">
                                    {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger']) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    @endif
    
@endsection