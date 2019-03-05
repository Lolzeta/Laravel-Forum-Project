@extends('layouts.app')

@section('title', 'TestForums | Edit Community')

@section('content')
<form action="/communities/{{$community->id}}" id="saveForm" method="post" novalidate>

    @csrf
    @method('patch')
    @include('public.communities.partials.form')

@endsection
