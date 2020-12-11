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
                <form action="{{route('variables.update', $variable)}}" method="post">
                @csrf
                @method('PUT')
                        <div class="form-row">
                          <div class="form-group col-12	col-sm-6	col-md-3">
                            <label for="variable">Nombre</label>
                            <input type="text" value="{{$variable->variable}}"
                                class="form-control" name="variable" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-12	col-sm-6	col-md-3">
                            <label for="nombre_var_bd">Columna en base de datos</label>
                            <input type="text" value="{{$variable->nombre_var_bd}}"
                                class="form-control" name="nombre_var_bd" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-12	col-sm-6	col-md-3">
                            <label for="neumonico">Neumónico</label>
                            <input type="text" value="{{$variable->neumonico}}"
                                class="form-control" name="neumonico" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>
                          
                          <div class="form-group col-12	col-sm-6	col-md-3">
                            <label for="unidad">Unidad de medida</label>
                            <input type="text" value="{{$variable->unidad}}"
                                class="form-control" name="unidad" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>
                        </div>

                        <div class="form-row ">
                          <div class="form-group col-md-3">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="" aria-describedby="helpId" placeholder="" rows="3">{{$variable->descripcion}}</textarea>
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>
                            
                            <div class="form-group col-md-3">
                              <label for="calculo_variable">Cálculo de valor de la variable</label>
                              <textarea class="form-control" name="calculo_variable" aria-describedby="helpId" placeholder="" id="" rows="3"></textarea>
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                          <div class="form-group col-md-3 ">
                            <label for="calculo_rango_ref">Cálculo de rangos de referencia</label>
                            <textarea class="form-control" value="{{$variable->calculo_rango_ref}}"  name="calculo_rango_ref" aria-describedby="helpId" placeholder="" id="" rows="3"></textarea>
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>  

                          <div class="form-group col-12	col-sm-6	col-md-3">
                            <label for="referencia_superior">Rango de referencia límite superior</label>
                            <input type="number"  value="{{$variable->referencia_superior}}"
                                class="form-control" name="referencia_superior" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>
                        </div>

                        <div class="form-row ">
                            <div class="form-group col-12	col-sm-6	col-md-3 ">
                              <label for="referencia_inferior">Rango de referencia límite inferior</label>
                              <input type="number" value="{{$variable->referencia_inferior}}"
                                  class="form-control" name="referencia_inferior" id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                          
                            <div class="form-group col-12	col-sm-6	col-md-3">
                              <label for="referencia_operativa">Rango de referencia de operación </label>
                              <input type="number" value="{{$variable->referencia_operativa}}"
                                  class="form-control" name="referencia_operativa" id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="form-group col-12	col-sm-6	col-md-3">
                              <label for="rango_ideal">Rango ideal</label>
                              <input type="number" value="{{$variable->rango_ideal}}"
                                  class="form-control" name="rango_ideal" id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="form-group col-12	col-sm-6	col-md-3">
                              <label for="max_grafica">Límite de gráfica superior</label>
                              <input type="number" value="{{$variable->max_grafica}}"
                                  class="form-control" name="max_grafica" id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        
                        <div class="form-row">
                          <div class="form-group col-12	col-sm-6	col-md-3">
                            <label for="min_grafica">Límite de gráfica inferior</label>
                            <input type="number" value="{{$variable->min_grafica}}"
                                class="form-control" name="min_grafica" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-md-3">
                            <label for="modulo">Módulo o sección</label>
                            <select id="variable" value="{{$variable->modulo}}" name="modulo" class="form-control">
                              <option selected value=null> </option>
                              <option>Información de línea</option>
                              <option>Evolución de línea</option>
                              <option>Celda</option>
                              <option>Baño electrolítico</option>
                              <option>Falla de ánodos</option>
                              <option>Metal en crisol</option>
                            </select>
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-md-3">
                            <label for="tabla_bd">Tabla base de datos</label>
                            <select id="variable" value="{{$variable->tabla_bd}}" name="tabla_bd" class="form-control">
                              <option selected value=null> </option>
                              <option value="info_line">Información de línea</option>
                              <option value="info_line">Evolución de línea</option>
                              <option value="cells">Celda</option>
                              <option value="baths">Baño electrolítico</option>
                              <option value="anode_fails">Falla de ánodos</option>
                              <option value="crucibles">Metal en crisol</option>
                            </select>
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>

                          <div class="form-group col-md-3">
                            <label for="comentario">Comentario</label>
                            <textarea class="form-control" name="comentario" id="" aria-describedby="helpId" placeholder="" rows="3">{{$variable->comentario}}</textarea>
                            <small id="helpId" class="form-text text-muted">Help text</small>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-3"> 
                            <button class="btn btn-primary" type="submit">Registrar</button>
                            <a name="" id="" class="btn btn-danger" href="{{route('variables.index')}}" role="button">Regresar</a>
                          </div>
                        </div>
                </form>
            </div>
   </div>
</div>
    
@endsection
@section('js')

@stop