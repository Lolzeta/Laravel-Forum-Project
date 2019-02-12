@extends('layouts.app')

@section('title', 'TestForums | {{room->name}}')

@section('content')
    <h2>{{ $room->name }}</h2>
    <h4>{{ $room->user->name}}</h4>
    <p>{{ $room->description }}</p>
    <hr>
    @forelse($room->messages as $message)
    <u><b>{{$message->user->name}}</b></u>
    <p>{{$message->message}}</p>
    <hr>
    @empty
    <p>No replies</p>
    @endforelse
    @auth
    <form action="/messages" id="saveForm" method="post" novalidate>
      @csrf
    <div class="form-group">
        <label for="message">New message</label>
        <textarea class="form-control {{$errors->has('message')?"is-invalid":""}}" id="message" name="message" rows="3" placeholder="Room Description" required>{{isset($room)?$room->message:old('message')}}</textarea>
        @if($errors->has('message'))
        <div class="invalid-feedback">
          {{$errors->first('message')}}
        </div>
        @endif
    </div>
    <button type="submit" id="saveMessage" class="btn btn-primary">Send Message</button>
</form>
@endauth
@endsection
