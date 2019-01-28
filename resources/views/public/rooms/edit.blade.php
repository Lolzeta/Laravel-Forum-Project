@extends('layouts.app')

@section('title', 'TestForums | Edit Room')

@section('content')
<form action="/rooms/{{ $room->id }}" method="post" novalidate>

    @csrf
    @method('patch')

    @include('public.rooms.partials.form')
  @endsection
