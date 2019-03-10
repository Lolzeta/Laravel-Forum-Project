@extends('layouts.app')

@section('title', 'TestForums | about')

@section('content')

<h1>About</h1>

TestForums is a forum that was created for a project. This project includes:
<div>
<a class="btn btn-primary" data-toggle="collapse" href="#languages" role="button" aria-expanded="false" aria-controls="languages">
    Languages, Frameworks and Libs
</a>
<div>
<div class="collapse"id="languages">
<ul class="list-group">
  <li class="list-group-item">Laravel</li>
  <li class="list-group-item">JavaScript</li>
  <li class="list-group-item">JQuery</li>
  <li class="list-group-item">PHP</li>
  <li class="list-group-item">Bootstrap</li>
</ul>
</div>

@endsection
