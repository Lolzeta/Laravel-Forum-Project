@extends('public.layout')

@section('title', 'TestForums | New Room')

@section('content')
<form action="/rooms" method="post" novalidate>

    @csrf

    @include('public.rooms.partials.form')
    
@endsection
