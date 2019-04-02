@extends('layouts.app')

@section('title', 'Editing user {{$user->name}} | TestForums')

@section('content')
<form action="/users/{{ $user->id }}" id="saveForm" method="post"  enctype="multipart/form-data">

    @csrf
    @method('patch')
<div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control {{$errors->has('name')?"is-invalid":""}}" id="name" name="name" placeholder="Introduce here your new name"  value='{{isset($user)?$user->name:old('name')}}'>
        @if($errors->has('name'))
        <div class="invalid-feedback">
          {{$errors->first('name')}}
        </div>
        @endif
</div>

<div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control {{$errors->has('email')?"is-invalid":""}}" id="email" name="email" placeholder="Introduce here your new email"  value='{{isset($user)?$user->email:old('email')}}'>
        @if($errors->has('email'))
        <div class="invalid-feedback">
          {{$errors->first('email')}}
        </div>
        @endif
</div>




<div class="form-group">
    @if( isset($user->avatar) )
    <img class="img-fluid" src="http://testforums.test/storage/{{ $user->avatar }}" alt="">
    @endif
    <label for="avatar">Avatar</label>
    <input type="file" class="form-control-file mt-1 {{ $errors->has('avatar')?"is-invalid":"" }}" id="avatar" name="avatar">
    @if( $errors->has('avatar'))
    <div class="invalid-feedback">
        {{ $errors->first('avatar') }}
    </div>
     @endif
</div>

<div class="form-group">
    <label for="password">New password</label>
    <input type="password" name="password" id="password" class="form-control {{$errors->has('password')?"is-invalid":"" }}" placeholder="Introduce your new password" value="">
    @if($errors->has('password'))
        <div class="invalid-feedback">
            {{$errors->first('password')}}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="password_confirmation">Confirm your new password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control {{$errors->has('password_confirmation')?"is-invalid":"" }}" placeholder="Confirm your new password">
    @if($errors->has('password_confirmation'))
        <div class="invalid-feedback">
            {{$errors->first('password_confirmation')}}
        </div>
    @endif
</div>

<button type="submit" id="saveRoom" class="btn btn-primary">Save Changes</button>
</form>

@endsection