@extends('layouts.app')

@section('title', 'TestForums | {{room->name}}')

@section('content')
<div class="d-flex justify-content-center">
  <h1>Room {{$room->name}} from <a class="text-dark" href="/communities/{{$room->community->slug}}" title="Visit community">{{$room->community->name}}</a></h1>
</div>
<div class="card rounded-0" id="room" data-id-room="{{$room->id}}">
        <div class="card-body rounded-0">
          <div class="row">
            <div class="col-1 d-flex align-items-center justify-content-center">
              <h4>{{$room->votes->sum('valoration')}}</h4>
            </div>
            
            @if($room->image)
            <div class="col-3">
              <img class="img-fluid" src="http://testforums.test/storage/{{ $room->image }}" alt="">
            </div>
            @endif

            <div class="col">
            <h6 class="card-subtitle mb-2 text-muted">{{ $room->user->name}}</h6>
            <p class="card-text">{{ str_limit($room->description, 300) }}</p>

            @include('public.rooms.partials.buttons')
            </div>
          </div>
        </div>
    </div>
    <div id="messages">
      @include('public.messages.paginationMessages')
    </div>
    @auth
    <form action="/messages" id="saveForm" method="post" novalidate>
      @csrf
    <div class="form-group">
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
@endauth
@endsection
@push('scripts')
<script src="{{ mix('/js/messages/crudMessages.js')  }}" defer></script>
@endpush
