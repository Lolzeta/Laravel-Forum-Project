@extends('layouts.app')

@section('title', 'TestForums')

@section('content')
<div class="jumbotron">
<h1 class="text-center message">Welcome to Testforums!</h1>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="/rooms/create"><img class="d-block w-100" src="https://dummyimage.com/800x400/000000/0011ff.png&text=Create+a+room" alt="First slide"></a>
      <div class="carousel-caption d-none d-md-block">
        <h5>You can create a room!</h5>
        <p>Remember to be loged</p>
    </div>
    </div>
    <div class="carousel-item">
    <a href="/rooms/"><img class="d-block w-100" src="https://dummyimage.com/800x400/000000/0011ff.png&text=Visit+rooms" alt="Second slide"></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>You can visit our rooms!</h5>
        <p>And participate on them!</p>
    </div>
    
    </div>
    <div class="carousel-item">
      <a href="/communities/"><img class="d-block w-100" src="https://dummyimage.com/800x400/000000/0011ff.png&text=Visit+communities" alt="Third slide"></a>>
      <div class="carousel-caption d-none d-md-block">
        <h5>You can visit our communities!</h5>
        <p>And see a lot of interesting rooms!</p>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection
