@extends('adminlte::page')
@section('content_header')
    <h1 class=""><i class="fa fa-chart-bar"></i> Metal en crisol</h1>
@endsection
@section('content')
<!-- Card para el formulario-->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Formulario de consulta</h3>
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

<!-- Card para las graficas-->
<!-- Aqui se deberia utilizar un ciclo para mostrar las distintas graficas con menos codigo-->
<!-- LINE CHART -->
<div class="card card-info">
  <div class="card-header">
      <h3 class="card-title">Line V Chart</h3>

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


<div class="card">
  <div class="card-header">
    <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
      <thead>
      <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Rendering engine</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Browser</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Platform(s)</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Engine version</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">CSS grade</th></tr>
      </thead>
      <tbody>
      <tr role="row" class="odd">
        <td class="sorting_1">Gecko</td>
        <td>Firefox 1.0</td>
        <td>Win 98+ / OSX.2+</td>
        <td>1.7</td>
        <td>A</td>
      </tr><tr role="row" class="even">
        <td class="sorting_1">Gecko</td>
        <td>Firefox 1.5</td>
        <td>Win 98+ / OSX.2+</td>
        <td>1.8</td>
        <td>A</td>
      </tr><tr role="row" class="odd">
        <td class="sorting_1">Gecko</td>
        <td>Firefox 2.0</td>
        <td>Win 98+ / OSX.2+</td>
        <td>1.8</td>
        <td>A</td>
      </tr><tr role="row" class="even">
        <td class="sorting_1">Gecko</td>
        <td>Firefox 3.0</td>
        <td>Win 2k+ / OSX.3+</td>
        <td>1.9</td>
        <td>A</td>
      </tr><tr role="row" class="odd">
        <td class="sorting_1">Gecko</td>
        <td>Camino 1.0</td>
        <td>OSX.2+</td>
        <td>1.8</td>
        <td>A</td>
      </tr><tr role="row" class="even">
        <td class="sorting_1">Gecko</td>
        <td>Camino 1.5</td>
        <td>OSX.3+</td>
        <td>1.8</td>
        <td>A</td>
      </tr><tr role="row" class="odd">
        <td class="sorting_1">Gecko</td>
        <td>Netscape 7.2</td>
        <td>Win 95+ / Mac OS 8.6-9.2</td>
        <td>1.7</td>
        <td>A</td>
      </tr><tr role="row" class="even">
        <td class="sorting_1">Gecko</td>
        <td>Netscape Browser 8</td>
        <td>Win 98SE+</td>
        <td>1.7</td>
        <td>A</td>
      </tr><tr role="row" class="odd">
        <td class="sorting_1">Gecko</td>
        <td>Netscape Navigator 9</td>
        <td>Win 98+ / OSX.2+</td>
        <td>1.8</td>
        <td>A</td>
      </tr><tr role="row" class="even">
        <td class="sorting_1">Gecko</td>
        <td>Mozilla 1.0</td>
        <td>Win 95+ / OSX.1+</td>
        <td>1</td>
        <td>A</td>
      </tr></tbody>
      <tfoot>
      <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
      </tfoot>
    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
  </div>
  <!-- /.card-body -->
</div>

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
