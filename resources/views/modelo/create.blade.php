@extends('layouts.app')
@section('title', 'Crear Modelo')
@section('head')
<link href="{{ asset('css/misc.css') }}" rel="stylesheet">
@endsection
@section('content')


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Registrar Modelo') }}</div>

        <div class="card-body">
          <form method="POST" action="/modelo">
            @csrf @method('POST')

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" name="name" required autofocus>
              </div>
            </div>
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary" id="botonEnviar">
                Registrar Modelo
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection