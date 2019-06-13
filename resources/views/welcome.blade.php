@extends('layouts.app')
@section('content')
@section('title', 'Inicio')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



<div>
    {{-- Se esta desarrolando el slider, revisar --}}
    <div class="container">
        <br>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>
      
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img src="https://lh5.googleusercontent.com/-H-d48F21u4Y/AAAAAAAAAAI/AAAAAAAAABU/axGFMUf4bwY/photo.jpg?sz=32" alt="store" width="64" height="64">
            </div>
      
            <div class="carousel-item">
              <img src="https://i.stack.imgur.com/C92ci.png?s=64&g=1" alt="art" width="64" height="64">
            </div>
      
            <div class="carousel-item">
              <img src="https://www.gravatar.com/avatar/fd047157030a440fa1f62e6e1ed87958?s=32&d=identicon&r=PG" alt="Flower" width="64" height="64">
            </div>
      
            <div class="carousel-item">
              <img src="https://www.gravatar.com/avatar/fa3b74688aaf69a2d65fd846b0a82c59?s=32&d=identicon&r=PG&f=1" alt="Flower" width="64" height="64">
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
@endsection

</html>