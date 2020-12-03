@extends('adminlte::page')
@section('content_header')
  <h1 class=""><i class="fa fa-chart-bar"></i> Listado de variables</h1>
@endsection
@section('css')
  <style>
    .content-wrapper{
    background-color: ;
    background-image: url('vendor/adminlte/dist/img/fondo.png');
    
  }
  .main-sidebar{
    
  }

  .card-body{

    

  }
  </style>
@endsection
@section('content_top_nav_left')
 <ul class="nav ">
    <li class="nav-item">
    <h4 class="nav-link active" > Div.  Control  de  Procesos</h4>
    </li>
  </ul>
 
@stop
@section('content')
<a class="btn btn-primary" href="{{route('variables.create')}}">Crear </a>
<a class="btn btn-primary" href="{{route('variables.create')}}">Editar </a>
<a class="btn btn-primary" href="{{route('variables.create')}}">Mostrar </a>
@endsection
@section('js')

@stop