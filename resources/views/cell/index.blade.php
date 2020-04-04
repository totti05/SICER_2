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
    <div class="form-group">
      <label>Rango de fecha y hora que desea consultar:</label>

      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="far fa-clock"></i></span>
        </div>
        <input type="text" class="form-control float-right" id="reservationtime">
      </div>
      <!-- /.input group -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
      <!-- /.form group -->


  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    The footer of the card
  </div>
  <!-- /.card-footer -->
</div>
<!-- /.card -->


<!-- Card prueba-->
<!-- LINE CHART -->
<div class="card card-info">
  <div class="card-header">
      <h3 class="card-title">Mensaje prueba</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
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
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
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
     $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    }) 

    $(document).ready( function () {
    $('#celdas').DataTable( {"serverSide": true,
                    "ajax": "{{ route('cell.datatable') }}",
                    "columns": [
                        {data: 'celda'},
                        {data: 'dia'},
                    ]});
} );
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
