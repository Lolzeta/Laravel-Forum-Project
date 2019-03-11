@extends('layouts.app')

@section('title', 'TestForums | {{room->name}}')

@section('content')
<div class="d-flex justify-content-center">
  <h1>Room {{$room->name}} from <a class="text-dark" href="/communities/{{$room->community->slug}}" title="Visit community">{{$room->community->name}}</a></h1>
</div>
<div class="card rounded-0 mb-2" id="room" data-id-room="{{$room->id}}">
        <div class="card-body rounded-0">
          <div class="row">
            <div class="col-2 d-flex align-items-center justify-content-center">
            @include('public.rooms.partials.voteButtons')
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

    @auth
    <div class=" mb-5">
    <form action="/messages" id="saveForm" method="post" novalidate>
      @csrf
      <div id="editor">
        <p>Hello World!</p>
        <p>Some initial <strong>bold</strong> text</p>
        <p><br></p>
      </div>
    <button type="submit" class="btn btn-primary" id="send_message">Send Message</button>
    </form>
    </div>
@endauth
    <div class="border d-flex justify-content-center">
      <h2>Replies</h2>
    </div>
    <div id="messages">
      @include('public.messages.paginationMessages')
    </div>
    <div class="text-center">
      <div class="spinner-border text-primary invisible" id="spinner_paginate" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
@endsection
@push('scripts')
<script src="{{ mix('/js/messages/crudMessages.js')  }}" defer></script>
@endpush

