@extends('layouts.app')
@section('title', 'Agregar Producto')
@section('head')
<link href="{{ asset('css/misc.css') }}" rel="stylesheet">
<link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endsection
@section('content')

<div>
    <div class="main">
        <div class="album py-5">
            <div class="container">
                <div class="row">

                    @foreach ($products as $p)
                    <div class="col-md-4">
                        <a href="{{ url('/borrados/showProduct',[$p->slug]) }}">
                            <div class="card mb-4 shadow-sm">

                                <img src={{$p->imagen}} width="100%" height="200">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{$p->nombre}}
                                    </h5>
                                    <p class="card-text">
                                        <i class="fas fa-dollar-sign"> ${{$p->precio}}</i><br>
                                </div>
                            </div>

                    </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @endsection