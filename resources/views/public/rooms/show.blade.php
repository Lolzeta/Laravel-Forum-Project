@extends('layouts.app')

@section('title', 'TestForums | {{room->name}}')

@section('content')
<div class="d-flex justify-content-center">
  <h1>Room {{$room->name}} from <a class="text-dark" href="/communities/{{$room->community->slug}}" title="Visit community">{{$room->community->name}}</a></h1>
</div>
<div class="card rounded-0">
        <div class="card-body rounded-0">
          <div class="row">
            <div class="col-1 d-flex align-items-center justify-content-center">
              <h4>{{$room->votes->sum('valoration')}}</h4>
            </div>

            <div class="col">
            <h6 class="card-subtitle mb-2 text-muted">{{ $room->user->name}}</h6>
            <p class="card-text">{{ str_limit($room->description, 300) }}</p>

            @include('public.rooms.partials.buttons')
            </div>
          </div>
        </div>
    </div>
    <div id="messages">
    @forelse($room->messages as $message)
    @include('public.messages.show')
    @empty
    <p>No replies</p>
    @endforelse
    </div>
    @auth
    <form action="/messages" id="saveForm" method="post" novalidate>
      @csrf
    <div class="form-group">
        <input type="hidden" name="room_id" id="room_id" value="{{$room->id}}">
        <label for="message">New message</label>
        <textarea class="form-control {{$errors->has('message')?"is-invalid":""}}" id="message" name="message" rows="3" placeholder="You can reply here" required>{{isset($room)?$room->message:old('message')}}</textarea>
        @if($errors->has('message'))
        <div class="invalid-feedback">
          {{$errors->first('message')}}
        </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Send Message</button>
</form>
@include('public.confirmations.delete')
@include('public.confirmations.edit')
@endauth
@endsection
@push('scripts')
<script src="{{ mix('/js/messages/crudMessages.js')  }}" defer></script>
@endpush
