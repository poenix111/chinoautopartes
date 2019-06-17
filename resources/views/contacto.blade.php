@extends('layouts.app')
@section('content')
@section('title', 'Inicio')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link href="{{ asset('css/contacto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">

</head>

<div>
    <div class="container text-muted text-center">
        <div class="card-deck">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dirección</h4>

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                            src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJc47_Vh-yKIQRYyI5j6tQiDE&key=AIzaSyB4BmUjkXY2-4B0fTCuvYGxS459uDz4HS4 "
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

            </div>


            <div class="card text-center">

                <div class="card-body">
                    <h4 class="card-title">Teléfono</h4>
                    <p class="card-text">3334809599</p>
                    <h4 class="card-title">Correo</h4>
                    <p class="card-text">chinoautomic@hotmail.com</p>
                </div>
            </div>


        </div>

    </div>
</div>
@endsection

</html>