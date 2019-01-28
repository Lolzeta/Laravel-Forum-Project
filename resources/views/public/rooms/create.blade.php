@extends('layouts.app')

@section('title', 'TestForums | New Room')

@section('content')
<form action="/rooms" id="saveForm" method="post" novalidate>

    @csrf

    @include('public.rooms.partials.form')

@endsection
