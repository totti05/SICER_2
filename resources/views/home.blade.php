@extends('adminlte::page')
@section('content_top_nav_left')
 <ul class="nav ">
    <li class="nav-item">
    <h4 class="nav-link active" > Div.  Control  de  Procesos</h4>
    </li>
  </ul>
 
@stop

@section('css')
  <style>
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}
	.chartjs-render-monitor{
        animation:chartjs-render-animation 1ms
    }
	.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{
        position:absolute;
        direction:ltr;
        left:0;
        top:0;
        right:0;
        bottom:0;
        overflow:hidden;
        pointer-events:none;
        visibility:hidden;
        z-index:-1}
	.chartjs-size-monitor-expand>div{
        position:absolute;
        width:1000000px;
        height:1000000px;
        left:0;
        top:0}
	.chartjs-size-monitor-shrink>div{
        position:absolute;
        width:200%;
        height:200%;
        left:0;
        top:0}

.chart{
    
    max-height: 80vh;
    max-width:80vw;
  }
  </style>
@endsection
@section('content')
<div>
    <div class="row">
        <div class="col-md-2 ml-3">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-industry"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Línea V</span>
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
                <span class="info-box-text">Línea V</span>
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
                <span class="info-box-text">Línea V</span>
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
                <span class="info-box-text">Línea V</span>
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
                <span class="info-box-text">Línea V</span>
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
  
        <div class="col-md-6  card bg-gradient-navy" id="CardGrafica">
            <div class="card-header" >
                <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    Porcentaje de hierro
                </h3>

                <div class="card-tools">
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="maximize"
                        >
                        <i class="fas fa-expand"></i>
                    </button>                    
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove">
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
                    <div class="chart">
                         <canvas class=" chartjs-render-monitor" id="HierroChart"></canvas>
                    </div>
                   <!-- /.card-body -->
            </div>
            <!-- /.card-->
        </div>
            

        <div class="col-md-6">
        
            <div class="card card-navy" id="tablaCeldas">
                <div class="card-header "  >
                    <h3 class="card-title">Celdas Conectadas</h3>
                    <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove">
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
                                    <th>Línea</th>
                                    <th>Cantidad de celdas</th>
                                    <th>En cocción</th>
                                    <th>En normalización</th>
                                    <th>En producción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Línea 1</td>
                                    <td>nro celdas</td>
                                    <td>nro celdas coc</td>
                                    <td>nro celdas norm</td>
                                    <td>nro celdas prod</td>
                                </tr>
                                <tr>
                                    <td>Línea 2</td>
                                    <td>nro celdas</td>
                                    <td>nro celdas coc</td>
                                    <td>nro celdas norm</td>
                                    <td>nro celdas prod</td>
                                </tr>
                                <tr>
                                    <td>Línea 3</td>
                                    <td>nro celdas</td>
                                    <td>nro celdas coc</td>
                                    <td>nro celdas norm</td>
                                    <td>nro celdas prod</td>
                                </tr>
                                <tr>
                                    <td>Línea 4</td>
                                    <td>nro celdas</td>
                                    <td>nro celdas coc</td>
                                    <td>nro celdas norm</td>
                                    <td>nro celdas prod</td>
                                </tr>
                                <tr>
                                    <td><a href=" {{ route('evolution.lineaV') }} ">Línea 5</a> </td>
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
        <div class="col-md-6">
            <div class="card bg-gradient-navy">
                <div class="card-header" >
                    <h3 class="card-title">
                        <i class="fas fa-th mr-1"></i>
                        Celdas Conectadas
                    </h3>

                    <div class="card-tools">
                        <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="maximize"
                            >
                            <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove">
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
                    <div class="chart">
                      <canvas class="chartjs-render-monitor" id="CeldasConChart"></canvas>
                    </div>
                   
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card-->
        </div>
       
        <div class="col-md-6">
            <div class="card bg-gradient-navy">
                <div class="card-header" >
                    <h3 class="card-title">
                        <i class="fas fa-th mr-1"></i>
                    Producción
                    </h3>

                    <div class="card-tools">
                        <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="maximize"
                            >
                            <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove">
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
                    <div class="chart">
                         <canvas class="chartjs-render-monitor" id="ProdChart"></canvas>
                    </div>
                    
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
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
        var ctx = document.getElementById("HierroChart").getContext("2d");
        var hierroChart = new Chart(ctx, {
            type: "line",
            data: ChartDataclear,
            options: ChartOptionsclear,
        });

        var ctx = document.getElementById("CeldasConChart").getContext("2d");
        var celdasConChart = new Chart(ctx, {
            type: "line",
            data: ChartDataclear,
            options: ChartOptionsclear,
        });

        var ctx = document.getElementById("ProdChart").getContext("2d");
        var prodChart = new Chart(ctx, {
            type: "line",
            data: ChartDataclear,
            options: ChartOptionsclear,
        });


        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
            });
            $.ajax({
                type: "get",
                url: "{{ route('home.dataChart') }}",
                beforeSend: function () {
                /*
                * Esta función se ejecuta durante el envió de la petición al
                * servidor.
                * */
                },
                complete: function (data) {
                /*
                * Se ejecuta al termino de la petición
                * */
                
                },
                success: function (response) {
                
                var DiaHierro = new Array();
                var DatosHierro = new Array();
             
                var DiaCeldasCon = new Array();
                var DatosCeldasCon = new Array();

                var DiaProd = new Array();
                var DatosProd = new Array();
               

                //obteniendo datos para variable 1
                response.datosHierro.forEach(function (data) {
                    
                    DiaHierro.push(data.dia);
                    DatosHierro.push(data.fe);
                });

                response.datosCeldasCon.forEach(function (data) {
                    
                    DiaCeldasCon.push(data.dia);
                    DatosCeldasCon.push(data.celdas_conectadas);
                });

                response.datosProd.forEach(function (data) {
                    
                    DiaProd.push(data.dia);
                    DatosProd.push(data.prod);
                });
                console.log(response);

                var ChartOptionsHierro = {
                    responsive: true,
                    maintainAspectRatio: true,
                    hoverMode: "index",
                    stacked: false,
                    tooltips: {
                    mode: "nearest",
                    intersect: true,
                    },
                    hover: {
                    mode: "nearest",
                    intersect: true,
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: '#efefef'
                        }
                    },
                    plugins: {
                    filler: {
                        propagate: true
                    }
                    },
                    scales: {
                    yAxes: [
                        {
                        scaleLabel: {
                            labelString:"%",
                            display: true,
                            fontColor: '#efefef',
                        },
                        type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: "left",
                        id: "y-axis-1",
                        ticks: {
                            fontColor: '#efefef',
                        },
                        gridLines : {
                        display : true,
                        color: '#efefef',
                        drawBorder: false,
                        },
                        },
                    ],

                    xAxes: [
                        {
                        scaleLabel: {
                            labelString: 'fecha',
                            display: true,
                            fontColor: '#efefef',
                        },
                        position: "bottom",
                        id: "x-axis-1",
                        ticks: {
                        
                        fontColor: '#efefef',
                        },
                        gridLines : {
                        display : false,
                        color: '#efefef',
                        drawBorder: false,
                        },
                        },
                    ],
                    },
                };
                var hierroChartData = {
                    labels: DiaHierro,
                    datasets: [
                    {
                        label: "Hierro",
                        data: DatosHierro,
                        borderWidth: 1,
                        backgroundColor: '#efefef',
                        borderColor         : '#efefef',
                        pointBorderColor: '#efefef',
                        pointBackgroundColor: '#efefef',
                        fill: false,
                        lineTension: 0,
                    }
                    ],
                };

                console.log(response);
                hierroChart.options = ChartOptionsHierro;
                hierroChart.data = hierroChartData;
                hierroChart.update();

                var celdasConChartData = {
                    labels: DiaCeldasCon,
                    datasets: [
                    {
                        label: "Celdas Conectadas",
                        data: DatosCeldasCon,
                        borderWidth: 1,
                        backgroundColor: '#efefef',
                        borderColor         : '#efefef',
                        pointBorderColor: '#efefef',
                        pointBackgroundColor: '#efefef',
                        fill: false,
                        lineTension: 0,
                    }
                    ],
                };
                var celdasConChartOptions = {
                    responsive: true,
                    maintainAspectRatio: true,
                    hoverMode: "index",
                    stacked: false,
                    tooltips: {
                        mode: "nearest",
                        intersect: true,
                    },
                    hover: {
                        mode: "nearest",
                        intersect: true,
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: '#efefef'
                        }
                    },
                    plugins: {
                        filler: {
                            propagate: true
                        }
                    },
                    scales: {
                        yAxes: [
                            {
                            scaleLabel: {
                                labelString:"celdas conectadas",
                                display: true,
                                fontColor: '#efefef',
                            },
                            type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: "left",
                            id: "y-axis-1",
                            ticks: {
                                fontColor: '#efefef',
                                stepSize: 10,
                                suggestedMin: 0,
                                suggestedMax: 180,
                                maxTicksLimit: 90
                            
                            },
                            gridLines : {
                            display : true,
                            color: '#efefef',
                            drawBorder: false,
                            },
                            },
                        ],

                        xAxes: [
                            {
                            scaleLabel: {
                                labelString: 'fecha',
                                display: true,
                                fontColor: '#efefef',
                            },
                            position: "bottom",
                            id: "x-axis-1",
                            ticks: {
                            
                             fontColor: '#efefef',
                            },
                            gridLines : {
                                display : false,
                                color: '#efefef',
                                drawBorder: false,
                                },
                            },
                        ],
                    },
                };
                celdasConChart.options = celdasConChartOptions;
                celdasConChart.data = celdasConChartData;
                celdasConChart.update();

                var prodChartData = {
                    labels: DiaProd,
                    datasets: [
                    {
                        label: "Producción",
                        data: DatosProd,
                        borderWidth: 1,
                        backgroundColor: '#efefef',
                        borderColor         : '#efefef',
                        pointBorderColor: '#efefef',
                        pointBackgroundColor: '#efefef',
                        fill: false,
                        lineTension: 0,
                    }
                    ],
                };
                var prodChartOptions = {
                    responsive: true,
                    maintainAspectRatio: true,
                    hoverMode: "index",
                    stacked: false,
                    tooltips: {
                        mode: "nearest",
                        intersect: true,
                    },
                    hover: {
                        mode: "nearest",
                        intersect: true,
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: '#efefef'
                        }
                    },
                    plugins: {
                        filler: {
                            propagate: true
                        }
                    },
                    scales: {
                        yAxes: [
                            {
                            scaleLabel: {
                                labelString:"Producción",
                                display: true,
                                fontColor: '#efefef',
                            },
                            type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: "left",
                            id: "y-axis-1",
                            ticks: {
                                fontColor: '#efefef',
                            },
                            gridLines : {
                            display : true,
                            color: '#efefef',
                            drawBorder: false,
                            },
                            },
                        ],

                        xAxes: [
                            {
                            scaleLabel: {
                                labelString: 'fecha',
                                display: true,
                                fontColor: '#efefef',
                            },
                            position: "bottom",
                            id: "x-axis-1",
                            ticks: {
                            
                             fontColor: '#efefef',
                            },
                            gridLines : {
                                display : false,
                                color: '#efefef',
                                drawBorder: false,
                                },
                            },
                        ],
                    },
                };
                prodChart.options = prodChartOptions;
                prodChart.data = prodChartData;
                prodChart.update();
                },
                error: function (data) {
                /*
                * Se ejecuta si la peticón ha sido erronea
                * */
                MENSAJE = "Problemas al tratar de enviar el formulario " + data;
                $("#mensaje").html(MENSAJE);
                $("#modalMensaje").modal("show");
                },
            });
        });
        /* 
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
*/
       
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