@extends('layouts.app')
@section('content')
@section('title', 'Inicio')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<div>
  <div class="album py-5">
    <div class="container">
      <div class="row">
        @foreach ($marcas as $m)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            {{-- <a href="/product/ubicacion/{{$u->slug}}"> --}}

            <img src={{$m->image}} width="100%" height="200">
            <div class="card-body">
              <p class="card-text">
                {{$m->nombre}}
            </div>
            </a>
          </div>
        </div>
        @endforeach
        
      </div>
      <div class="pagination justify-content-center " style="margin-top:15%">
          {{ $marcas  ->links() }}
        </div>
    </div>
    
  </div>

</div>
@endsection

</html>