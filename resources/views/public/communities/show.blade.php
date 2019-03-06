

@extends('layouts.app')

@section('title', 'TestForums | {{community->name}}')

@section('content')
<div class="d-flex justify-content-center">
  <h1>{{$community->name}}</h1>
</div>

<nav class="border">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Posts</a>
    <a class="nav-item nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Info</a>
    <a class="nav-item nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
    @can('manipulate',$community)
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Settings</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/communities/{{ $community->id }}/edit">Edit</a>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete-confirmation">Delete</a>
    </div>
    </li>
    @endcan
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="border tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts">
@forelse($rooms as $room)
  
    <div class="card rounded-0">
        <div class="card-header bg-primary rounded-0">
            <b>{{ $room->name }}</b>
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
</div>

<div class="border tab-pane fade" id="info" role="tabpanel" aria-labelledby="info">
<div class="d-flex justify-content-center">
  <h1>About {{$community->name}}</h1>
</div>
<p class="ml-2">{{$community->description}}</p>
</div>

<div class="border tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact">
<p class="ml-2">If you need help for this community, you can contact the creator at:
{{$community->user->email}}</p>
</div>
</div>

@can('manipulate', $community)
<div class="modal fade" id="delete-confirmation" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">CONFIRMATION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                <form action="/communities/{{ $community->id }}" method="post" class="mr-2 float-right">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-success">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection


