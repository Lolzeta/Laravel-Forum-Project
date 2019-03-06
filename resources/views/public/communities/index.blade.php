@extends('layouts.app')

@section('title', 'TestForums | Community List')

@section('content')
<div class="d-flex justify-content-center">
  <h1>Our communities!</h1>
</div>
@forelse($communities as $community)

    <div class="card mb-2">
        <div class="card-header bg-primary ">
            <b>{{ $community->name }}</b>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">{{ $community->user->name}}</h6>
            <p class="card-text">{{ str_limit($community->description, 300) }}</p>

            @include('public.communities.partials.buttons')
            <a href="/communities/{{ $community->slug }}" class="btn btn-primary btn-sm mr-2 float-right">Visit community</a>
      </div>
    </div>
    @empty
      <p>We don't have communities. Sorry!</p>
    @endforelse
<div class="d-flex justify-content-center">
  {{$communities->links()}}
</div>
@endsection
