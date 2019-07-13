@extends('layouts.app')
@section('title', 'Agregar Producto')
@section('head')
<link href="{{ asset('css/misc.css') }}" rel="stylesheet">
<link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endsection
@section('content')

@php
$categorias = $informacion[0]; // obtiene las variables desde el controlador
$modelos = $informacion[1];
$marcas = $informacion[2];
$show;
@endphp

<div class="container content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="/product" id="register-form" role="form" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">Registrar producto</div>
                    <div class="card-body">
                        @csrf @method('POST')

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text"
                                    class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre"
                                    value="{{ old('nombre') }}" required>

                                @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">Año</label>
                            <div class="col-md-6">
                                <input type="number" min="0" max="100000" step="1" class="form-control" name="year"
                                    required value={{old('year')}}>

                            </div>

                            @if ($errors->has('year'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('year') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">Categoría</label>
                            <div class="col-md-6">
                                <select class="form-control" name="categoria" aria-required="true"
                                    value="{{old('categoria')}}" required>
                                    <option value="">Selecciona una opción</option>
                                    @foreach ($categorias as $nombre)
                                    <option value="{{$nombre->id}}"> {{$nombre->nombre}}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if ($errors->has('categoria'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('categoria') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="modelo" class="col-md-4 col-form-label text-md-right">Modelo</label>
                            <div class="col-md-6">
                                <select class="form-control" name="modelo" aria-required="true" required
                                    value="{{old('modelo')}}">
                                    <option value="">Selecciona una opción</option>
                                    @foreach ($modelos as $m)
                                    <option value="{{$m->id}}"> {{$m->nombre}}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if ($errors->has('modelo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('modelo') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="marca" class="col-md-4 col-form-label text-md-right">Marca</label>
                            <div class="col-md-6">
                                <select class="form-control" name="marca" aria-required="true" required
                                    value="{{old('marca')}}">
                                    <option value="">Selecciona una opción</option>
                                    @foreach ($marcas as $m)
                                    <option value="{{$m->id}}"> {{$m->nombre}}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if ($errors->has('marca'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('marca') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="nuevo" class="col-md-4 col-form-label text-md-right">Nuevo</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="nuevo" id="checkNuevo1" value="1">
                                <label class="form-check-label" for="check">Si</label>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="garantia" class="col-md-4 col-form-label text-md-right">Garantia</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="garantia" id="check" value="1">
                                <label class="form-check-label" for="check">Si</label>
                            </div>

                        </div>


                    </div>
                    <div class="form-group row esconder" id="diasGarantia">
                        <label for="dias" class="col-md-4 col-form-label text-md-right">Dias de garantia</label>
                        <div class="col-md-6">
                            <input type="number" value="0" class="form-control" name="dias" min="0" step="1" required>
                        </div>
                        <script>
                            var checkboxChecked = false;
                           $(document).ready(function(){

                                $('#check').change(function(){
                                    checkboxChecked = !checkboxChecked;
                                    $("#diasGarantia").css("visibility", checkboxChecked ? "visible" : "hidden");
                            });
                        });
                        </script>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>
                        <div class="col-md-6">
                            <div class="custom-file">
                                <input id="foto" type="file"
                                    class="custom-file-input form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}"
                                    name="foto" required accept="image/*" onchange="loadFile(event)">

                                @if ($errors->has('foto'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('foto') }}</strong>
                                </span>
                                @endif

                                <label class="custom-file-label" for="foto">Selecciona un archivo</label>

                            </div>
                            @if ($errors->has('foto'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- Script para obtener el nombre del archivo -->
                        <script>
                            $('#foto').on('change',function(){
                                    //get the file name
                                    var fileName = $(this).val();
                                    //replace the "Choose a file" label
                                    $(this).next('.custom-file-label').html(fileName);
                                })
                        </script>
                        <img class="zoom" id="output" />

                        <div id="myModal" class="modal">

                            <!-- The Close Button -->
                            <span class="close">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="img01">

                            <!-- Modal Caption (Image Text) -->
                            <div id="caption"></div>
                        </div>
                        <script>
                            var loadFile = function(event) {
                            var reader = new FileReader();
                            reader.onload = function(){
                              var output = document.getElementById('output');
                              output.src = reader.result;
                            };
                            reader.readAsDataURL(event.target.files[0]);
                          };
                        </script>
                        <script>
                            // Get the modal
                            var modal = document.getElementById("myModal");
                            
                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("output");
                            var modalImg = document.getElementById("img01");
                            var captionText = document.getElementById("caption");
                            img.onclick = function(){
                              modal.style.display = "block";
                              modalImg.src = this.src;
                              captionText.innerHTML = this.alt;
                            }
                            
                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];
                            
                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() { 
                              modal.style.display = "none";
                            }
                        </script>

                    </div>


                    <div class="form-group row">
                        <label for="precio" class="col-md-4 col-form-label text-md-right">Precio</label>
                        <div class="col-md-6">
                            <input type="number" min="0.00" max="100000.00" step="0.1" class="form-control"
                                name="precio" required value="100">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="cantidad" min="1" step="1" required
                                value="1">
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                Registrar producto
                            </button>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    </form>
</div>
</div>
</div>
@endsection