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
<div class="card">
  <div class="card-header bg-gradient-navy">
   <h3 class="card-title">Lista de variables</h3>

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
              <td scope="row"><a class="btn btn-primary" href="{{route('variables.edit', $variable) }}" role="button">Editar</a> <a class="btn btn-danger" href="{{route('variables.destroy', $variable) }}" role="button">Eliminar</a></td>
              
            </tr>
          @endforeach
        </tbody>
    </table>

  </div>
</div>



<a class="btn btn-primary" href="{{route('variables.create')}}">Crear </a>
<a class="btn btn-primary" href="{{route('variables.create')}}">Editar </a>
<a class="btn btn-primary" href="{{route('variables.create')}}">Mostrar </a>
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