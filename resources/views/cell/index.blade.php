@extends('adminlte::page')
@section('content_header')
    <h1 class=""><i class="fa fa-chart-bar"></i> Celdas</h1>
@endsection
@section('content')
<!-- Card para el formulario-->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Formulario de consulta de celdas</h3>
    <div class="card-tools">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="badge badge-primary">Label</span>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  <form id="formdata" >
        
      <div class="form-group">
        <label>Rango de fecha y hora que desea consultar:</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-clock"></i></span>
          </div>
          <input type="text" class="form-control float-right col-md-4" id="rangoFecha" name="rangoFecha">
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group --> 
   
      <div class="form-group">
          <label for="celdax">Rango de celdas</label>
          <div class="form-row">
              <div class="input-group col-md-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-th"></i></span>
                </div>
                  <input type="number"
                    class="form-control" name="celda1" id="celda1" aria-describedby="helpId" placeholder="">
              </div>
              <!--  / input group -->
              <span class=""> - </span>
              <div class="input-group col-md-2">
                  <input type="number"
                    class="form-control" name="celda2" id="celda2" aria-describedby="helpId" placeholder="">
              </div>
              <!--  / input group -->
              <small id="helpId" class="form-text text-muted">Celdas 901-1090</small>
          </div>
          <!-- /.form row -->
      </div>
      <!-- /.form group -->
  
      <div class="form-group col-md-4">
        <label for="variable">Variable</label>
        <select id="variable" name="variable" class="form-control">
          <option selected>voltaje</option>
          <option>...</option>
        </select>
      </div>
      <!-- /.form group -->
      
      <div class="form-group">
        <div class="form-row ">
            
            <label>Minimo</label>
            <div class="input-group col-md-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Min</span>
              </div>
              <input type="number" name="min" class="form-control float-right col-md-4" id="min">
            </div>
            <!-- /.input group -->
          
            <label>Maximo</label>
            <div class="input-group col-md-3">
             
              <div class="input-group-prepend">
                <span class="input-group-text">Max</span>
              </div>
              <input type="number" name="max" class="form-control float-right col-md-4" id="max">
            </div>
            <!-- /.input group -->
       </div>
       <!-- /.form row -->
      </div>
      <!-- /.form group -->   
        <button id= "boton" class="btn btn-primary">Submit</button>
    </form>
  
    <!-- /.form -->
  </div>
    
  <!-- /.card-body -->
  <div class="card-footer">
    The footer of the card
  </div>
  <!-- /.card-footer -->
</div>
<!-- /.card -->


<!-- Card prueba-->
<!-- tabla CHART -->
<div class="card card-info">
  <div class="card-header">
      <h3 class="card-title">Mensaje prueba</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" id="celdaswidget" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body"> 
        <table class="table" id="celdas">
          <thead>
            <tr>
              <th>celda</th>
              <th>dia</th>
            </tr>
          </thead>
          <tbody>
           
          </tbody>
        </table>
                     {{-- 
                    otra
                    <table class="table">
                    <tr>
                        <td><a href="">{{$userx->id}}</a> </td>    
                        <td>{{$userx->name}} </td>
                        <td>{{$userx->email}} </td>
                    </table> --}}
    </div>
    <!-- /.card-body -->
  </div>
<!-- /.card -->


<!-- Card para las graficas-->
<!-- LINE CHART -->
<div class="card card-info">
  <div class="card-header">
      <h3 class="card-title">Line Chart</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" id="chartwidget" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
<!-- /.card -->

@stop
@section('js')
  <script> 
    //Date range picker with time picker
     $('#rangoFecha').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'YYYY/MM/DD'
      }
    }) 
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
  });

    $('#celdaswidget').CardWidget('collapse'); 
    $('#chartwidget').CardWidget('collapse'); 


    $(document).ready(function(){
      $('#formdata').submit(function(event){

        event.preventDefault();
        formdatos = $(this).serializeArray();
        console.log( $( this ).serializeArray() );
        celldestroy();
        $('#celdas').DataTable( 
              { 
                "serverSide": true,
                "processing": true,
                "ajax": {
                    "url":"{{ route('cell.datatablep') }}",
                    "type" : "post",
                    "data":  formdatos,
                    "complete": $('#celdaswidget').CardWidget('expand'),
                    },
              "columns": [
                  {data: 'celda'},
                  {data: 'dia'},
                          ]
                });

    });
  });

    
      const activarDataTable = () => {
          alert("Entro en la función activardatatable");
          const datos = $("#formdata").serialize();
          alert(datos);
          $('#celdas').DataTable( 
              {"serverSide": true,
                "processing": true,
                "ajax": {
                    "url":"{{ route('cell.datatablep') }}",
                    "type" : "post",
                    "data":  datos,
                    "success": alert("listo")
                    },
              "columns": [
                  {data: 'celda'},
                  {data: 'dia'},
                          ]
                });
              };
          /*$(document).ready( function () {  
      $("#boton").on('click' , (e) => {
          celldestroy();
          activarDataTable();
      });
    }); 
*/
    const celldestroy = () => {
          cell = $('#celdas').DataTable();
          cell.destroy();

    }
    const activarDataTableGet = () => { $(document).ready(function() {
    $('#celdas').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('cell.datatablep') }}",
         "columns": [
              {data: 'celda'},
              {data: 'dia'},
                      ]
    } );
} );}

  /*  $(document).ready( function () {
      $('#celdas').DataTable( 
        {"serverSide": true,
         "ajax": "{{ route('cell.datatable') }}",
         "columns": [
            {data: 'celda'},
            {data: 'dia'},
                    ]
          });
} );*/
    /* ChartJS
    * -------
    * Here we will create a few charts using ChartJS
    */

    var url = "{{route('cell.dataChart')}}";
        var Dia = new Array();
        var Celdas = new Array();
        var Voltaje = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                Dia.push(data.dia);
                Celdas.push(data.celdas);
                Voltaje.push(data.voltaje);
            });
            var ctx = document.getElementById("lineChart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels:Dia,
                      datasets: [{
                          label: 'Voltaje',
                          data: Voltaje,
                          borderWidth: 1,
                          backgroundColor     : 'transparent',
                          borderColor         : '#007bff',
                          pointBorderColor    : '#007bff',
                          pointBackgroundColor: '#007bff',
                          fill                : false,
                          lineTension         : 0
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:false
                              }
                          }]
                      }
                  }
              });
          });
        });
</script>
@stop
