@extends('layouts.app')

@section('title', 'TestForums | Room List')

@section('content')
<div class="d-flex justify-content-center">
  {{$rooms->links()}}
</div>
@forelse($rooms as $room)

    <div class="card mb-2">
        <div class="card-header">
            <b>{{ $room->name }}  |  {{$room->category}}</b>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">{{ $room->user->name}}</h6>
            <p class="card-text">{{ str_limit($room->description, 300) }}</p>
            <p class="card-text">Votes: {{$room->votes}}</p>

            @include('public.rooms.partials.buttons')
            <a href="/rooms/{{ $room->slug }}" class="btn btn-primary btn-sm mr-2 float-right">More Info</a>


      </div>
    </div>
    @empty
      <p>We don't have rooms. Sorry!</p>
    @endforelse
<div class="d-flex justify-content-center">
  {{$rooms->links()}}
</div>
@endsection
