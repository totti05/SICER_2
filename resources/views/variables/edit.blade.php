@extends('adminlte::page')
@section('content_header')
  <h1 class=""><i class="fa fa-chart-bar"></i> Variable -  </h1>
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
  <div class="card-header bg-gradient-navy">
    <h3 class="card-title">Editar variable</h3>

      <div class="card-tools">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->
        <button
          type="button"
          id="helpWidget"
          class="btn btn-tool"
        >
          <i class="far fa-question-circle"></i> 
        </button>
        <button
          type="button"
          id="chartwidget"
          class="btn btn-tool"
          data-card-widget="collapse"
        >
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="maximize">
          <i class="fas fa-expand"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
          <h1 class="card-title">Crear Variable</h1>
      </div>
      <div class="row">
        <form action="{{route('variables.update', $variable )}}" method="post">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-3">
              <label for="variable">Nombre</label>
              <input type="text"
                  class="form-control" value="{{$variable->variable}}" name="variable" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
              </div>

              <div class="form-group col-md-3">
              <label for="neumonico">Neumónico</label>
              <input type="text"
                  class="form-control" name="neumonico" id="" value="{{$variable->neumonico}}" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
              </div>
              
              <div class="form-group col-md-3">
              <label for="unidad">Unidad de medida</label>
              <input type="text"
                  class="form-control" name="unidad" id="" value="{{$variable->unidad}}" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
              </div>

              <div class="form-group col-md-3">
              <label for="descripcion">Descripción</label>
              <input type="text"
                  class="form-control" name="descripcion" id="" value="{{$variable->descripcion}}" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
              <label for="calculo">Cálculo</label>
              <input type="text"
                  class="form-control" name="calculo" id="" value="{{$variable->calculo}}" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
              </div>

              <div class="form-group col-md-3">
              <label for="procedencia">Procedencia de base de datos</label>
              <input type="text"
                  class="form-control" name="procedencia" value="{{$variable->procedencia}}" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
              </div>

              <div class="form-group col-md-3">
              <label for="procedencia_area">Procedencia de área </label>
              <input type="text"
                  class="form-control" name="procedencia_area" id="" value="{{$variable->procedencia_area}}" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
              </div>

              <div class="form-group col-md-3">
              <label for="rango_superior">Rango límite superior</label>
              <input type="number"
                  class="form-control" name="rango_superior" value="{{$variable->rango_superior}}" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
              </div>
            </div>
            
            <div class="form-row">
              <div class="form-group col-md-3">
              <label for="rango_inferior">Rango límite inferior</label>
              <input type="number"
                  class="form-control" name="rango_inferior" id="" value="{{$variable->rango_inferior}}" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
              </div>

              <div class="form-group col-md-3">
              <label for="rango_ideal">Rango ideal</label>
              <input type="number"
                  class="form-control" name="rango_ideal" id="" value="{{$variable->rango_ideal}}" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
              </div>

              <div class="form-group col-md-3">
              <label for="tabla_bd">Tabla de base de datos</label>
              <input type="text"
                  class="form-control" name="tabla_bd" id="" value="{{$variable->tabla_bd}}" aria-describedby="helpId" placeholder="">
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
                  class="form-control" name="comentario" id="" value="{{$variable->comentario}}" aria-describedby="helpId" placeholder="">
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