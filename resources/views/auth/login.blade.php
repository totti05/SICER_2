@extends('layouts.app')
@section('css')
    <style>
        
        body{
            background-color: ;
            background-image: url('vendor/adminlte/dist/img/fondo1-1.jpg');
            
            background-size: cover;
            /* Para dejar la imagen de fondo centrada, vertical y

            horizontalmente */

            background-position: center center;

            /* Para que la imagen de fondo no se repita */

            background-repeat: no-repeat;

            /* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */

            background-attachment: fixed;

            /* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */

            background-size: cover;

            /* Se muestra un color de fondo mientras se está cargando la imagen

            de fondo o si hay problemas para cargarla */

            background-color: #66999;
        }

 

        .card{
        margin-top: auto;
        margin-bottom: auto;
        background-color: rgba(0, 31, 63,0.7) !important;
        }


        .card-header h3{
        color: white;
        }


        #loginCard{

            margin-top: 40vh;
        }

    </style>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" id="loginCard"> 
                <div class="card-header text-center text-white display-6 "> Iniciar sesión</div>

                <div class="card-body  text-white ">
                    <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="ficha" class="col-md-4 col-form-label text-md-right">N° Ficha</label>

                                <div class="col-md-6">
                                    <input type="text" name="ficha" id="ficha" class="form-control" >

                                    @error('ficha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt"></i> Ingresar
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Olvidé mi contraseña
                                        </a>
                                    @endif
                                </div>
                            </div>
                      </form>
                </div>
        </div>
            

@stop

@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" id="loginCard">
                    <div class="card-header text-center"> <b>SICER</b> </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="ficha" class="col-md-4 col-form-label text-md-right">N° Ficha</label>

                                <div class="col-md-6">
                                    <input type="text" name="ficha" id="ficha" class="form-control" >

                                    @error('ficha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt"></i> Ingresar
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Olvidé mi contraseña
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
