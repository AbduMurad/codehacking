@extends('layouts.admin')


@section('content')

    <div class="row">
        <div class="col-sm-3">
            <div class="img-rounded img-responsive">
                <img height="300" src="{{$user->photo ? $user->photo->file : App\Photo::place_holder}}" alt="Profile Photo">
            </div>
        </div>
        <div class="col-sm-6">
            <h4>Edit User</h4>
            {!! Form::model($user, ['method'=>'Patch', 'action'=>['AdminUsersController@update', $user->id], 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status', 'Status:') !!}
                {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
                {!! Form::label('password_confirm', 'Password Confirmation:') !!}
                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        @include('includes.form-error')
    </div>

@endsection