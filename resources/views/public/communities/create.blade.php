@extends('layouts.app')

@section('title', 'TestForums | New Community')

@section('content')
<form action="/communities" id="saveForm" method="post" novalidate>

    @csrf

    @include('public.communities.partials.form')

@endsection
