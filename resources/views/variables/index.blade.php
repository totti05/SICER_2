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
<div class="card card-primary card-tabs">
  <div class="card-header bg-gradient-navy">
    
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
      <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" >
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lista de variables</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Variables asignada a modulos</a>
      </li>
    </ul>

  </div>
  <!-- /.card-header -->
  <div class="card-body">
    

      <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container">
              <table class="table table-striped table-responsive table-bordered" id="variables">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Variable</th>
                    <th>Descripción</th>
                    <th>acción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($variables as $variable)
                    <tr>
                      <td scope="row">{{$variable->id}}</td>
                      <td scope="row">{{$variable->variable}}</td>
                      <td scope="row">{{$variable->descripcion}}</td>
                      <td scope="row">
                      
                        <form action="{{route('variables.destroy', $variable) }}" method="post">
                        <a class="btn btn-primary" href="{{route('variables.show', $variable) }}" role="button">Ver</a> 
                        <a class="btn btn-primary" href="{{route('variables.edit', $variable) }}" role="button">Editar</a> 
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                      </td>
                      
                      
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <a name="" id="" class="btn btn-primary" href="{{route('variables.create')}}" role="button">Crear variable</a>
            </div>
          </div>
      

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="container">
          ...
          </div>
        </div>
      </div>
   
  </div>
</div>
  

        
      
@endsection
@section('js')
  <script>
    $("#variables").DataTable(
      {
            processing: true,
            paging: false,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            dom: '<"top"fl>rt<"bottom"ip><"clear">',
      });

  </script>

@stop