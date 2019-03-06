@extends('layouts.app')

@section('title', 'TestForums | Room List')

@section('content')
<div class="d-flex justify-content-center">
  <h1>All rooms in our page</h1>
</div>
@forelse($rooms as $room)
    <div class="card rounded-0 mb-2">
        <div class="card-header bg-primary rounded-0">
            <b>{{ $room->name }}   |  <a class="text-dark" href="/communities/{{$room->community->slug}}" title="Visit community">{{$room->community->name}}</a></b></b>
        </div>
        
        <div class="card-body rounded-0">
          <div class="row">
            <div class="col-1 d-flex align-items-center justify-content-center">
              <h4>{{$room->votes->sum('valoration')}}</h4>
            </div>

            <div class="col">
            <h6 class="card-subtitle mb-2 text-muted">{{ $room->user->name}}</h6>
            <p class="card-text">{{ str_limit($room->description, 300) }}</p>

            @include('public.rooms.partials.buttons')
            <a href="/rooms/{{ $room->slug }}" class="btn btn-primary btn-sm mr-2 float-right">More Info</a>
            </div>
          </div>
        </div>
    </div>
  
    @empty
      <p>We don't have rooms. Sorry!</p>
    @endforelse
<div class="d-flex justify-content-center">
  {{$rooms->links()}}
</div>
@endsection
