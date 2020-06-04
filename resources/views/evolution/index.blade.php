@extends('adminlte::page')
@section('content_header')
    <h1 class=""><i class="fa fa-chart-bar"></i> Evolucion de línea</h1>
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
@section('content')

  <div class="modal" tabindex="-1" role="dialog" id="modalMensaje">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Alerta de SICER</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id=mensaje >Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
      <div class="col-md-4">
        <!-- Card para las graficas-->
        <!-- Desviación de Resistencia LINE CHART -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Desviación de Resistencia Chart</h3>

            <div class="card-tools">
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
              </div>
              <canvas
                id="lineChart"
                style="display: block; width: 764px;"
                width="764"
                height="250"
                class="chartjs-render-monitor"
              ></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Card para las graficas-->
        <!-- Temperatura LINE CHART -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Temperatura Chart</h3>

            <div class="card-tools">
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
              </div>
              <canvas
                id="lineChart2"
                style="display: block; width: 764px;"
                width="764"
                height="250"
                class="chartjs-render-monitor"
              ></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Card para las graficas-->
        <!-- ACIDEZ DE BAÑO LINE CHART -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">ACIDEZ DE BAÑO Chart</h3>

            <div class="card-tools">
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
              </div>
              <canvas
                id="lineChart3"
                style="display: block; width: 764px;"
                width="764"
                height="250"
                class="chartjs-render-monitor"
              ></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-4">
        <!-- Card para las graficas-->
        <!-- CONSUMO DE AlF3 LINE CHART -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">CONSUMO DE AlF3 Chart</h3>

            <div class="card-tools">
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
              </div>
              <canvas
                id="lineChart4"
                style="display: block; width: 764px;"
                width="764"
                height="250"
                class="chartjs-render-monitor"
              ></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Card para las graficas-->
        <!-- CONSUMO DE AlF3 MANUAL LINE CHART -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">CONSUMO DE AlF3 MANUAL Chart</h3>

            <div class="card-tools">
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
              </div>
              <canvas
                id="lineChart5"
                style="display: block; width: 764px;"
                width="764"
                height="250"
                class="chartjs-render-monitor"
              ></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      
        <!-- Card para las graficas-->
        <!-- EFICIENCIA DE TRASEGADO LINE CHART -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">EFICIENCIA DE TRASEGADO Chart</h3>

            <div class="card-tools">
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
              </div>
              <canvas
                id="lineChart6"
                style="display: block; width: 764px;"
                width="764"
                height="250"
                class="chartjs-render-monitor"
              ></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-4">
        <!-- Card para las graficas-->
        <!-- NIVEL DE METAL LINE CHART -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">NIVEL DE METAL Chart</h3>

            <div class="card-tools">
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
              </div>
              <canvas
                id="lineChart7"
                style="display: block; width: 764px;"
                width="764"
                height="250"
                class="chartjs-render-monitor"
              ></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Card para las graficas-->
        <!-- POTENCIA NOMINAL LINE CHART -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">POTENCIA NOMINAL Chart</h3>

            <div class="card-tools">
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
              </div>
              <canvas
                id="lineChart8"
                style="display: block; width: 764px;"
                width="764"
                height="250"
                class="chartjs-render-monitor"
              ></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Card para las graficas-->
        <!-- POTENCIA NETA LINE CHART -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">POTENCIA NETA Chart</h3>

            <div class="card-tools">
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
              </div>
              <canvas
                id="lineChart9"
                style="display: block; position: relative; height:40vh; width:80vw;"
                width="764"
                height="250"
                class="chartjs-render-monitor"
              ></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>


  {{-- 


    <!-- Card para las graficas-->
    <!-- Aqui se deberia utilizar un ciclo para mostrar las distintas graficas con menos codigo-->
    <!-- NIVEL DE BAÑO LINE CHART -->
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
            <canvas id="lineChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->

    <!-- Card para las graficas-->
    <!-- CRIOLITA NETA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Voltaje PRE Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- BAÑO FASE DENSA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Desviación de Resistencia Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- HIERRO METAL CELDAS LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Temperatura Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- SILICIO METAL LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">ACIDEZ DE BAÑO Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- FRECUENCIA DE DESNATADO LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">CONSUMO DE AlF3 Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- CELDAS CONECTADAS LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">CONSUMO DE AlF3 MANUAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- %CaF2  EN EL BAÑO ELECTROLÍTICO LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">EFICIENCIA DE TRASEGADO Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="eficTrasegChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->

    <!-- Card para las graficas-->
    <!-- EFECTOS ANÓDICOS LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">NIVEL DE METAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- ALIMENTACIÓN ALÚMINA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">POTENCIA NOMINAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- DUR TRACK LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">POTENCIA NETA Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- DUMP SIZE ALÚMINA LINE CHART -->
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

    <!-- Card para las graficas-->
    <!-- TRAC CD  LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Voltaje PRE Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- VMAX del EA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Desviación de Resistencia Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- DURACIÓN EA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Temperatura Chart</h3>

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

    <!-- Card para las graficas-->
    <!--CORRIENTE DE LÍNEA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">ACIDEZ DE BAÑO Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- (BO+RAJ+BIM+TETAS) LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">CONSUMO DE AlF3 Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- ÁNODOS B/O CAMBIO NORMAL LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">CONSUMO DE AlF3 MANUAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- ÁNODOS BIMETÁLICOS LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">EFICIENCIA DE TRASEGADO Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- ÁNODOS B/A LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">NIVEL DE METAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- Desv. Temperatura LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">POTENCIA NOMINAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- Desv. Acidez Línea LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">POTENCIA NETA Chart</h3>

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


    <!-- Card para las graficas-->
    <!-- Desv. Nm Línea LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">EFICIENCIA DE TRASEGADO Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- Desv. Nb Línea LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">NIVEL DE METAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- FRECUENCIA  EFECTOS ANÓDICOS LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">POTENCIA NOMINAL Chart</h3>

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

  --}}



  {{--
    <div id="alerta" class="alert alert-danger  alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
      <p id="alertaMsj">Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my
      entire
      soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
    </div>
  --}}




  <!-- Card para el formulario-->
  <div class="card ">
    <div class="card-header bg-gradient-info">
      <h3 class="card-title">Formulario de consulta</h3>

      <div class="card-tools">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->
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

    <div class="card-body ">
      <form id="formData">
        <div class="form-row">
          <div class="col-md-3 mr-1">
        {{--    <div id="selectOrden" class="form-group">
              <label>Opcion eje x</label>
              <select id="orden" name="orden" class="form-control">
                <option selected>Fecha</option>
                <option>Celda</option>
              </select>
            </div> --}}
            <!-- /.form group -->
            <div class="form-group">
              <label>Rango de fecha y hora</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"
                    ><i class="far fa-clock"></i
                  ></span>
                </div>
                <input
                  type="text"
                  name="rangoFecha"
                  class="form-control float-right"
                  id="rangoFecha"
                />
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->

            <div class="form-group">
              <label>Rango de celdas</label>
              <div class="form-row form-inline">
                <div class="input-group col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-th"></i></span>
                  </div>
                  <input
                    type="number"
                    class="form-control"
                    name="celda1"
                    min="901"
                    max="1090"
                    id="celda1"
                    aria-describedby="helpId"
                    placeholder=""
                  />
                </div>
                <!--  / input group -->
                <span class=""> - </span>
                <div class="input-group col-md-5">
                  <input
                    type="number"
                    class="form-control"
                    name="celda2"
                    min="901"
                    max="1090"
                    id="celda2"
                    aria-describedby="helpId"
                    placeholder=""
                  />
                </div>
                <!--  / input group -->
              </div>
              <small id="helpId" class="form-text text-muted"
                >Celdas 901-1090</small
              >
              <!-- /.form row -->
              <div class="custom-control custom-checkbox">
                <input
                  type="checkbox"
                  name="checkLinea"
                  class="custom-control-input"
                  id="checkLinea"
                />
                <label class="custom-control-label" for="checkLinea"
                  >Linea V</label
                >
              </div>
            </div>
            <div id="formvarFiltro" class="form-group">
              <label for="varFiltro">Variable Filtro</label>
              <select id="varFiltro" name="varFiltro" class="form-control">
                <option value="" selected> </option>
                <option >Voltaje</option>
                <option>Efectos anodicos</option>
                <option>Alimentacion de alumina</option>
                <option>Temperatura de baño</option>
                <option>Duracion del tracking</option>
                <option>Acidez de Bano</option>
                <!-- <option>Consumo de alumina</option>  -->
                <option>Dump Size Alumina</option>
                <option>Consumo AlF3</option>
                <option>Track CD</option>
                <option>Consumo AlF3 Manual</option>
                <option>VMAX del Efecto Anodico</option>
                <option>Eficiencia de Trasegado (Eficiencia de corriente)</option>
                <option>Duracion de Efecto anódico</option>
                <option>Nivel de Metal</option>
                <option>Corriente de Linea</option>
                <option>Potencia nominal</option>
                <option>(BO+RAJ+BIM+Tetas)</option>
                <option>Potencia Neta</option>
                <option>Anodos B/O cambio Normal</option>
                <option>Nivel de Baño</option>
                <option>Anodos Bimetalicos</option>
                <option>Criolita Neta</option>
                <option>Criolita de Arranque</option>
                <option>Anodos B/A</option>
                <option>Baño Fase Densa</option>
                <option>Desviacion de Temperatura</option>
                <option>Hierro Metal de Celdas </option>
                <option>Desviacion Acidez</option>
                <option>Silicio Metal Celdas </option>
                <option>Desviacion Nm</option>
                <option>Frecuencia Desnatado</option>
                <option>Desviacion Nb</option>
                <option>Celdas Conectadas</option>
                <option>Frecuencia Efectos Anodicos</option>
                <option>% CaF2 en el baño electrolitico</option>
                <option>Edad</option>
              </select>
            </div>
            <!-- /.form group -->

            <div class="form-group">
              <label>Rango de operacion</label>
              <br />
              <label>Rango varFiltro a consultar</label>
              <div class="form-row form-inline">
                <div class="input-group col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">operador</span>
                  </div>
                  <select class="custom-select" id="operadorVF" name="operadorVF">
                    <option selected value=""></option>
                    <option value="mayor">></option>
                    <option value="menor"><</option>
                    <option value="menorigual">&le;</option>
                    <option value="mayorigual">&ge;</option>
                  </select>
                </div>
                <!--  / input group -->
                <div class="input-group col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">rango 1</span>
                  </div>
                  <input
                    type="number"
                    step="0.01"
                    name="rangoVF1"
                    class="form-control float-right"
                    id="rangoVF1"
                  />
                </div>
                <!--  / input group -->
              </div>
              <!-- /.form row -->

              <label>Rango 2 a consultar</label>
              <div class="form-row form-inline">
                <div class="input-group col-md-6 offset-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">rango 2</span>
                  </div>
                  <input
                    type="number"
                    step="0.01"
                    name="rangoVF2"
                    class="form-control float-right"
                    id="rangoVF2"
                  />
                </div>
                <!--  / input group -->
              </div>
              <!-- /.form row -->
            </div>
            <div id="calculo" class="form-group">
              <label>Calculo a consultar para rango de celdas</label>
              <select id="calculo" name="calculo" class="form-control">
                <option value="" selected> </option>
                <option>Promedio</option>
                <option>Desviacion estandar</option>
                <option>Total</option>
              </select>
            </div>
            <!-- /.form group -->
          </div>

          <div class="col-md-4 mr-2">
            <div id="formvariable" class="form-group">
              <label for="variable">Variable 1</label>
              <select id="variable" name="variable" class="form-control">
                <option selected>Voltaje</option>
                <option>Efectos anodicos</option>
                <option>Alimentacion de alumina</option>
                <option>Temperatura de baño</option>
                <option>Duracion del tracking</option>
                <option>Acidez de Bano</option>
                <!-- <option>Consumo de alumina</option>  -->
                <option>Dump Size Alumina</option>
                <option>Consumo AlF3</option>
                <option>Track CD</option>
                <option>Consumo AlF3 Manual</option>
                <option>VMAX del Efecto Anodico</option>
                <option>Eficiencia de Trasegado (Eficiencia de corriente)</option>
                <option>Duracion de Efecto anódico</option>
                <option>Nivel de Metal</option>
                <option>Corriente de Linea</option>
                <option>Potencia nominal</option>
                <option>(BO+RAJ+BIM+Tetas)</option>
                <option>Potencia Neta</option>
                <option>Anodos B/O cambio Normal</option>
                <option>Nivel de Baño</option>
                <option>Anodos Bimetalicos</option>
                <option>Criolita Neta</option>
                <option>Criolita de Arranque</option>
                <option>Anodos B/A</option>
                <option>Baño Fase Densa</option>
                <option>Desviacion de Temperatura</option>
                <option>Hierro Metal de Celdas </option>
                <option>Desviacion Acidez</option>
                <option>Silicio Metal Celdas </option>
                <option>Desviacion Nm</option>
                <option>Frecuencia Desnatado</option>
                <option>Desviacion Nb</option>
                <option>Celdas Conectadas</option>
                <option>Frecuencia Efectos Anodicos</option>
                <option>% CaF2 en el baño electrolitico</option>
              </select>
            </div>
            <!-- /.form group -->

            <div class="form-group">
              <label>Rango de operacion</label>
              <br />
              <label>Rango 1 a consultar</label>
              <div class="form-row form-inline">
                <div class="input-group col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">operador</span>
                  </div>
                  <select class="custom-select" id="operador1" name="operador1">
                    <option selected value=""></option>
                    <option value="mayor">></option>
                    <option value="menor"><</option>
                    <option value="menorigual">&le;</option>
                    <option value="mayorigual">&ge;</option>
                  </select>
                </div>
                <!--  / input group -->
                <div class="input-group col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">rango 1</span>
                  </div>
                  <input
                    type="number"
                    step="0.01"
                    name="rango1"
                    class="form-control float-right"
                    id="rango1"
                  />
                </div>
                <!--  / input group -->
              </div>
              <!-- /.form row -->

              <label>Rango 2 a consultar</label>
              <div class="form-row form-inline">
                <div class="input-group col-md-6 offset-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">rango 2</span>
                  </div>
                  <input
                    type="number"
                    step="0.01"
                    name="rango2"
                    class="form-control float-right"
                    id="rango2"
                  />
                </div>
                <!--  / input group -->
              </div>
              <!-- /.form row -->
            </div>
            <!-- /.form group -->
          </div>

          <div class="col-md-4 mr-2">
            <div class="row">
              <label for="variable2" class="mr-2">Variable 2 </label>
              <div class="custom-control custom-checkbox">
                <input
                  type="checkbox"
                  name="checkVariable2"
                  class="custom-control-input"
                  id="checkVariable2"
                />
                <label class="custom-control-label" for="checkVariable2"></label>
              </div>
              <label for="variable2" class="mr-2">Configurar grafica </label>
              <div class="custom-control custom-checkbox">
                <input
                  type="checkbox"
                  name="checkConfig"
                  class="custom-control-input"
                  id="checkConfig"
                />
                <label class="custom-control-label" for="checkConfig"></label>
              </div>
            </div>
            <div id="variable2Form" style="display: none;">
              <div id="selectVariable2" class="form-group">
                <select id="variable2" name="variable2" class="form-control">
                  <option value="" selected> </option>
                  <option>Voltaje</option>
                  <option>Efectos anodicos</option>
                  <option>Alimentacion de alumina</option>
                  <option>Temperatura de baño</option>
                  <option>Duracion del tracking</option>
                  <option>Acidez de Bano</option>
                  <!-- <option>Consumo de alumina</option>  -->
                  <option>Dump Size Alumina</option>
                  <option>Consumo AlF3</option>
                  <option>Track CD</option>
                  <option>Consumo AlF3 Manual</option>
                  <option>VMAX del Efecto Anodico</option>
                  <option
                    >Eficiencia de Trasegado (Eficiencia de corriente)</option
                  >
                  <option>Duracion de Efecto anódico</option>
                  <option>Nivel de Metal</option>
                  <option>Corriente de Linea</option>
                  <option>Potencia nominal</option>
                  <option>(BO+RAJ+BIM+Tetas)</option>
                  <option>Potencia Neta</option>
                  <option>Anodos B/O cambio Normal</option>
                  <option>Nivel de Baño</option>
                  <option>Anodos Bimetalicos</option>
                  <option>Criolita Neta</option>
                  <option>Criolita de Arranque</option>
                  <option>Anodos B/A</option>
                  <option>Baño Fase Densa</option>
                  <option>Desviacion de Temperatura</option>
                  <option>Hierro Metal de Celdas </option>
                  <option>Desviacion Acidez</option>
                  <option>Silicio Metal Celdas </option>
                  <option>Desviacion Nm</option>
                  <option>Frecuencia Desnatado</option>
                  <option>Desviacion Nb</option>
                  <option>Celdas Conectadas</option>
                  <option>Frecuencia Efectos Anodicos</option>
                  <option>% CaF2 en el baño electrolitico</option>
                </select>
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label>Rango de operacion</label>
                <br />
                <label>Rango 1 a consultar</label>
                <div class="form-row form-inline">
                  <div class="input-group col-md-6">
                    <div class="input-group-prepend">
                      <span class="input-group-text">operador</span>
                    </div>
                    <select
                      class="custom-select"
                      id="var2Operador"
                      name="var2Operador"
                    >
                      <option selected value=""></option>
                      <option value="mayor">></option>
                      <option value="menor"><</option>
                      <option value="menorigual">&le;</option>
                      <option value="mayorigual">&ge;</option>
                    </select>
                  </div>
                  <!--  / input group -->
                  <div class="input-group col-md-6">
                    <div class="input-group-prepend">
                      <span class="input-group-text">rango 1</span>
                    </div>
                    <input
                      type="number"
                      step="0.01"
                      name="var2Rango1"
                      class="form-control float-right"
                      id="var2Rango1"
                    />
                  </div>
                  <!--  / input group -->
                </div>
                <!-- /.form row -->

                <label>Rango 2 a consultar</label>
                <div class="form-row form-inline">
                  <div class="input-group col-md-6 offset-6">
                    <div class="input-group-prepend">
                      <span class="input-group-text">rango 2</span>
                    </div>
                    <input
                      type="number"
                      step="0.01"
                      name="var2Rango2"
                      class="form-control float-right"
                      id="var2Rango2"
                    />
                  </div>
                  <!--  / input group -->
                </div>
                <!-- /.form row -->
              </div>
              <!-- /.form group -->
            </div>
          </div>

          <div class="col-md-3" id="configGrafica" style="display: none;">
            <label>Configuración de grafica</label>
            <div class="form-group">
              <div class="form-row">
                <label>Banda de control 1</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Min (banda 1)</span>
                  </div>
                  <input
                    type="number"
                    step="0.01"
                    name="banda1"
                    class="form-control float-right col-md-3"
                    id="banda1"
                  />
                </div>
                <!-- /.input group -->

                <label>Banda de control 2</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Max (banda 2)</span>
                  </div>
                  <input
                    type="number"
                    step="0.01"
                    name="banda2"
                    class="form-control float-right col-md-3"
                    id="banda2"
                  />
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form row -->
            </div>
            <!-- /.form group -->

            <div id="bandaVar2" style="display: none;">
              <label>Variable 2 Banda de control 1</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Min (banda 1)</span>
                </div>
                <input
                  type="number"
                  step="0.01"
                  name="banda1Var2"
                  class="form-control float-right col-md-3"
                  id="banda1Var2"
                />
              </div>
              <!-- /.input group -->

              <label>Variable 2 Banda de control 2</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Max (banda 2)</span>
                </div>
                <input
                  type="number"
                  step="0.01"
                  name="banda2Var2"
                  class="form-control float-right col-md-3"
                  id="banda2Var2"
                />
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <div class="form-row">
                <label>Minimo de la escala</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Min (escala de grafico)</span>
                  </div>
                  <input
                    type="number"
                    min="-5.00"
                    step="0.01"
                    name="EscalaMin"
                    class="form-control float-right col-md-3"
                    id="EscalaMin"
                  />
                </div>
                <!-- /.input group -->

                <label>Maximo de la escala</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Max (escala de grafico)</span>
                  </div>
                  <input
                    type="number"
                    step="0.01"
                    name="EscalaMax"
                    class="form-control float-right col-md-3"
                    id="EscalaMax"
                  />
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form row -->
            </div>
            <!-- /.form group -->
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Consultar</button>
      </form>
      <!-- /.form -->
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
      SICER
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->

  <!-- Card para las graficas-->
  <!-- Aqui se deberia utilizar un ciclo para mostrar las distintas graficas con menos codigo-->
  <!-- LINE CHART -->
  <div class="card card-info" style="display: none;" id="lineVChart">
    <div class="card-header">
      <h3 class="card-title">Line V Chart</h3>

      <div class="card-tools">
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
    </div>
    <div class="card-body">
      <div class="chart">
        <div class="chartjs-size-monitor">
          <div class="chartjs-size-monitor-expand"><div class=""></div></div>
          <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
        </div>
        <canvas
          id="lineChart"
          style="display: block; width: 764px;"
          width="764"
          height="250"
          class="chartjs-render-monitor"
        ></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

  <!-- Card para las graficas-->
  <!-- voltaje LINE CHART -->
  <div class="card card-info" id="cardGrafica" style="display: none;">
    <div class="card-header">
      <h3 class="card-title">Voltaje PRE Chart</h3>

      <div class="card-tools">
        <button
          type="button"
          id="voltajeChartwidget"
          class="btn btn-tool"
          data-card-widget="collapse"
        >
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="maximize">
          <i class="fas fa-expand"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="chart">
        <div class="chartjs-size-monitor">
          <div class="chartjs-size-monitor-expand"><div class=""></div></div>
          <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
        </div>
        <canvas
          id="voltajeChart"
          style="display: block; width: 764px;"
          width="764"
          height="250"
          class="chartjs-render-monitor"
        ></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

  <!-- Card para la tabla de los datos de la grafica -->
  <div class="card card-info" id="cardTablaDatos" style="display: none;">
    <div class="card-header">
      <h3 class="card-title">Tabla de datos de la grafica</h3>
      <div class="card-tools">
        <button
          type="button"
          class="btn btn-tool"
          id="celdaswidget"
          data-card-widget="collapse"
        >
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="maximize">
          <i class="fas fa-expand"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered" style="width:100%" id="celdas">
        <thead>
          <tr>
            <th id="thCelda">celda</th>
            <th>dia</th>
            <th id="thVariable"></th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
      <table class="table table-striped table-bordered" style="display: none; width: 100%;" id="celdas2">
        <thead>
          <tr>
            <th id="thCelda2">celda</th>
            <th>dia</th>
            <th id="thVariable2"></th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


  {{-- 

    <!-- Card para las graficas-->
    <!-- Desviación de Resistencia LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Desviación de Resistencia Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="desvResistChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->

    <!-- Card para las graficas-->
    <!-- Temperatura LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Temperatura Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="temperaturatChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->

    <!-- Card para las graficas-->
    <!-- ACIDEZ DE BAÑO LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">ACIDEZ DE BAÑO Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="acidBanoChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->

    <!-- Card para las graficas-->
    <!-- CONSUMO DE AlF3 LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">CONSUMO DE AlF3 Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="consumoAlChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->

    <!-- Card para las graficas-->
    <!-- CONSUMO DE AlF3 MANUAL LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">CONSUMO DE AlF3 MANUAL Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="consumoAlManChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->

    <!-- Card para las graficas-->
    <!-- EFICIENCIA DE TRASEGADO LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">EFICIENCIA DE TRASEGADO Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="eficTrasegChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->

    <!-- Card para las graficas-->
    <!-- NIVEL DE METAL LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">NIVEL DE METAL Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="nivelMetalChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->

    <!-- Card para las graficas-->
    <!-- POTENCIA NOMINAL LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">POTENCIA NOMINAL Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="potenciaNominalChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->

    <!-- Card para las graficas-->
    <!-- POTENCIA NETA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">POTENCIA NETA Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="potenciaNetaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->





    <!-- Card para las graficas-->
    <!-- Aqui se deberia utilizar un ciclo para mostrar las distintas graficas con menos codigo-->
    <!-- NIVEL DE BAÑO LINE CHART -->
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
            <canvas id="lineChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->

    <!-- Card para las graficas-->
    <!-- CRIOLITA NETA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Voltaje PRE Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- BAÑO FASE DENSA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Desviación de Resistencia Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- HIERRO METAL CELDAS LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Temperatura Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- SILICIO METAL LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">ACIDEZ DE BAÑO Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- FRECUENCIA DE DESNATADO LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">CONSUMO DE AlF3 Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- CELDAS CONECTADAS LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">CONSUMO DE AlF3 MANUAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- %CaF2  EN EL BAÑO ELECTROLÍTICO LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">EFICIENCIA DE TRASEGADO Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="eficTrasegChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->

    <!-- Card para las graficas-->
    <!-- EFECTOS ANÓDICOS LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">NIVEL DE METAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- ALIMENTACIÓN ALÚMINA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">POTENCIA NOMINAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- DUR TRACK LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">POTENCIA NETA Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- DUMP SIZE ALÚMINA LINE CHART -->
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

    <!-- Card para las graficas-->
    <!-- TRAC CD  LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Voltaje PRE Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- VMAX del EA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Desviación de Resistencia Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- DURACIÓN EA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">Temperatura Chart</h3>

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

    <!-- Card para las graficas-->
    <!--CORRIENTE DE LÍNEA LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">ACIDEZ DE BAÑO Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- (BO+RAJ+BIM+TETAS) LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">CONSUMO DE AlF3 Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- ÁNODOS B/O CAMBIO NORMAL LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">CONSUMO DE AlF3 MANUAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- ÁNODOS BIMETÁLICOS LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">EFICIENCIA DE TRASEGADO Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- ÁNODOS B/A LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">NIVEL DE METAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- Desv. Temperatura LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">POTENCIA NOMINAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- Desv. Acidez Línea LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">POTENCIA NETA Chart</h3>

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


    <!-- Card para las graficas-->
    <!-- Desv. Nm Línea LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">EFICIENCIA DE TRASEGADO Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- Desv. Nb Línea LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">NIVEL DE METAL Chart</h3>

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

    <!-- Card para las graficas-->
    <!-- FRECUENCIA  EFECTOS ANÓDICOS LINE CHART -->
    <div class="card card-info">
      <div class="card-header">
          <h3 class="card-title">POTENCIA NOMINAL Chart</h3>

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


    VOLTAJE PRE - Línea 5 voltajeChart
    Desviación de Resistencia -Línea 5 desvResistChart
    Temperatura  Línea 5 temperaturaChart
    ACIDEZ DE BAÑO -Línea 5 acidBanoChart
    CONSUMO DE AlF3 -Línea 5 consumoAlChart
    CONSUMO DE AlF3 MANUAL -Línea 5 consumoAlManChart
    EFICIENCIA DE TRASEGADO  Línea 5 eficTrasegChart
    NIVEL DE METAL Línea 5 nivelMetalChart
    POTENCIA NOMINAL Línea 5 potenciaNominalChart
    POTENCIA NETA Línea 5 potenciaNetaChart
    NIVEL DE BAÑO  Línea  5
    CRIOLITA NETA -  Linea 5
    BAÑO FASE DENSA -  Linea 5
    HIERRO METAL CELDAS  Línea  5
    SILICIO METAL CELDAS  Línea  5
    FRECUENCIA DE DESNATADO -Línea 5
    CELDAS CONECTADAS  Línea 5
    %CaF2  EN EL BAÑO ELECTROLÍTICO- Linea 5
    EFECTOS ANÓDICOS  -Línea 5
    ALIMENTACIÓN ALÚMINA Línea 5
    DUR TRACK -Línea 5
    DUMP SIZE ALÚMINA  -Línea 5
    TRAC CD  V-L
    VMAX del EA -Línea  5
    DURACIÓN EA  Línea 5
    CORRIENTE DE LÍNEA -Línea 5
    (BO+RAJ+BIM+TETAS)  Línea 5
    ÁNODOS B/O CAMBIO NORMAL-Línea 5
    ÁNODOS BIMETÁLICOS -Línea 5
    ÁNODOS B/A -Línea 5
    Desv. Temperatura Línea  5
    Desv. Acidez Línea  5
    Desv. Nm Línea  5
    Desv. Nb Línea  5
    FRECUENCIA  EFECTOS ANÓDICOS  - LINEA 5

  --}}

@stop
@section('js')
  <script> 
    //funcion para mostrar elemento HTML
    function mostrar(elemento) {
        $(elemento).show();
    }
    //funcion para ocultar elemento HTML
    function ocultar(elemento) {
        $(elemento).hide();
    }
    //funcion para destruir datatable y poder repintar
    const celldestroy = elemento => {
        cell = $(elemento).DataTable();
        cell.destroy();
    };
    //funcion para destruir charts y poder repintar
    const chartdestroy = elemento => {
        cell = $(elemento).DataTable();
        cell.destroy();
    };
    //Date range picker with time picker
    $("#rangoFecha").daterangepicker(
        {
            showWeekNumbers: true,
            minYear: 2003,
            ranges: {
                Hoy: [moment(), moment()],
                Ayer: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Últimos 7 días": [moment().subtract(6, "days"), moment()],
                "Últimos 30 días": [moment().subtract(29, "days"), moment()],
                "Este mes": [moment().startOf("month"), moment().endOf("month")],
                "Último mes": [
                    moment()
                        .subtract(1, "month")
                        .startOf("month"),
                    moment()
                        .subtract(1, "month")
                        .endOf("month")
                ]
            },
            locale: {
                format: "YYYY/MM/DD",
                separator: " - ",
                applyLabel: "Seleccionar",
                cancelLabel: "Cancelar",
                fromLabel: "Desde",
                toLabel: "Hasta",
                customRangeLabel: "Elegir",
                weekLabel: "Sem",
                daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                monthNames: [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                firstDay: 1
            },
            linkedCalendars: false,
            minDate: "01/01/2003",
            maxDate: moment()
        },
        function(start, end, label) {
            console.log(
                "New date range selected: " +
                    start.format("YYYY-MM-DD") +
                    " to " +
                    end.format("YYYY-MM-DD") +
                    " (predefined range: " +
                    label +
                    ")"
            );
        }
    );

    $("#chartwidget").CardWidget("collapse");
    $("#voltajeChartwidget").CardWidget("collapse");
    $("#celdaswidget").CardWidget("collapse");

    $(document).ready(function() {
        $("#formdata").submit(function(event) {
            event.preventDefault();
            formdatos = $(this).serializeArray();
            console.log($(this).serializeArray());
        });
    });

    /* ChartJS
    * -------
    * Here we will create a few charts using ChartJS
    */

    var url = "{{route('evolution.dataChart')}}";
    var Dia = new Array();
    var Celdas = new Array();
    var Voltaje = new Array();
    var ChartDataclear = {};
    var ChartOptionsclear = {};
    var ctx = document.getElementById("voltajeChart").getContext("2d");
    var varChart = new Chart(ctx, {
        type: "line",
        data: ChartDataclear,
        options: ChartOptionsclear
    });

    //funcion para mostrar elemento HTML cuando cambia un checkbox
    $("#checkConfig").change(function() {
        let estado = $("#checkConfig").is(":checked");
        if (estado) {
            mostrar("#configGrafica");
        } else {
            ocultar("#configGrafica");
        }
    });
    //funcion para cambiar valor de inputs cuando cambia un checkbox
    $("#checkLinea").change(function() {
        let estado = $("#checkLinea").is(":checked");
        if (estado) {
            $("#celda1").val(901);
            $("#celda2").val(1090);
        } else {
            $("#celda1").val("");
            $("#celda2").val("");
        }
    });
    //funcion para cambiar valor de inputs cuando cambia un checkbox
    $("#checkVariable2").change(function() {
        let estado = $("#checkVariable2").is(":checked");
        if (estado) {
           mostrar('#variable2Form');
           mostrar('#bandaVar2');
           
        } else {
            $("#var2Rango1").val("");
            $("#var2Rango2").val("");
            $("#variable2").val("");
            $("#banda1Var2").val("");
            $("#banda2Var2").val("");
            ocultar('#variable2Form');
            ocultar('#bandaVar2');
            
        }
    });

    $(document).ready(function() {
        $.ajaxSetup({
                  headers: {
                      "X-CSRF-TOKEN": "{{ csrf_token() }}"
                  }
        });
        $.ajax({
          type: "get",
          url: "{{ route('evolution.dataChart') }}",
          beforeSend: function() {
              /*
              * Esta función se ejecuta durante el envió de la petición al
              * servidor.
              * */
              
          },
          complete: function(data) {
              /*
              * Se ejecuta al termino de la petición
              * */
              MENSAJE = "Pagina en desarrollo" ;
              $("#mensaje").html(MENSAJE);
              $("#alertaMsj").html(MENSAJE);
              $("#modalMensaje").modal('show');
              
          },
          success: function(response) {
            var DiaVoltaje = new Array();
            var DatosVoltaje = new Array();
            var Banda1Voltaje = new Array();
            var Banda2Voltaje = new Array();

            var DiaCorriente = new Array();
            var DatosCorriente = new Array();
            var Banda1Corriente = new Array();
            var Banda2Corriente = new Array();

            var DiaEfCorriente = new Array();
            var DatosEfCorriente = new Array();
            var Banda1EfCorriente = new Array();
            var Banda2EfCorriente = new Array();

            var DiaDesvResistencia = new Array();
            var DatosDesvResistencia = new Array();
            var Banda1DesvResistencia = new Array();
            var Banda2DesvResistencia = new Array();

            var DiaFrecuenciaEA = new Array();
            var DatosFrecuenciaEA = new Array();
            var Banda1FrecuenciaEA = new Array();
            var Banda2FrecuenciaEA = new Array();

            var DiaPotencia = new Array();
            var DatosPotencia = new Array();
            var Banda1Potencia = new Array();
            var Banda2Potencia = new Array();

            var DiaNivelDeMetal = new Array();
            var DatosNivelDeMetal = new Array();
            var Banda1NivelDeMetal = new Array();
            var Banda2NivelDeMetal = new Array();

            var DiaNivelDeBano = new Array();
            var DatosNivelDeBano = new Array();
            var Banda1NivelDeBano = new Array();
            var Banda2NivelDeBano = new Array();

            var DiaFrecuenciaTK = new Array();
            var DatosFrecuenciaTK = new Array();
            var Banda1FrecuenciaTK = new Array();
            var Banda2FrecuenciaTK = new Array();

            var DiaDuracionTK = new Array();
            var DatosDuracionTK = new Array();
            var Banda1DuracionTK = new Array();
            var Banda2DuracionTK = new Array();
            
            var DiaGolpesAlumina = new Array();
            var DatosGolpesAlumina = new Array();
            var Banda1GolpesAlumina = new Array();
            var Banda2GolpesAlumina = new Array();

            var DiaAlimentacionAlumina = new Array();
            var DatosAlimentacionAlumina = new Array();
            var Banda1AlimentacionAlumina = new Array();
            var Banda2AlimentacionAlumina = new Array();

            var DiaTemperatura = new Array();
            var DatosTemperatura = new Array();
            var Banda1Temperatura = new Array();
            var Banda2Temperatura = new Array();

            var DiaAcidez = new Array();
            var DatosAcidez = new Array();
            var Banda1Acidez = new Array();
            var Banda2Acidez = new Array();

            var DiaDesvTemperatura = new Array();
            var DatosDesvTemperatura = new Array();
            var Banda1DesvTemperatura = new Array();
            var Banda2DesvTemperatura = new Array();

            var DiaDesvAcidez = new Array();
            var DatosDesvAcidez = new Array();
            var Banda1DesvAcidez = new Array();
            var Banda2DesvAcidez = new Array();

            var DiaConsumoFl = new Array();
            var DatosConsumoFl = new Array();
            var Banda1ConsumoFl = new Array();
            var Banda2ConsumoFl = new Array();

            var DiaPorcHierro = new Array();
            var DatosPorcHierro = new Array();
            var Banda1PorcHierro = new Array();
            var Banda2PorcHierro = new Array();

            var DiaPurezaSilicio = new Array();
            var DatosPurezaSilicio = new Array();
            var Banda1PurezaSilicio = new Array();
            var Banda2PurezaSilicio = new Array();

            var DiaPorcSilicio = new Array();
            var DatosPorcSilicio = new Array();
            var Banda1PorcSilicio = new Array();
            var Banda2PorcSilicio = new Array();

            //obteniendo datos para variable 1    
              response.datosVoltaje.forEach(function(data) {
                if (response.banda1voltaje != null) {
                    Banda1Voltaje.push(response.banda1voltaje);
                }
                if (response.banda2voltaje != null) {
                    Banda2Voltaje.push(response.banda2voltaje);
                }
                DiaVoltaje.push(data.dia);
                DatosVoltaje.push(data.voltaje);
              });

              response.datosCorriente.forEach(function(data) {
                if (response.banda1Corriente != null) {
                    Banda1Corriente.push(response.banda1Corriente);
                }
                if (response.banda2Corriente != null) {
                    Banda2Corriente.push(response.banda2Corriente);
                }
                DiaCorriente.push(data.dia);
                DatosCorriente.push(data.corriente);
              });

              response.datosEfCorriente.forEach(function(data) {
                if (response.banda1EfCorriente != null) {
                    Banda1EfCorriente.push(response.banda1EfCorriente);
                }
                if (response.banda2EfCorriente != null) {
                    Banda2EfCorriente.push(response.banda2EfCorriente);
                }
                DiaEfCorriente.push(data.dia);
                DatosEfCorriente.push(data.efCorriente);
              });

              response.datosDesvResistencia.forEach(function(data) {
                if (response.banda1DesvResistencia != null) {
                    Banda1DesvResistencia.push(response.banda1DesvResistencia);
                }
                if (response.banda2DesvResistencia != null) {
                    Banda2DesvResistencia.push(response.banda2DesvResistencia);
                }
                DiaDesvResistencia.push(data.dia);
                DatosDesvResistencia.push(data.desvResistencia);
              });

              response.datosFrecuenciaEA.forEach(function(data) {
                if (response.banda1FrecuenciaEA != null) {
                  Banda1FrecuenciaEA.push(response.banda1FrecuenciaEA);
                }
                if (response.banda2FrecuenciaEA != null) {
                    Banda2FrecuenciaEA.push(response.banda2FrecuenciaEA);
                }
                DiaFrecuenciaEA.push(data.dia);
                DatosFrecuenciaEA.push(data.frecuenciaEA);
              });

              response.datosPotencia.forEach(function(data) {
                if (response.banda1Potencia != null) {
                    Banda1Potencia.push(response.banda1Potencia);
                }
                if (response.banda2Potencia != null) {
                    Banda2Potencia.push(response.banda2Potencia);
                }
                DiaPotencia.push(data.dia);
                DatosPotencia.push(data.potencia);
              });

              response.datosNivelDeMetal.forEach(function(data) {
                if (response.banda1NivelDeMetal != null) {
                  Banda1NivelDeMetal.push(response.banda1NivelDeMetal);
                }
                if (response.banda2NivelDeMetal != null) {
                  Banda2NivelDeMetal.push(response.banda2NivelDeMetal);
                }
                DiaNivelDeMetal.push(data.dia);
                DatosNivelDeMetal.push(data.nivelDeMetal);
              });

              response.datosNivelDeBanio.forEach(function(data) {
                if (response.banda1NivelDeBano != null) {
                  Banda1NivelDeBano.push(response.banda1NivelDeBano);
                }
                if (response.banda2NivelDeBano != null) {
                  Banda2NivelDeBano.push(response.banda2NivelDeBano);
                }
                DiaNivelDeBano.push(data.dia);
                DatosNivelDeBano.push(data.nivelDeBanio);
              });

              response.datosFrecuenciaTK.forEach(function(data) {
                if (response.banda1FrecuenciaTK != null) {
                  Banda1FrecuenciaTK.push(response.banda1FrecuenciaTK);
                }
                if (response.banda2FrecuenciaTK != null) {
                  Banda2FrecuenciaTK.push(response.banda2FrecuenciaTK);
                }
                DiaFrecuenciaTK.push(data.dia);
                DatosFrecuenciaTK.push(data.frecuenciaTK);
              });

              response.datosDuracionTK.forEach(function(data) {
                if (response.banda1DuracionTK != null) {
                  Banda1DuracionTK.push(response.banda1DuracionTK);
                }
                if (response.banda2DuracionTK != null) {
                  Banda2DuracionTK.push(response.banda2DuracionTK);
                }
                DiaDuracionTK.push(data.dia);
                DatosDuracionTK.push(data.duracionTK);
              });

              response.datosGolpesAlumina.forEach(function(data) {
                if (response.banda1GolpesAlumina != null) {
                  Banda1GolpesAlumina.push(response.banda1GolpesAlumina);
                }
                if (response.banda2GolpesAlumina != null) {
                  Banda2GolpesAlumina.push(response.banda2GolpesAlumina);
                }
                DiaGolpesAlumina.push(data.dia);
                DatosGolpesAlumina.push(data.golpesAlumina);
              });

              response.datosAlimentacionAlumina.forEach(function(data) {
                if (response.banda1AlimentacionAlumina != null) {
                  Banda1AlimentacionAlumina.push(response.banda1AlimentacionAlumina);
                }
                if (response.banda2AlimentacionAlumina != null) {
                  Banda2AlimentacionAlumina.push(response.banda2AlimentacionAlumina);
                }
                DiaAlimentacionAlumina.push(data.dia);
                DatosAlimentacionAlumina.push(data.alimentacionAlumina);
              });
              
              response.datosTemperatura.forEach(function(data) {
                if (response.banda1Temperatura != null) {
                  Banda1Temperatura.push(response.banda1Temperatura);
                }
                if (response.banda2Temperatura != null) {
                  Banda2Temperatura.push(response.banda2Temperatura);
                }
                DiaTemperatura.push(data.dia);
                DatosTemperatura.push(data.temperatura);
              });

              response.datosAcidez.forEach(function(data) {
                if (response.banda1Acidez != null) {
                  Banda1Acidez.push(response.banda1Acidez);
                }
                if (response.banda2Acidez != null) {
                  Banda2Acidez.push(response.banda2Acidez);
                }
                DiaAcidez.push(data.dia);
                DatosAcidez.push(data.acidez);
              });

              response.datosDesvTemperatura.forEach(function(data) {
                if (response.banda1DesvTemperatura != null) {
                  Banda1DesvTemperatura.push(response.banda1DesvTemperatura);
                }
                if (response.banda2DesvTemperatura != null) {
                  Banda2DesvTemperatura.push(response.banda2DesvTemperatura);
                }
                DiaDesvTemperatura.push(data.dia);
                DatosDesvTemperatura.push(data.desvTemperatura);
              });

              response.datosDesvAcidez.forEach(function(data) {
                if (response.banda1DesvAcidez != null) {
                  Banda1DesvAcidez.push(response.banda1DesvAcidez);
                }
                if (response.banda2DesvAcidez != null) {
                  Banda2DesvAcidez.push(response.banda2DesvAcidez);
                }
                DiaDesvAcidez.push(data.dia);
                DatosDesvAcidez.push(data.desvAcidez);
              });

              response.datosConsumoFl.forEach(function(data) {
                if (response.banda1ConsumoFl != null) {
                  Banda1ConsumoFl.push(response.banda1ConsumoFl);
                }
                if (response.banda2ConsumoFl != null) {
                  Banda2ConsumoFl.push(response.banda2ConsumoFl);
                }
                DiaConsumoFl.push(data.dia);
                DatosConsumoFl.push(data.consumoFl);
              });

              response.datosPorcHierro.forEach(function(data) {
                if (response.banda1PorcHierro != null) {
                  Banda1PorcHierro.push(response.banda1PorcHierro);
                }
                if (response.banda2PorcHierro != null) {
                  Banda2PorcHierro.push(response.banda2PorcHierro);
                }
                DiaPorcHierro.push(data.dia);
                DatosPorcHierro.push(data.porcHierro);
              });

              response.datosPurezaSilicio.forEach(function(data) {
                if (response.banda1PurezaSilicio != null) {
                  Banda1PurezaSilicio.push(response.banda1PurezaSilicio);
                }
                if (response.banda2PurezaSilicio != null) {
                  Banda2PurezaSilicio.push(response.banda2PurezaSilicio);
                }
                DiaPurezaSilicio.push(data.dia);
                DatosPurezaSilicio.push(data.purezaSilicio);
              });

              response.datosPorcSilicio.forEach(function(data) {
                if (response.banda1PorcSilicio != null) {
                  Banda1PorcSilicio.push(response.banda1PorcSilicio);
                }
                if (response.banda2PorcSilicio != null) {
                  Banda2PorcSilicio.push(response.banda2PorcSilicio);
                }
                DiaPorcSilicio.push(data.dia);
                DatosPorcSilicio.push(data.porcSilicio);
              });

            var ChartOptions = {
                  responsive: true,
                  hoverMode: 'index',
                  stacked: false,
                  responsive: true,
                  title: {
                    display: true,
                    text: 'Grafica SICER - ' + response.variable 
                  },
                  tooltips: {
                    mode: 'nearest',
                    intersect: true,
                  },
                  hover: {
                    mode: 'nearest',
                    intersect: true,
                  },
                  scales: {
                      yAxes: [
                          {
                              scaleLabel: {
                                  labelString: response.ylabel,
                                  display: true
                              },
                              type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                              display: true,
                              position: "left",
                              id: "y-axis-1",
                              ticks: {
                                  min: response.miny,
                                  max: response.maxy
                              }
                          }
                      ],

                      xAxes: [
                          {
                              scaleLabel: {
                                  labelString: response.xlabel,
                                  display: true
                              },
                              position: "bottom",
                              id: "x-axis-1",
                              ticks: {
                                  // maxTicksLimit: 20
                              }
                          }
                      ]
                  }
            };
            console.log(response);
            var ctx = document.getElementById("lineChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: DiaVoltaje,
                    datasets: [
                        {
                            label: "Voltaje",
                            data: DatosVoltaje,
                            borderWidth: 1,
                            backgroundColor: "transparent",
                            borderColor: "#007bff",
                            pointBorderColor: "#007bff",
                            pointBackgroundColor: "#007bff",
                            fill: false,
                            lineTension: 0
                        },
                        {
                            label: "banda1",
                            data: Banda1Voltaje,
                            yAxisID: "y-axis-1",
                            borderWidth: 1,
                            backgroundColor: "transparent",
                            borderColor: "red",
                            pointBackgroundColor: "red",
                            pointBorderColor: "red",
                            pointStyle: "line",
                            fill: false,
                            lineTension: 0
                        },
                        {
                            label: "banda2",
                            data: Banda2Voltaje,
                            yAxisID: "y-axis-1",
                            borderWidth: 1,
                            backgroundColor: "transparent",
                            borderColor: "orange",
                            pointBackgroundColor: "orange",
                            pointBorderColor: "orange",
                            pointStyle: "line",
                            fill: false,
                            lineTension: 0
                        },
                    ]
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: false
                                }
                            }
                        ]
                    }
                }
            });


            var ctx = document.getElementById("lineChart2").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: DiaCorriente,
                    datasets: [
                        {
                            label: "Corriente",
                            data: DatosCorriente,
                            borderWidth: 1,
                            backgroundColor: "transparent",
                            borderColor: "#007bff",
                            pointBorderColor: "#007bff",
                            pointBackgroundColor: "#007bff",
                            fill: false,
                            lineTension: 0
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: false
                                }
                            }
                        ]
                    }
                }
            });

            var ctx = document.getElementById("lineChart3").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: DiaEfCorriente,
                    datasets: [
                        {
                            label: "EfCorriente",
                            data: DatosEfCorriente,
                            borderWidth: 1,
                            backgroundColor: "transparent",
                            borderColor: "#007bff",
                            pointBorderColor: "#007bff",
                            pointBackgroundColor: "#007bff",
                            fill: false,
                            lineTension: 0
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: false
                                }
                            }
                        ]
                    }
                }
            });

            var ctx = document.getElementById("lineChart4").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: DiaDesvResistencia,
                    datasets: [
                        {
                            label: "DesvResistencia",
                            data: DatosDesvResistencia,
                            borderWidth: 1,
                            backgroundColor: "transparent",
                            borderColor: "#007bff",
                            pointBorderColor: "#007bff",
                            pointBackgroundColor: "#007bff",
                            fill: false,
                            lineTension: 0
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: false
                                }
                            }
                        ]
                    }
                }
            });
            var ctx = document.getElementById("lineChart5").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: DiaFrecuenciaEA,
                    datasets: [
                        {
                            label: "FrecuenciaEA",
                            data: DatosFrecuenciaEA,
                            borderWidth: 1,
                            backgroundColor: "transparent",
                            borderColor: "#007bff",
                            pointBorderColor: "#007bff",
                            pointBackgroundColor: "#007bff",
                            fill: false,
                            lineTension: 0
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: false
                                }
                            }
                        ]
                    }
                }
            });

            var ctx = document.getElementById("lineChart6").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: DiaPotencia,
                    datasets: [
                        {
                            label: "Potencia",
                            data: DatosPotencia,
                            borderWidth: 1,
                            backgroundColor: "transparent",
                            borderColor: "#007bff",
                            pointBorderColor: "#007bff",
                            pointBackgroundColor: "#007bff",
                            fill: false,
                            lineTension: 0
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: false
                                }
                            }
                        ]
                    }
                }
            });

            var ctx = document.getElementById("lineChart7").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: DiaNivelDeMetal,
                    datasets: [
                        {
                            label: "NivelDeMetal",
                            data: DatosNivelDeMetal,
                            borderWidth: 1,
                            backgroundColor: "transparent",
                            borderColor: "#007bff",
                            pointBorderColor: "#007bff",
                            pointBackgroundColor: "#007bff",
                            fill: false,
                            lineTension: 0
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: false
                                }
                            }
                        ]
                    }
                }
            });

            var ctx = document.getElementById("lineChart8").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: DiaNivelDeBano,
                    datasets: [
                        {
                            label: "NivelDeBano",
                            data: DatosNivelDeBano,
                            borderWidth: 1,
                            backgroundColor: "transparent",
                            borderColor: "#007bff",
                            pointBorderColor: "#007bff",
                            pointBackgroundColor: "#007bff",
                            fill: false,
                            lineTension: 0
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: false
                                }
                            }
                        ]
                    }
                }
            });
            var ctx = document.getElementById("lineChart9").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: DiaFrecuenciaTK,
                    datasets: [
                        {
                            label: "FrecuenciaTK",
                            data: DatosFrecuenciaTK,
                            borderWidth: 1,
                            backgroundColor: "transparent",
                            borderColor: "#007bff",
                            pointBorderColor: "#007bff",
                            pointBackgroundColor: "#007bff",
                            fill: false,
                            lineTension: 0
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: false
                                }
                            }
                        ]
                    }
                  }
            });
          },
          error: function(data) {
                /*
                * Se ejecuta si la peticón ha sido erronea
                * */
                MENSAJE = "Problemas al tratar de enviar el formulario "+ data ;
                $("#mensaje").html(MENSAJE);
                $("#modalMensaje").modal('show');
      
          },
       });
     });

    //FUNCION QUE SE ESTA UTILIZANDO PARA GRAFICAR

    $(document).ready(function() {
        $("#formData").bind("submit", function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            });
            datos = $(this).serialize();
            console.log(datos);
            $.ajax({
                type: "post",
                url: "{{ route('evolution.dataChartp') }}",
                data: $(this).serialize(),
                beforeSend: function() {
                    /*
                    * Esta función se ejecuta durante el envió de la petición al
                    * servidor.
                    * */
                    celldestroy("#celdas");
                    celldestroy("#celdas2");
                },
                complete: function(data) {
                    /*
                    * Se ejecuta al termino de la petición
                    * */
                    MENSAJE = "Enviando: "+ data ;
                    $("#mensaje").html(MENSAJE);
                    $("#alertaMsj").html(MENSAJE);
                    $("#modalMensaje").modal('show');
                    
                },
                success: function(response) {
                    /*
                    * Se ejecuta cuando termina la petición y esta ha sido
                    * correcta
                    * */
                    console.log(response);
                    var Dia = new Array();
                    var Celdas = new Array();
                    var Datos = new Array();
                    var etiqueta = new Array();
                    var banda1 = new Array();
                    var banda2 = new Array();
                    var banda1Var2 = new Array();
                    var banda2Var2 = new Array();
                    var DatosVar2 = new Array();
                    var DiaVar2 = new Array();
                    var CeldasVar2 = new Array();
                    //obteniendo datos para variable 1    
                    response.datos.forEach(function(data) {
                        if (response.banda1 != null) {
                            banda1.push(response.banda1);
                        }
                        if (response.banda2 != null) {
                            banda2.push(response.banda2);
                        }
                        Dia.push(data.dia);
                        Celdas.push(data.celda);

                        switch (response.variable) {
                            case "Voltaje":
                                Datos.push(data.voltaje);
                                break;

                            case "Efectos anodicos":
                                Datos.push(data.numeroEA);
                                break;

                            case "Desviación de Resistencia":
                                //$variableDB = 'voltaje';//falta ubicarlo en BD
                                Datos.push(data.voltaje);
                                break;

                            case "Alimentacion de alumina":
                                Datos.push(data.golpesAlumina);
                                //$variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Temperatura de baño":
                                Datos.push(data.temperatura);
                                break;

                            case "Duracion de Tracking":
                                Datos.push(data.duracionTk);
                                break;

                            case "Acidez de Bano":
                                Datos.push(data.acidez);

                                break;

                            case "Dump Size Alumina":
                                Datos.push(data.voltaje);
                                //    $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Consumo AlF3":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Track CD":
                                Datos.push(data.numeroTk);
                                break;

                            case "Consumo AlF3 Manual":
                                Datos.push(data.voltaje);
                                //$variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "VMAX del Efecto Anodico":
                                Datos.push(data.vMaxEA);
                                break;

                            case "Eficiencia de Trasegado (Eficiencia de corriente)":
                                Datos.push(data.voltaje);
                                //$variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Duracion de Efecto anódico":
                                Datos.push(data.duracionEA);
                                break;

                            case "Nivel de Metal":
                                Datos.push(data.nivelDeMetal);

                                break;

                            case "Corriente de Linea ":
                                Datos.push(data.voltaje);
                                //$variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Potencia nominal":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "(BO+RAJ+BIM+Tetas)":
                                Datos.push(data.voltaje);
                                //$variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Potencia Neta":
                                Datos.push(data.voltaje);
                                //$variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Anodos B/O  cambio Normal":
                                Datos.push(data.voltaje);
                                //$variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Nivel de Baño":
                                Datos.push(data.nivelDeBanio);
                                break;

                            case "Anodos Bimetalicos":
                                //$variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Criolita Neta ":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Criolita de Arranque":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Anodos B/A":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Baño Fase Densa":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Desviacion de Temperatura":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Hierro Metal de Celdas ":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Desviacion Acidez":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Silicio Metal Celdas":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Desviacion Nm":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje'; //falta ubicarlo en BD
                                break;

                            case "Frecuencia Desnatado":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Desviacion Nb":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Celdas Conectadas":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;

                            case "Frecuencia Efectos Anodicos ":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje'; //falta ubicarlo en BD
                                break;

                            case "% CaF2 en el baño electrolitico":
                                Datos.push(data.voltaje);
                                // $variableDB = 'voltaje';//falta ubicarlo en BD
                                break;
                        }
                    });
                    //obteniendo datos si hay variable 2
                    if (response.variableVar2 != null) {
                        response.datosVar2.forEach(function(data) {
                            if (response.banda1Var2 != null) {
                                banda1Var2.push(response.banda1Var2);
                            }
                            if (response.banda2Var2 != null) {
                                banda2Var2.push(response.banda2Var2);
                            }
                            DiaVar2.push(data.dia);
                            CeldasVar2.push(data.celda);

                            switch (response.variableVar2) {
                                case "Voltaje":
                                    DatosVar2.push(data.voltaje);
                                    break;

                                case "Efectos anodicos":
                                    DatosVar2.push(data.numeroEA);
                                    break;

                                case "Desviación de Resistencia":
                                    //$variableDB = 'voltaje';//falta ubicarlo en BD
                                    DatosVar2.push(data.voltaje);
                                    break;

                                case "Alimentacion de alumina":
                                    DatosVar2.push(data.golpesAlumina);
                                    //$variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Temperatura de baño":
                                    DatosVar2.push(data.temperatura);
                                    break;

                                case "Duracion de Tracking":
                                    DatosVar2.push(data.duracionTk);
                                    break;

                                case "Acidez de Bano":
                                    DatosVar2.push(data.acidez);

                                    break;

                                case "Dump Size Alumina":
                                    DatosVar2.push(data.voltaje);
                                    //    $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Consumo AlF3":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Track CD":
                                    DatosVar2.push(data.numeroTk);
                                    break;

                                case "Consumo AlF3 Manual":
                                    DatosVar2.push(data.voltaje);
                                    //$variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "VMAX del Efecto Anodico":
                                    DatosVar2.push(data.vMaxEA);
                                    break;

                                case "Eficiencia de Trasegado (Eficiencia de corriente)":
                                    DatosVar2.push(data.voltaje);
                                    //$variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Duracion de Efecto anódico":
                                    DatosVar2.push(data.duracionEA);
                                    break;

                                case "Nivel de Metal":
                                    DatosVar2.push(data.nivelDeMetal);

                                    break;

                                case "Corriente de Linea ":
                                    DatosVar2.push(data.voltaje);
                                    //$variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Potencia nominal":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "(BO+RAJ+BIM+Tetas)":
                                    DatosVar2.push(data.voltaje);
                                    //$variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Potencia Neta":
                                    DatosVar2.push(data.voltaje);
                                    //$variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Anodos B/O  cambio Normal":
                                    DatosVar2.push(data.voltaje);
                                    //$variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Nivel de Baño":
                                    DatosVar2.push(data.nivelDeBanio);
                                    break;

                                case "Anodos Bimetalicos":
                                    //$variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Criolita Neta ":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Criolita de Arranque":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Anodos B/A":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Baño Fase Densa":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Desviacion de Temperatura":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Hierro Metal de Celdas ":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Desviacion Acidez":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Silicio Metal Celdas":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Desviacion Nm":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje'; //falta ubicarlo en BD
                                    break;

                                case "Frecuencia Desnatado":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Desviacion Nb":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Celdas Conectadas":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;

                                case "Frecuencia Efectos Anodicos ":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje'; //falta ubicarlo en BD
                                    break;

                                case "% CaF2 en el baño electrolitico":
                                    DatosVar2.push(data.voltaje);
                                    // $variableDB = 'voltaje';//falta ubicarlo en BD
                                    break;
                            }
                        });
                    }
                    // mostrando variables para verificacion
                      console.log("etiqueta");
                      console.log(etiqueta);
                      console.log("Dia");
                      console.log(Dia);
                      console.log("Celdas");
                      console.log(Celdas);
                      console.log("Datos");
                      console.log(Datos);
                      console.log("banda1");
                      console.log(banda1);
                      console.log("banda2");
                      console.log(banda2);

                      console.log("DiaVar2");
                      console.log(DiaVar2);
                      console.log("CeldasVar2");
                      console.log(CeldasVar2);
                      console.log("DatosVar2");
                      console.log(DatosVar2);
                      console.log("banda1Var2");
                      console.log(banda1Var2);
                      console.log("banda2Var2");
                      console.log(banda2Var2);
                    // fin de muestra de variables
                    mostrar("#cardGrafica");
                    mostrar("#cardTablaDatos");
                    if (response.variableVar2 != null) {
                        console.log("entro");
                        mostrar("#celdas2");
                    }

                    // Si existe una 2da variable muestra o no datos de los ejes y configuraciones de la 2da var
                    if (response.variableVar2 != null) {
                      var ChartOptions = {
                        responsive: true,
                        hoverMode: 'index',
                        stacked: false,
                        responsive: true,
                        title: {
                          display: true,
                          text: 'Grafica SICER - ' + response.variable + ' - ' + response.variableVar2
                        },
                        tooltips: {
                          mode: 'nearest',
                          intersect: true,
                        },
                        hover: {
                          mode: 'nearest',
                          intersect: true,
                        },
                        scales: {
                            yAxes: [
                                {
                                    scaleLabel: {
                                        labelString: response.ylabel,
                                        display: true
                                    },
                                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                                    display: true,
                                    position: "left",
                                    id: "y-axis-1",
                                    ticks: {
                                        min: response.miny,
                                        max: response.maxy
                                    }
                                },
                                {
                                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                                    display: true,
                                    scaleLabel: {
                                        labelString: response.ylabelVar2,
                                        display: true
                                    },
                                    position: "right",
                                    id: "y-axis-2",
                                    ticks: {
                                        min: response.minyVar2,
                                        max: response.maxyVar2
                                    }
                                }
                            ],

                            xAxes: [
                                {
                                    scaleLabel: {
                                        labelString: response.xlabel,
                                        display: true
                                    },
                                    position: "bottom",
                                    id: "x-axis-1",
                                    ticks: {
                                        // maxTicksLimit: 20
                                    }
                                }
                            ]
                        }
                    };
                    }else{
                      var ChartOptions = {
                        responsive: true,
                        hoverMode: 'index',
                        stacked: false,
                        responsive: true,
                        title: {
                          display: true,
                          text: 'Grafica SICER - ' + response.variable 
                        },
                        tooltips: {
                          mode: 'nearest',
                          intersect: true,
                        },
                        hover: {
                          mode: 'nearest',
                          intersect: true,
                        },
                        scales: {
                            yAxes: [
                                {
                                    scaleLabel: {
                                        labelString: response.ylabel,
                                        display: true
                                    },
                                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                                    display: true,
                                    position: "left",
                                    id: "y-axis-1",
                                    ticks: {
                                        min: response.miny,
                                        max: response.maxy
                                    }
                                }
                            ],

                            xAxes: [
                                {
                                    scaleLabel: {
                                        labelString: response.xlabel,
                                        display: true
                                    },
                                    position: "bottom",
                                    id: "x-axis-1",
                                    ticks: {
                                        // maxTicksLimit: 20
                                    }
                                }
                            ]
                        }
                    };

                    }

                    // Si existe una 2da variable muestra o no datos de leyenda y de la data de la 2da var
                    if (response.variableVar2 != null) {
                      var ChartData = {
                          labels: Dia,
                          datasets: [
                              {
                                  label: response.variable,
                                  data: Datos,
                                  yAxisID: "y-axis-1",
                                  borderWidth: 1,
                                  backgroundColor: "transparent",
                                  borderColor: "#007bff",
                                  pointBorderColor: "#007bff",
                                  pointBackgroundColor: "#007bff",
                                  fill: false,
                                  lineTension: 0
                              },
                              /*{
                                  label: "celdas",
                                  data: Celdas,
                                  yAxisID: "y-axis-1",
                                  showLine: true,
                                  borderWidth: 1,
                                  backgroundColor: "transparent",
                                  borderColor: "green",
                                  pointBackgroundColor: "green",
                                  pointBorderColor: "green",
                                  pointStyle: "line",
                                  fill: false,
                                  lineTension: 0
                              }, */
                              {
                                  label: "banda1",
                                  data: banda1,
                                  yAxisID: "y-axis-1",
                                  borderWidth: 1,
                                  backgroundColor: "transparent",
                                  borderColor: "red",
                                  pointBackgroundColor: "red",
                                  pointBorderColor: "red",
                                  pointStyle: "line",
                                  fill: false,
                                  lineTension: 0
                              },
                              {
                                  label: "banda2",
                                  data: banda2,
                                  yAxisID: "y-axis-1",
                                  borderWidth: 1,
                                  backgroundColor: "transparent",
                                  borderColor: "orange",
                                  pointBackgroundColor: "orange",
                                  pointBorderColor: "orange",
                                  pointStyle: "line",
                                  fill: false,
                                  lineTension: 0
                              },
                              {
                                  label: response.variableVar2,
                                  data: DatosVar2,
                                  yAxisID: "y-axis-2",
                                  borderWidth: 1,
                                  backgroundColor: "transparent",
                                  borderColor: "#9803fc",
                                  pointBorderColor: "#9803fc",
                                  pointBackgroundColor: "#9803fc",
                                  fill: false,
                                  lineTension: 0
                              },
                             /* {
                                  label: "celdas2",
                                  data: CeldasVar2,
                                  yAxisID: "y-axis-2",
                                  showLine: false,
                                  borderWidth: 1,
                                  backgroundColor: "transparent",
                                  borderColor: "orange",
                                  pointStyle: "line",
                                  fill: false,
                                  lineTension: 0
                              }, */
                              {
                                  label: "banda1Var2",
                                  data: banda1Var2,
                                  yAxisID: "y-axis-2",
                                  borderWidth: 1,
                                  backgroundColor: "transparent",
                                  borderColor: "brown",
                                  pointBorderColor: "#brown",
                                  pointBackgroundColor: "#brown",
                                  pointStyle: "line",
                                  fill: false,
                                  lineTension: 0
                              },
                              {
                                  label: "banda2Var2",
                                  data: banda2Var2,
                                  yAxisID: "y-axis-2",
                                  borderWidth: 1,
                                  backgroundColor: "transparent",
                                  borderColor: "black",
                                  pointBorderColor: "#black",
                                  pointBackgroundColor: "#black",
                                  pointStyle: "line",
                                  fill: false,
                                  lineTension: 0
                              }
                          ]
                      };

                    }else{
                      var ChartData = {
                          labels: Dia,
                          datasets: [
                              {
                                  label: response.variable,
                                  data: Datos,
                                  yAxisID: "y-axis-1",
                                  borderWidth: 1,
                                  backgroundColor: "transparent",
                                  borderColor: "#007bff",
                                  pointBorderColor: "#007bff",
                                  pointBackgroundColor: "#007bff",
                                  fill: false,
                                  lineTension: 0
                              },
                             /* {
                                  label: "celdas",
                                  data: Celdas,
                                  yAxisID: "y-axis-1",
                                  showLine: true,
                                  borderWidth: 1,
                                  backgroundColor: "transparent",
                                  borderColor: "green",
                                  pointBackgroundColor: "green",
                                  pointBorderColor: "green",
                                  pointStyle: "line",
                                  fill: false,
                                  lineTension: 0
                              }, */
                              {
                                  label: "banda1",
                                  data: banda1,
                                  yAxisID: "y-axis-1",
                                  borderWidth: 1,
                                  backgroundColor: "transparent",
                                  borderColor: "red",
                                  pointBackgroundColor: "red",
                                  pointBorderColor: "red",
                                  pointStyle: "line",
                                  fill: false,
                                  lineTension: 0
                              },
                              {
                                  label: "banda2",
                                  data: banda2,
                                  yAxisID: "y-axis-1",
                                  borderWidth: 1,
                                  backgroundColor: "transparent",
                                  borderColor: "orange",
                                  pointBackgroundColor: "orange",
                                  pointBorderColor: "orange",
                                  pointStyle: "line",
                                  fill: false,
                                  lineTension: 0
                              },
                              
                          ]
                      };
                    }

                    varChart.options = ChartOptions;
                    varChart.data = ChartData;
                    varChart.update();
                    $("#voltajeChart").CardWidget("expand");
                    $("#thVariable").text(response.variable);
                    $("#thVariable2").text(response.variableVar2);
                    $("#celdaswidget").CardWidget("expand");

                    //rellena las tablas con valores consultados
                    if (response.calculo != '') {
                      $("#thCelda").text(response.calculo);
                      $("#celdas").DataTable({
                        data: response.datatable.original.data,
                        processing: true,
                        paging: false,
                        columns: [
                            { "defaultContent": response.calculo},
                            { data: "dia" },
                            { data: response.varKey }
                        ],
                        dom: '<"top"fl>rt<"bottom"Bip><"clear">',
                        buttons: [
                            {
                                extend: "copy",
                                text: "copiar",
                                className: "btn btn-primary"
                            },
                            {
                                extend: "csv",
                                text: "csv",
                                className: "btn btn-primary"
                            },
                            {
                                extend: "excel",
                                text: "excel",
                                className: "btn btn-primary"
                            },
                            {
                                extend: "pdf",
                                text: "pdf",
                                className: "btn btn-primary"
                            },
                            {
                                extend: "print",
                                text: "imprimir",
                                className: "btn btn-primary"
                            }
                        ]
                      });
                      if (response.variableVar2 != null) {
                          $("#thCelda2").text(response.calculo);
                          $("#celdas2").DataTable({
                              data: response.datatableVar2.original.data,
                              processing: true,
                              paging: false,
                              columns: [
                                { "defaultContent": response.calculo},
                                  { data: "dia" },
                                  { data: response.varKeyVar2 }
                              ],
                              dom: '<"top"fl>rt<"bottom"Bip><"clear">',
                              buttons: [
                                  {
                                      extend: "copy",
                                      text: "copy",
                                      className: "btn btn-primary"
                                  },
                                  {
                                      extend: "csv",
                                      text: "csv",
                                      className: "btn btn-primary"
                                  },
                                  {
                                      extend: "excel",
                                      text: "excel",
                                      className: "btn btn-primary"
                                  },
                                  {
                                      extend: "pdf",
                                      text: "pdf",
                                      className: "btn btn-primary"
                                  },
                                  {
                                      extend: "print",
                                      text: "print",
                                      className: "btn btn-primary"
                                  }
                              ]
                          });
                      }
                    }else{
                      $("#thCelda").text('celda');
                      $("#celdas").DataTable({
                        data: response.datatable.original.data,
                        processing: true,
                        paging: false,
                        columns: [
                            { data: "celda" },
                            { data: "dia" },
                            { data: response.varKey }
                        ],
                        dom: '<"top"fl>rt<"bottom"Bip><"clear">',
                        buttons: [
                            {
                                extend: "copy",
                                text: "copy",
                                className: "btn btn-primary"
                            },
                            {
                                extend: "csv",
                                text: "csv",
                                className: "btn btn-primary"
                            },
                            {
                                extend: "excel",
                                text: "excel",
                                className: "btn btn-primary"
                            },
                            {
                                extend: "pdf",
                                text: "pdf",
                                className: "btn btn-primary"
                            },
                            {
                                extend: "print",
                                text: "print",
                                className: "btn btn-primary"
                            }
                        ]
                      });
                      if (response.variableVar2 != null) {
                        $("#thCelda2").text('celda');
                          $("#celdas2").DataTable({
                              data: response.datatableVar2.original.data,
                              processing: true,
                              paging: false,
                              columns: [
                                  { data: "celda" },
                                  { data: "dia" },
                                  { data: response.varKeyVar2 }
                              ],
                              dom: '<"top"fl>rt<"bottom"Bip><"clear">',
                              buttons: [
                                  {
                                      extend: "copy",
                                      text: "copy",
                                      className: "btn btn-primary"
                                  },
                                  {
                                      extend: "csv",
                                      text: "csv",
                                      className: "btn btn-primary"
                                  },
                                  {
                                      extend: "excel",
                                      text: "excel",
                                      className: "btn btn-primary"
                                  },
                                  {
                                      extend: "pdf",
                                      text: "pdf",
                                      className: "btn btn-primary"
                                  },
                                  {
                                      extend: "print",
                                      text: "print",
                                      className: "btn btn-primary"
                                  }
                              ]
                          });
                      }

                    }

                    
                },
                error: function(data) {
                    /*
                    * Se ejecuta si la peticón ha sido erronea
                    * */
                    MENSAJE = "Problemas al tratar de enviar el formulario "+ data ;
                    $("#mensaje").html(MENSAJE);
                    $("#modalMensaje").modal('show');
                }
            });
            // Nos permite cancelar el envio del formulario
            return false;
        });
    });

    /*
        
        
        
            var areaChartData = {
              labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
              datasets: [
                {
                  label               : 'voltaje celda 1',
                  backgroundColor     : 'rgba(60,141,188,0.9)',
                  borderColor         : 'rgba(60,141,188,0.8)',
                  pointRadius          : false,
                  pointColor          : '#3b8bba',
                  pointStrokeColor    : 'rgba(60,141,188,1)',
                  pointHighlightFill  : '#fff',
                  lineTension         : 0,
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data                : [28, 48, 40, 19, 86, 27, 90]
                },
                {
                  label               : 'celda 2',
                  backgroundColor     : 'rgba(210, 214, 222, 1)',
                  borderColor         : 'rgba(210, 214, 222, 1)',
                  pointRadius         : false,
                  pointColor          : 'rgba(210, 214, 222, 1)',
                  pointStrokeColor    : '#c1c7d1',
                  pointHighlightFill  : '#fff',
                  lineTension         : 0,
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
                  lineTension         : 0,
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
        
        
        
        
        
        // otras graficas 
            var lineChart1Canvas = $('#lineChart1').get(0).getContext('2d')
            var lineChart1Options = jQuery.extend(true, {}, areaChartOptions)
            var lineChart1Data = jQuery.extend(true, {}, areaChartData)
            lineChart1Data.datasets[0].fill = false;
            lineChart1Data.datasets[1].fill = false;
            lineChart1Data.datasets[2].fill = true;
            lineChart1Options.datasetFill = false
        
            var lineChart1 = new Chart(lineChart1Canvas, { 
              type: 'line',
              data: lineChart1Data, 
              options: lineChart1Options
            })
        
        
            var desvResistChartCanvas = $('#desvResistChart').get(0).getContext('2d')
            var desvResistChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var desvResistChartData = jQuery.extend(true, {}, areaChartData)
            desvResistChartData.datasets[0].fill = false;
            desvResistChartData.datasets[1].fill = false;
            desvResistChartData.datasets[2].fill = true;
            desvResistChartOptions.datasetFill = false
        
            var desvResistChart = new Chart(desvResistChartCanvas, { 
              type: 'line',
              data: desvResistChartData, 
              options: desvResistChartOptions
            })
            
        
            var temperaturatChartCanvas = $('#temperaturatChart').get(0).getContext('2d')
            var temperaturatChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var temperaturatChartData = jQuery.extend(true, {}, areaChartData)
            temperaturatChartData.datasets[0].fill = false;
            temperaturatChartData.datasets[1].fill = false;
            temperaturatChartData.datasets[2].fill = true;
            temperaturatChartOptions.datasetFill = false
        
            var temperaturatChart = new Chart(temperaturatChartCanvas, { 
              type: 'line',
              data: temperaturatChartData, 
              options: temperaturatChartOptions
            })
            
            var acidBanoChartCanvas = $('#acidBanoChart').get(0).getContext('2d')
            var acidBanoChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var acidBanoChartData = jQuery.extend(true, {}, areaChartData)
            acidBanoChartData.datasets[0].fill = false;
            acidBanoChartData.datasets[1].fill = false;
            acidBanoChartData.datasets[2].fill = true;
            acidBanoChartOptions.datasetFill = false
        
            var acidBanoChart = new Chart(acidBanoChartCanvas, { 
              type: 'line',
              data: acidBanoChartData, 
              options: acidBanoChartOptions
            })
            
            var consumoAlChartCanvas = $('#consumoAlChart').get(0).getContext('2d')
            var consumoAlChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var consumoAlChartData = jQuery.extend(true, {}, areaChartData)
            consumoAlChartData.datasets[0].fill = false;
            consumoAlChartData.datasets[1].fill = false;
            consumoAlChartData.datasets[2].fill = true;
            consumoAlChartOptions.datasetFill = false
        
            var consumoAlChart = new Chart(consumoAlChartCanvas, { 
              type: 'line',
              data: consumoAlChartData, 
              options: consumoAlChartOptions
            })
        
            var consumoAlManChartCanvas = $('#consumoAlManChart').get(0).getContext('2d')
            var consumoAlManChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var consumoAlManChartData = jQuery.extend(true, {}, areaChartData)
            consumoAlManChartData.datasets[0].fill = false;
            consumoAlManChartData.datasets[1].fill = false;
            consumoAlManChartData.datasets[2].fill = true;
            consumoAlManChartOptions.datasetFill = false
        
            var consumoAlManChart = new Chart(consumoAlManChartCanvas, { 
              type: 'line',
              data: consumoAlManChartData, 
              options: consumoAlManChartOptions
            })
        
        
            var eficTrasegChartCanvas = $('#eficTrasegChart').get(0).getContext('2d')
            var eficTrasegChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var eficTrasegChartData = jQuery.extend(true, {}, areaChartData)
            eficTrasegChartData.datasets[0].fill = false;
            eficTrasegChartData.datasets[1].fill = false;
            eficTrasegChartData.datasets[2].fill = true;
            eficTrasegChartOptions.datasetFill = false
        
            var eficTrasegChart = new Chart(eficTrasegChartCanvas, { 
              type: 'line',
              data: eficTrasegChartData, 
              options: eficTrasegChartOptions
            })
            
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            //SEGUNDA GRAFICA
            var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
          }
            var mode      = 'index'
            var intersect = true
            var $voltajeChartCanvas = $('#voltajeChart').get(0).getContext('2d')
            var voltajeChart  = new Chart($voltajeChartCanvas, {
            data   : {
              labels  : ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
              datasets: [{
                type                : 'line',
                data                : [100, 120, 170, 167, 180, 177, 160],
                backgroundColor     : 'transparent',
                borderColor         : '#007bff',
                pointBorderColor    : '#007bff',
                pointBackgroundColor: '#007bff',
                fill                : false
                // pointHoverBackgroundColor: '#007bff',
                // pointHoverBorderColor    : '#007bff'
              },
                {
                  type                : 'line',
                  data                : [60, 80, 70, 67, 80, 77, 100],
                  backgroundColor     : 'tansparent',
                  borderColor         : '#ced4da',
                  pointBorderColor    : '#ced4da',
                  pointBackgroundColor: '#ced4da',
                  fill                : false
                  // pointHoverBackgroundColor: '#ced4da',
                  // pointHoverBorderColor    : '#ced4da'
                }]
            },
            options: {
              maintainAspectRatio: false,
              tooltips           : {
                mode     : mode,
                intersect: intersect
              },
              hover              : {
                mode     : mode,
                intersect: intersect
              },
              legend             : {
                display: false
              },
              scales             : {
                yAxes: [{
                  // display: false,
                  gridLines: {
                    display      : true,
                    lineWidth    : '4px',
                    color        : 'rgba(0, 0, 0, .2)',
                    zeroLineColor: 'transparent'
                  },
                  ticks    : $.extend({
                    beginAtZero : true,
                    suggestedMax: 200
                  }, ticksStyle)
                }],
                xAxes: [{
                  display  : true,
                  gridLines: {
                    display: false
                  },
                  ticks    : ticksStyle
                }]
              }
            }
          })
        
        
    */


  </script>
@stop
