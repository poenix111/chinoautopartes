@extends('layouts.app')
@section('head')
@section('title', ($product->nombre))
<link href="{{ asset('css/misc.css') }}" rel="stylesheet">
<link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endsection
@section('content')



<div class="container content">
    <div class="card shadow-sm" style="max-width: 22rem; margin: auto;">

        <img src="{{$product->imagen}}" width="100%" height="200">
        <div class="card-body">
            <h2 class="card-title">{{$product->nombre}}</h2>
            <p class="card-text">

                <div>
                    <h5>Precio: ${{$product->precio}}</h5>
                </div>
            </p>
        </div>
    </div>

    @if (Auth::check())
    
    <br>
    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <form action="{{ url('/product/'.$product->id.'/delete')}}" method="POST">
              @csrf @method('POST')
              <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
            </form>
        </div>

        <div class="btn-group">
            <form action="{{ url('/product/'.$product->id.'/edit')}}" method="POST">
              @csrf @method('POST')
              <button type="submit" class="btn btn-sm btn-success">Editar</button>
            </form>
        </div>
</div>
    @endif
</div>
@endsection