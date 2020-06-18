@extends('adminlte::page')
@section('content_top_nav_left')
 <ul class="nav ">
    <li class="nav-item">
    <h4 class="nav-link active" > Div.  Control  de  Procesos</h4>
    </li>
  </ul>
 
@stop
@section('content')
<div>
    <div class="row">
        <div class="col-md-2">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-industry"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Linea V</span>
                <span class="info-box-text">Celdas conectadas: </span>
                <span class="info-box-number">{{ $celdas }}</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  Operatividad
                </span>
                <a href=" {{ route('evolution.lineaV') }} " class="small-box-footer text-white">Mas información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-2">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-industry"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Linea V</span>
                <span class="info-box-text">Celdas conectadas: </span>
                <span class="info-box-number">{{ $celdas }}</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  Operatividad
                </span>
                <a href=" {{ route('evolution.lineaV') }} " class="small-box-footer text-white">Mas información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-2">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-industry"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Linea V</span>
                <span class="info-box-text">Celdas conectadas: </span>
                <span class="info-box-number">{{ $celdas }}</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  Operatividad
                </span>
                <a href=" {{ route('evolution.lineaV') }} " class="small-box-footer text-white">Mas información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-2">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-industry"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Linea V</span>
                <span class="info-box-text">Celdas conectadas: </span>
                <span class="info-box-number">{{ $celdas }}</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  Operatividad
                </span>
                <a href=" {{ route('evolution.lineaV') }} " class="small-box-footer text-white">Mas información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-2">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-industry"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Linea V</span>
                <span class="info-box-text">Celdas conectadas: </span>
                <span class="info-box-number">{{ $celdas }}</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  Operatividad
                </span>
                <a href=" {{ route('evolution.lineaV') }} " class="small-box-footer text-white">Mas información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="row ">
  
        <div class="col-md-6 ml-3 card bg-gradient-navy" id="CardGrafica">
            <div class="card-header" >
                <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    Sales Graph
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class="">
                        </div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class="">
                        </div>
                    </div>
                </div>
                <canvas class="chart chartjs-render-monitor" id="graph"></canvas>
            </div>
            <!-- /.card-body -->

        </div>

        <div class="col-md-5 ">
        
            <div class="card card-navy" id="tablaCeldas">
                <div class="card-header "  >
                    <h3 class="card-title">Celdas Conectadas</h3>
                    <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                        <table id="table_id" class="table  table-striped table-hover dataTable">
                            <thead class="bg-info">
                                <tr>
                                    <th>Linea</th>
                                    <th>Cantidad de celdas</th>
                                    <th>En coccion</th>
                                    <th>En normalización</th>
                                    <th>En produccion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Linea 1</td>
                                    <td>nro celdas</td>
                                    <td>nro celdas coc</td>
                                    <td>nro celdas norm</td>
                                    <td>nro celdas prod</td>
                                </tr>
                                <tr>
                                    <td>Linea 2</td>
                                    <td>nro celdas</td>
                                    <td>nro celdas coc</td>
                                    <td>nro celdas norm</td>
                                    <td>nro celdas prod</td>
                                </tr>
                                <tr>
                                    <td>Linea 3</td>
                                    <td>nro celdas</td>
                                    <td>nro celdas coc</td>
                                    <td>nro celdas norm</td>
                                    <td>nro celdas prod</td>
                                </tr>
                                <tr>
                                    <td>Linea 4</td>
                                    <td>nro celdas</td>
                                    <td>nro celdas coc</td>
                                    <td>nro celdas norm</td>
                                    <td>nro celdas prod</td>
                                </tr>
                                <tr>
                                    <td><a href=" {{ route('evolution.lineaV') }} ">Linea 5</a> </td>
                                    <td> {{ $celdas }}</td>
                                    <td>{{ $coccion }}</td>
                                    <td>{{ $normalizacion }}</td>
                                    <td>{{ $produccion }}</td>
                                </tr>
                            </tbody>
                        </table>    
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-6 ml-3 card bg-gradient-navy">
            <div class="card-header" >
                <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    Sales Graph
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class="">
                        </div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class="">
                        </div>
                    </div>
                </div>
                <canvas class="chart chartjs-render-monitor" id="graph"></canvas>
            </div>
            <!-- /.card-body -->

        </div>
    </div>
</div>


<!-- /.card -->
@stop
@section('plugins.Datatables', true)

@section('js')
    <script>
        var ChartDataclear = {};
        var ChartOptionsclear = {};
        var ctx = document.getElementById("graph").getContext("2d");
        var varChart = new Chart(ctx, {
            type: "line",
            data: ChartDataclear,
            options: ChartOptionsclear,
        });

        var GraphChartData = {
            labels  : ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2', '2012 Q3', '2012 Q4', '2013 Q1', '2013 Q2'],
            datasets: [
            {
                label               : 'Digital Goods',
                fill                : false,
                borderWidth         : 2,
                lineTension         : 0,
                spanGaps : true,
                borderColor         : '#efefef',
                pointRadius         : 3,
                pointHoverRadius    : 7,
                pointColor          : '#efefef',
                pointBackgroundColor: '#efefef',
                data                : [2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432]
            }
            ]
        }

        var GraphChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
            display: false,
            },
            scales: {
            xAxes: [{
                ticks : {
                fontColor: '#efefef',
                },
                gridLines : {
                display : false,
                color: '#efefef',
                drawBorder: false,
                }
            }],
            yAxes: [{
                ticks : {
                stepSize: 5000,
                fontColor: '#efefef',
                },
                gridLines : {
                display : true,
                color: '#efefef',
                drawBorder: false,
                }
            }]
            }
        }
        var varChart = new Chart(ctx, {
            type: "line",
            data: GraphChartData,
            options: GraphChartOptions,
        });

       
    </script>
@stop
@section('footer')
    <div class="float-right d-none d-sm-block">
      <b>Version BETA</b> 1.0.0
    </div>
    <div class="row">
     <strong>Desarrollado por Departamento de  <a href="#">Automatización y control</a> </strong>.
    </div>
    <div class="row">
       <strong>Gerencia control de calidad  2020. <strong>
    </div>
@stop