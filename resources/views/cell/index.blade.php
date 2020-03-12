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
      
    <table class="table">
                        
                        @foreach($users as $user)
                            <tr>
                                <td><a href="">{{$user->id}}</a> </td>
                                <td>{{$user->name}} </td>
                                <td>{{$user->email}} </td>
                                
                               
                            </tr>
                        @endforeach  
                                                            
                    </table>

                    otra
                    <table class="table">
                    <tr>
                        <td><a href="">{{$userx->id}}</a> </td>    
                        <td>{{$userx->name}} </td>
                        <td>{{$userx->email}} </td>
                    </table>
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


    /* ChartJS
    * -------
    * Here we will create a few charts using ChartJS
    */


    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label               : 'Constant',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [50]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          }
        }]
      }
    }

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartData.datasets[2].fill = true;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, { 
      type: 'line',
      data: lineChartData, 
      options: lineChartOptions
    })
</script>
@stop
