@extends('layouts.app')

@section('title', 'TestForums | New Room')

@section('content')
<form action="/rooms" id="saveForm" method="post"  enctype="multipart/form-data">

    @csrf

    @include('public.rooms.partials.form')

@endsection
