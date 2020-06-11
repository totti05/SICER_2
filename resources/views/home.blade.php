@extends('adminlte::page')

@section('content')
<div>
    <div class="row">
        <div class="col-md-2">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-industry"></i></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Linea I</span>
                <span class="info-box-number">0</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  70% Increase in 30 Days
                </span>
                <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-2">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-industry"></i></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Linea II</span>
                <span class="info-box-number">0</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  70% Increase in 30 Days
                </span>
                <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-2">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-industry"></i></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Linea III</span>
                <span class="info-box-number">0</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  70% Increase in 30 Days
                </span>
                <a href="#" class="small-box-footer text-white">Mas información <i class="fas fa-arrow-circle-right"></i></a>
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
                <span class="info-box-text">Linea IV</span>
                <span class="info-box-number">0</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  70% Increase in 30 Days
                </span>
                <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
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
                <span class="info-box-number">{{ $celdas }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  70% Increase in 30 Days
                </span>
                <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="row ">
  
    <div class="card bg-gradient-navy" style="position: relative; left: 0px; top: 0px;">
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
            <canvas class="chart chartjs-render-monitor" id="graph" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 627px;" width="627" height="250"></canvas>
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-transparent">
            <div class="row">
                <div class="col-4 text-center">
                <div style="display:inline;width:60px;height:60px;">
                    <canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; -webkit-appearance: none;">
                </div>

                <div class="text-white">Mail-Orders</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                <div style="display:inline;width:60px;height:60px;">
                    <canvas width="60" height="60"></canvas>
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; -webkit-appearance: none;">
                </div>

                <div class="text-white">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                <div style="display:inline;width:60px;height:60px;">
                    <canvas width="60" height="60"></canvas>
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; -webkit-appearance: none;">
                </div>

                <div class="text-white">In-Store</div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-footer -->
    </div>
    </div>
    <div class="row ">
        <div class="col-md-7 offset-3">
        
            <div class="card">
                <div class="card-header "  >
                    <h3 class="card-title">Celdas Conectadas</h3>
                    <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <span class="badge badge-primary">Label</span>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                        <table id="table_id" class="table table-bordered table-hover dataTable">
                            <thead class="bg-navy">
                                <tr>
                                    <th>Linea</th>
                                    <th>Cantidad de celdas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Linea 1</td>
                                    <td>nro celdas</td>
                                </tr>
                                <tr>
                                    <td>Linea 2</td>
                                    <td>nro celdas</td>
                                </tr>
                                <tr>
                                    <td>Linea 3</td>
                                    <td>nro celdas</td>
                                </tr>
                                <tr>
                                    <td>Linea 4</td>
                                    <td>nro celdas</td>
                                </tr>
                                <tr>
                                    <td>Linea 5</td>
                                <td> {{ $celdas }}</td>
                                </tr>
                            </tbody>
                        </table>    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    SICER
                </div>
                <!-- /.card-footer -->
                </div>
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