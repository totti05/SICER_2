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
                <form action="{{route('modules.update', $module)}}" method="post">
                @csrf
                @method('PUT')
                        <div class="form-row">
                          <div class="form-group col-12	col-sm-6	col-md-3">
                            <label for="variable">Nombre</label>
                            <input type="text" value="{{$module->nombre}}"
                                class="form-control" name="variable" id="" aria-describedby="helpId" placeholder="">
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