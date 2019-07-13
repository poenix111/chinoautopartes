<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Chino</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/global.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <link rel="shortcut icon" href="{{asset('img/car.png')}}">
  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>

  @yield('head')

</head>

<body>

  {{-- NAVBAR --}}

  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="/">
      <img src="{{asset('img/car.png')}}" width="30" height="30" class="d-inline-block align-top" alt="Carros">
      Autopartes El Chino
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">


        @if (Auth::check())
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Productos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/product">Mostrar</a>
            <a class="dropdown-item" href="/product/create">Crear</a>
            <a class="dropdown-item" href="/borrados/product">Productos borrados</a>

          </div>
        </li>
        @else
        <li class="nav-item active">
          <a class="nav-link" href="/product">Productos</a>
        </li>
        @endif

        @if (Auth::check())
        <!-- Marca -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Categoría
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/category">Mostrar</a>
            <a class="dropdown-item" href="/category/create">Crear</a>
          </div>
        </li>
        <!-- Modelo -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Modelo
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/modelo">Mostrar</a>
            <a class="dropdown-item" href="/modelo/create">Crear</a>
          </div>
        </li>

        <!-- Marca -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Marca
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/marca">Mostrar</a>
            <a class="dropdown-item" href="/marca/create">Crear</a>
          </div>
        </li>
        @endif

        @if (Auth::check()) {{-- Si el usuario no esta loggueado --}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" ml-auto mr-3 order-lg-last">
          @csrf
          <button type="submit" class="btn btn-danger btn-sm" id="botonEnviar">
            Cerrar sesión
          </button>
        </form>
        @endif
      </ul>
    </div>
  </nav>


  <main>
    @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
    @endif

    @yield('content')

  </main>

  <!-- Footer -->
  <footer class="navbar">

    <!-- Social -->
    <div class="social">
      <a class="fb-ic" href="https://www.facebook.com/CHINO-AUTOPARTES-1414550372093286/">
        <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
      </a>


      <a href="/contacto">
        Contacto
      </a>

  </footer>


</body>


</html>