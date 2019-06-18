@extends('layouts.app')
@section('content')
@section('title', 'Inicio')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<div>
  <div class="album py-5">
    <div class="container">
      <div class="row">
        @foreach ($modelos as $m)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            {{-- <a href="/product/ubicacion/{{$u->slug}}"> --}}

            <div class="card-body">
              <p class="card-text">
                {{$m->nombre}}
            </div>
            </a>
          </div>
        </div>
        @endforeach

      </div>
      <div class="pagination justify-content-center ">
        {{ $modelos  ->links() }}
      </div>
    </div>

  </div>

</div>
@endsection

</html>