@extends('layouts.app')

@section('title', 'TestForums | {{room->name}}')

@section('content')
    <h2>{{ $room->name }}</h2>
    <h3>{{$room->cathegory}}</h3>
    <h4>{{ $room->creator }}</h4>
    <p>{{ $room->description }}</p>
@endsection
