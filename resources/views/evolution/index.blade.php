@extends('adminlte::page')
@section('content_header')
    <h1 class=""><i class="fa fa-chart-bar"></i> Evolucion de línea</h1>
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

<!-- Card para las graficas-->
<!-- voltaje LINE CHART -->
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
        <canvas id="voltajeChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
<!-- /.card -->

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
          lineTension         : 0,
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





</script>
@stop
