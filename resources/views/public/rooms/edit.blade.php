@extends('public.layout')

@section('title', 'TestForums | Edit Room')

@section('content')
<form action="/rooms/{{ $room->id }}" method="post" novalidate>

    @csrf
    @method('patch')

    @include('public.rooms.partials.form')



    <button type="submit" class="btn btn-primary">Edit Room</button>
    </form>
  @endsection
