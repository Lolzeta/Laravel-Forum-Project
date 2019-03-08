@extends('layouts.app')

@section('title', 'TestForums | Edit Room')

@section('content')
<form action="/rooms/{{ $room->id }}" id="saveForm" method="post"  enctype="multipart/form-data">

    @csrf
    @method('patch')

    @include('public.rooms.partials.form')
  @endsection
