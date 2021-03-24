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


    #registerCard{

        margin-top: 40vh;
    }

    </style>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" id="registerCard">
                <div class="card-header text-center text-white"> <b>Registrar usuario </b></div>

                <div class="card-body text-white">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ficha" class="col-md-4 col-form-label text-md-right">Ficha</label>

                            <div class="col-md-6">
                                <input id="ficha" type="text" class="form-control @error('ficha') is-invalid @enderror" name="ficha" value="{{ old('ficha') }}" required autocomplete="ficha" autofocus>

                                @error('ficha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Direccion E-Mail ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar <i class="fas fa-user-edit"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

