@extends('layouts.app')

@section('title', 'TestForums')

@section('content')

<h1 class="text-center">Welcome to Testforums!</h1>
<div id="carousel4" class="carousel slide w-100 m-auto" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel4" data-slide-to="0" class="active"></li>
        <li data-target="#carousel4" data-slide-to="1"></li>
        <li data-target="#carousel4" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="img-fluid w-100" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/250px-Unofficial_JavaScript_logo_2.svg.png" alt="Primera imagen">
            <div class="carousel-caption d-none d-md-block">
                <h5>Primera Imagen</h5>
                <p>Imagen de Prueba de Informáticos</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="img-fluid w-100" src="https://cdn-images-1.medium.com/max/1200/1*Vr5hW7ykUC3l1V1yHa6Rfw.png" alt="Segunda imagen">
            <div class="carousel-caption d-none d-md-block">
                <h5>Segunda Imagen</h5>
                <p>Imagen de Prueba de Informáticos</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="img-fluid w-100" src="https://www.valuecoders.com/blog/wp-content/uploads/2018/05/laravel.jpg" alt="Tercera imagen">
            <div class="carousel-caption d-none d-md-block">
                <h5>Tercera Imagen</h5>
                <p>Imagen de Prueba de Informáticos</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carousel4" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel4" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endsection
