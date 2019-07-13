@extends('layouts.app')
@section('content')
@section('title', 'Inicio')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
<meta name="viewport" content="width=device-width, user-scalable=no">
<script src="lazysizes.min.js" async=""></script>
<div>
  {{-- Se esta desarrolando el slider, revisar --}}
  <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" style="background-color: black;" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" style="background-color: black;" data-slide-to="1"></li>
        <li data-target="#myCarousel" style="background-color: black;" data-slide-to="2"></li>
        <li data-target="#myCarousel" style="background-color: black;" data-slide-to="3"></li>
        <li data-target="#myCarousel" style="background-color: black;" data-slide-to="4"></li>

      </ol>

      <!-- Wrapper for slides -->



      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">

          <img class="img-responsive img-cus"
            src="https://upload.wikimedia.org/wikipedia/commons/7/7f/Audi_logo_detail.svg" alt="Audi">
        </div>

        <div class="carousel-item">
          <img class="img-responsive img-cus lazyload" data-srcset="small.jpg 500w,
          medium.jpg 640w,
          big.jpg 1024w" sizes="(min-width: 1000px) 930px, 90vw"
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Nissan-logo.svg/1189px-Nissan-logo.svg.png"
            alt="Nissan">
        </div>

        <div class="carousel-item">
          <img class="img-responsive img-cus lazyload"
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/ToyotaLogoRedVer.svg/1280px-ToyotaLogoRedVer.svg.png"
            alt="Toyota">
        </div>

        <div class="carousel-item">

          <img class="img-responsive img-cus lazyload"
            src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Ford-Motor-Company-Logo.png" alt="Ford">
        </div>

        <div class="carousel-item">
          <div class="container text-muted text-center">

            <h4>Conocenos</h4>

            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item"
                src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJc47_Vh-yKIQRYyI5j6tQiDE&key=AIzaSyB4BmUjkXY2-4B0fTCuvYGxS459uDz4HS4 "
                allowfullscreen>
              </iframe>

            </div>


          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right icon-next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>


        </div>
      </div>

    </div>
    <br>
    <br>
  </div>


  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-3 centrar">Autopartes el chino</h1>
      <p class="lead"> Autopartes el chino es un negocio local ubicado en Guadalajara, Jalisco en la Calle #651, se
        dedica a vender principalmente refacciones de colision </p>

      <p class="lead centrar">
        <a class="btn btn-primary btn-lg" href="/product" role="button">Buscar Productos</a>
      </p>
    </div>
  </div>
  @endsection

</html>