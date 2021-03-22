@extends('adminlte::page')
@section('content_header')
  <h1 class=""><i class="fa fa-chart-bar"></i> Crear variables</h1>
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
    <div class="card">
        <div class="card-body">
        <div class="row">
            <h1 class="card-title">Crear Variable</h1>
        </div>
            <div class="row">
                <form action="{{route('modules.store')}}" method="post">
                @csrf
                        <div class="form-row">
                          <div class="form-group col-12	col-sm-6	col-md-3">
                            <label for="nombre">Nombre</label>
                            <input type="text"
                                class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                        <div class="form-row">
                          <div class="form-group col-md-3"> 
                            <button class="btn btn-primary" type="submit">Registrar</button>
                            <a name="" id="" class="btn btn-danger" href="{{route('modules.index')}}" role="button">Regresar</a>
                          </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection
@section('js')

@stop