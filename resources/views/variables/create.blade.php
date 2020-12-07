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
                <form action="{{route('variables.store')}}" method="post">
                @csrf
                        <div class="form-row">
                          <div class="form-group col-md-3">
                          <label for="variable">Nombre</label>
                          <input type="text"
                              class="form-control" name="variable" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-md-3">
                          <label for="neumonico">Neumónico</label>
                          <input type="text"
                              class="form-control" name="neumonico" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>
                          
                          <div class="form-group col-md-3">
                          <label for="unidad">Unidad de medida</label>
                          <input type="text"
                              class="form-control" name="unidad" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-md-3">
                          <label for="descripcion">Descripción</label>
                          <input type="text"
                              class="form-control" name="descripcion" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-3">
                          <label for="calculo">Cálculo</label>
                          <input type="text"
                              class="form-control" name="calculo" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-md-3">
                          <label for="procedencia">Procedencia de base de datos</label>
                          <input type="text"
                              class="form-control" name="procedencia" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-md-3">
                          <label for="procedencia_area">Procedencia de área </label>
                          <input type="text"
                              class="form-control" name="procedencia_area" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-md-3">
                          <label for="rango_superior">Rango límite superior</label>
                          <input type="number"
                              class="form-control" name="rango_superior" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>
                        </div>
                        
                        <div class="form-row">
                          <div class="form-group col-md-3">
                          <label for="rango_inferior">Rango límite inferior</label>
                          <input type="number"
                              class="form-control" name="rango_inferior" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-md-3">
                          <label for="rango_ideal">Rango ideal</label>
                          <input type="number"
                              class="form-control" name="rango_ideal" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-md-3">
                          <label for="tabla_bd">Tabla de base de datos</label>
                          <input type="text"
                              class="form-control" name="tabla_bd" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-md-3">
                          <label for="tipoDato">Tipo de dato</label>
                          <input type="text"
                              class="form-control" name="tipoDato" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-md-3">
                          <label for="comentario">Comentario</label>
                          <input type="text"
                              class="form-control" name="comentario" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>
                        </div>
                          
                        <button class="btn btn-primary" type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection
@section('js')

@stop