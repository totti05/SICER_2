@extends('adminlte::page')
@section('content_header')
  <h1 class=""><i class="fa fa-chart-bar"></i> Evolucion de línea</h1>
  <form id="formPredet" class="form-inline justify-content-end">
    <div class="form-group ml-2 mb-2">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="far fa-clock"></i></span>
        </div>
        <input
          type="text"
          name="rangoFechaPredet"
          class="form-control float-right"
          id="rangoFechaPredet"
        />
      </div>
      <!-- /.input group -->
    </div>
    <!-- /.form group -->
    <button type="submit" class="btn btn-primary mb-2">Consultar</button>
  </form>
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
  .chart{
    position: relative; 
    max-height: 80vh;
    max-width:80vw;
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
  <div class="modal" tabindex="-1" role="dialog" id="modalMensaje">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Alerta de SICER</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="mensaje">Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <!-- Card para las graficas-->
      <!-- Desviación de Resistencia LINE CHART -->
      <div class="card card-navy" id="cardVoltaje">
        <div class="card-header">
          <h3 class="card-title">Gráfica - Voltaje</h3>

          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="collapse"
              id="voltajeChartwidget"
            >
              <i class="fas fa-minus"></i>
            </button>
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="maximize"
            >
              <i class="fas fa-expand"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="voltajeChart" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="button" class="btn btn-primary">PDF</button>
          <button type="button" class="btn btn-primary">Copiar</button>
          <button type="button" id="imprimir_btn"class="btn btn-primary">Imprimir</button>
          <button type="button" class="btn btn-primary">Excel</button>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

      <!-- Card para las graficas-->
      <!-- Temperatura LINE CHART -->
      <div class="card card-navy">
        <div class="card-header">
          <h3 class="card-title">Gráfica - Corriente</h3>

          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="collapse"
            >
              <i class="fas fa-minus"></i>
            </button>
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="maximize"
            >
              <i class="fas fa-expand"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="corrienteChart" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="button" class="btn btn-primary">PDF</button>
          <button type="button" class="btn btn-primary">Copiar</button>
          <button type="button" class="btn btn-primary">Imprimir</button>
          <button type="button" class="btn btn-primary">Excel</button>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

      <!-- Card para las graficas-->
      <!-- ACIDEZ DE BAÑO LINE CHART -->
      <div class="card card-navy">
        <div class="card-header">
          <h3 class="card-title">Gráfica - Eficiencia de corriente</h3>

          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="collapse"
            >
              <i class="fas fa-minus"></i>
            </button>
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="maximize"
            >
              <i class="fas fa-expand"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="efCorrienteChart" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="button" class="btn btn-primary">PDF</button>
          <button type="button" class="btn btn-primary">Copiar</button>
          <button type="button" class="btn btn-primary">Imprimir</button>
          <button type="button" class="btn btn-primary">Excel</button>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>

    <div class="col-md-4">
      <!-- Card para las graficas-->
      <!-- CONSUMO DE AlF3 LINE CHART -->
      <div class="card card-navy">
        <div class="card-header">
          <h3 class="card-title">Gráfica - Desviacion de resistencia</h3>

          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="collapse"
            >
              <i class="fas fa-minus"></i>
            </button>
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="maximize"
            >
              <i class="fas fa-expand"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas
              id="desvResistenciaChart"
              class="chartjs-render-monitor"
            ></canvas>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="button" class="btn btn-primary">PDF</button>
          <button type="button" class="btn btn-primary">Copiar</button>
          <button type="button" class="btn btn-primary">Imprimir</button>
          <button type="button" class="btn btn-primary">Excel</button>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

      <!-- Card para las graficas-->
      <!-- CONSUMO DE AlF3 MANUAL LINE CHART -->
      <div class="card card-navy">
        <div class="card-header">
          <h3 class="card-title">Gráfica - Frecuencia de efecto anódico</h3>

          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="collapse"
            >
              <i class="fas fa-minus"></i>
            </button>
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="maximize"
            >
              <i class="fas fa-expand"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas
              id="frecuenciaEAChart"
              class="chartjs-render-monitor"
            ></canvas>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="button" class="btn btn-primary">PDF</button>
          <button type="button" class="btn btn-primary">Copiar</button>
          <button type="button" class="btn btn-primary">Imprimir</button>
          <button type="button" class="btn btn-primary">Excel</button>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

      <!-- Card para las graficas-->
      <!-- EFICIENCIA DE TRASEGADO LINE CHART -->
      <div class="card card-navy">
        <div class="card-header">
          <h3 class="card-title">Gráfica - Potencia</h3>

          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="collapse"
            >
              <i class="fas fa-minus"></i>
            </button>
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="maximize"
            >
              <i class="fas fa-expand"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="potenciaChart" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="button" class="btn btn-primary">PDF</button>
          <button type="button" class="btn btn-primary">Copiar</button>
          <button type="button" class="btn btn-primary">Imprimir</button>
          <button type="button" class="btn btn-primary">Excel</button>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>

    <div class="col-md-4">
      <!-- Card para las graficas-->
      <!-- NIVEL DE METAL LINE CHART -->
      <div class="card card-navy">
        <div class="card-header">
          <h3 class="card-title">Gráfica - Nivel de metal</h3>

          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="collapse"
            >
              <i class="fas fa-minus"></i>
            </button>
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="maximize"
            >
              <i class="fas fa-expand"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas
              id="nivelDeMetalChart"
              class="chartjs-render-monitor"
            ></canvas>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="button" class="btn btn-primary">PDF</button>
          <button type="button" class="btn btn-primary">Copiar</button>
          <button type="button" class="btn btn-primary">Imprimir</button>
          <button type="button" class="btn btn-primary">Excel</button>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

      <!-- Card para las graficas-->
      <!-- POTENCIA NOMINAL LINE CHART -->
      <div class="card card-navy">
        <div class="card-header">
          <h3 class="card-title">Gráfica - Nivel de baño</h3>

          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="collapse"
            >
              <i class="fas fa-minus"></i>
            </button>
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="maximize"
            >
              <i class="fas fa-expand"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="nivelDeBanoChart" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="button" class="btn btn-primary">PDF</button>
          <button type="button" class="btn btn-primary">Copiar</button>
          <button type="button" class="btn btn-primary">Imprimir</button>
          <button type="button" class="btn btn-primary">Excel</button>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

      <!-- Card para las graficas-->
      <!-- POTENCIA NETA LINE CHART -->
      <div class="card card-navy">
        <div class="card-header">
          <h3 class="card-title">Grafica - Frecuencia de tracking</h3>

          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="collapse"
            >
              <i class="fas fa-minus"></i>
            </button>
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="maximize"
            >
              <i class="fas fa-expand"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas
              id="frecuenciaTKChart"
              class="chartjs-render-monitor"
            ></canvas>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="button" class="btn btn-primary">PDF</button>
          <button type="button" class="btn btn-primary">Copiar</button>
          <button type="button" class="btn btn-primary">Imprimir</button>
          <button type="button" class="btn btn-primary">Excel</button>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
  </div>

  {{--
    <div id="alerta" class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
        ×
      </button>
      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
      <p id="alertaMsj">
        Danger alert preview. This alert is dismissable. A wonderful serenity has
        taken possession of my entire soul, like these sweet mornings of spring
        which I enjoy with my whole heart.
      </p>
    </div>
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
    const celldestroy = (elemento) => {
      cell = $(elemento).DataTable();
      cell.destroy();
    };
    //funcion para destruir charts y poder repintar
    const chartdestroy = (elemento) => {
      cell = $(elemento).DataTable();
      cell.destroy();
    };
    $("#imprimir_btn").click(function(){
      window.print();
});
   

    //Date range picker with time picker
    $("#rangoFechaPredet").daterangepicker(
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
            moment().subtract(1, "month").startOf("month"),
            moment().subtract(1, "month").endOf("month"),
          ],
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
            "Diciembre",
          ],
          firstDay: 1,
        },
        linkedCalendars: false,
        minDate: "01/01/2003",
        maxDate: moment(),
      },
      function (start, end, label) {
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
   
    var ctx1 = document.getElementById("voltajeChart").getContext("2d");
    var voltajeChart = new Chart(ctx1, {
      type: "line",
      data: ChartDataclear,
      options: ChartOptionsclear,
    });

    var ctx2 = document.getElementById("corrienteChart").getContext("2d");
    var corrienteChart = new Chart(ctx2, {
      type: "line",
      data: ChartDataclear,
      options: ChartOptionsclear,
    });

    var ctx3 = document.getElementById("efCorrienteChart").getContext("2d");
    var efCorrienteChart = new Chart(ctx3, {
      type: "line",
      data: ChartDataclear,
      options: ChartOptionsclear,
    });

    var ctx4 = document.getElementById("desvResistenciaChart").getContext("2d");
    var desvResistenciaChart = new Chart(ctx4, {
      type: "line",
      data: ChartDataclear,
      options: ChartOptionsclear,
    });
    var ctx5 = document.getElementById("frecuenciaEAChart").getContext("2d");
    var frecuenciaEAChart = new Chart(ctx5, {
      type: "line",
      data: ChartDataclear,
      options: ChartOptionsclear,
    });

    var ctx6 = document.getElementById("potenciaChart").getContext("2d");
    var potenciaChart = new Chart(ctx6, {
      type: "line",
      data: ChartDataclear,
      options: ChartOptionsclear,
    });

    var ctx7 = document.getElementById("nivelDeMetalChart").getContext("2d");
    var nivelDeMetalChart = new Chart(ctx7, {
      type: "line",
      data: ChartDataclear,
      options: ChartOptionsclear,
    });

    var ctx8 = document.getElementById("nivelDeBanoChart").getContext("2d");
    var nivelDeBanoChart = new Chart(ctx8, {
      type: "line",
      data: ChartDataclear,
      options: ChartOptionsclear,
    });
    var ctx9 = document.getElementById("frecuenciaTKChart").getContext("2d");
    var frecuenciaTKChart = new Chart(ctx9, {
      type: "line",
      data: ChartDataclear,
      options: ChartOptionsclear,
    });

    //funcion para mostrar elemento HTML cuando cambia un checkbox
   
    $(document).ready(function () {
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
      });
      $.ajax({
        type: "get",
        url: "{{ route('evolution.dataChart') }}",
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
          response.datosVoltaje.forEach(function (data) {
            if (response.banda1Voltaje != null) {
              Banda1Voltaje.push(response.banda1Voltaje);
            }
            if (response.banda2Voltaje != null) {
              Banda2Voltaje.push(response.banda2Voltaje);
            }
            DiaVoltaje.push(data.dia);
            DatosVoltaje.push(data.voltaje);
          });



          response.datosCorriente.forEach(function (data) {
            if (response.banda1Corriente != null) {
              Banda1Corriente.push(response.banda1Corriente);
            }
            if (response.banda2Corriente != null) {
              Banda2Corriente.push(response.banda2Corriente);
            }
            DiaCorriente.push(data.dia);
            DatosCorriente.push(data.corriente);
          });

          response.datosEfCorriente.forEach(function (data) {
            if (response.banda1EfCorriente != null) {
              Banda1EfCorriente.push(response.banda1EfCorriente);
            }
            if (response.banda2EfCorriente != null) {
              Banda2EfCorriente.push(response.banda2EfCorriente);
            }
            DiaEfCorriente.push(data.dia);
            DatosEfCorriente.push(data.efCorriente);
          });

          response.datosDesvResistencia.forEach(function (data) {
            if (response.banda1DesvResistencia != null) {
              Banda1DesvResistencia.push(response.banda1DesvResistencia);
            }
            if (response.banda2DesvResistencia != null) {
              Banda2DesvResistencia.push(response.banda2DesvResistencia);
            }
            DiaDesvResistencia.push(data.dia);
            DatosDesvResistencia.push(data.desvResistencia);
          });

          response.datosFrecuenciaEA.forEach(function (data) {
            if (response.banda1FrecuenciaEA != null) {
              Banda1FrecuenciaEA.push(response.banda1FrecuenciaEA);
            }
            if (response.banda2FrecuenciaEA != null) {
              Banda2FrecuenciaEA.push(response.banda2FrecuenciaEA);
            }
            DiaFrecuenciaEA.push(data.dia);
            DatosFrecuenciaEA.push(data.frecuenciaEA);
          });

          response.datosPotencia.forEach(function (data) {
            if (response.banda1Potencia != null) {
              Banda1Potencia.push(response.banda1Potencia);
            }
            if (response.banda2Potencia != null) {
              Banda2Potencia.push(response.banda2Potencia);
            }
            DiaPotencia.push(data.dia);
            DatosPotencia.push(data.potencia);
          });

          response.datosNivelDeMetal.forEach(function (data) {
            if (response.banda1NivelDeMetal != null) {
              Banda1NivelDeMetal.push(response.banda1NivelDeMetal);
            }
            if (response.banda2NivelDeMetal != null) {
              Banda2NivelDeMetal.push(response.banda2NivelDeMetal);
            }
            DiaNivelDeMetal.push(data.dia);
            DatosNivelDeMetal.push(data.nivelDeMetal);
          });

          response.datosNivelDeBanio.forEach(function (data) {
            if (response.banda1NivelDeBano != null) {
              Banda1NivelDeBano.push(response.banda1NivelDeBano);
            }
            if (response.banda2NivelDeBano != null) {
              Banda2NivelDeBano.push(response.banda2NivelDeBano);
            }
            DiaNivelDeBano.push(data.dia);
            DatosNivelDeBano.push(data.nivelDeBanio);
          });

          response.datosFrecuenciaTK.forEach(function (data) {
            if (response.banda1FrecuenciaTK != null) {
              Banda1FrecuenciaTK.push(response.banda1FrecuenciaTK);
            }
            if (response.banda2FrecuenciaTK != null) {
              Banda2FrecuenciaTK.push(response.banda2FrecuenciaTK);
            }
            DiaFrecuenciaTK.push(data.dia);
            DatosFrecuenciaTK.push(data.frecuenciaTK);
          });

          response.datosDuracionTK.forEach(function (data) {
            if (response.banda1DuracionTK != null) {
              Banda1DuracionTK.push(response.banda1DuracionTK);
            }
            if (response.banda2DuracionTK != null) {
              Banda2DuracionTK.push(response.banda2DuracionTK);
            }
            DiaDuracionTK.push(data.dia);
            DatosDuracionTK.push(data.duracionTK);
          });

          response.datosGolpesAlumina.forEach(function (data) {
            if (response.banda1GolpesAlumina != null) {
              Banda1GolpesAlumina.push(response.banda1GolpesAlumina);
            }
            if (response.banda2GolpesAlumina != null) {
              Banda2GolpesAlumina.push(response.banda2GolpesAlumina);
            }
            DiaGolpesAlumina.push(data.dia);
            DatosGolpesAlumina.push(data.golpesAlumina);
          });

          response.datosAlimentacionAlumina.forEach(function (data) {
            if (response.banda1AlimentacionAlumina != null) {
              Banda1AlimentacionAlumina.push(response.banda1AlimentacionAlumina);
            }
            if (response.banda2AlimentacionAlumina != null) {
              Banda2AlimentacionAlumina.push(response.banda2AlimentacionAlumina);
            }
            DiaAlimentacionAlumina.push(data.dia);
            DatosAlimentacionAlumina.push(data.alimentacionAlumina);
          });

          response.datosTemperatura.forEach(function (data) {
            if (response.banda1Temperatura != null) {
              Banda1Temperatura.push(response.banda1Temperatura);
            }
            if (response.banda2Temperatura != null) {
              Banda2Temperatura.push(response.banda2Temperatura);
            }
            DiaTemperatura.push(data.dia);
            DatosTemperatura.push(data.temperatura);
          });

          response.datosAcidez.forEach(function (data) {
            if (response.banda1Acidez != null) {
              Banda1Acidez.push(response.banda1Acidez);
            }
            if (response.banda2Acidez != null) {
              Banda2Acidez.push(response.banda2Acidez);
            }
            DiaAcidez.push(data.dia);
            DatosAcidez.push(data.acidez);
          });

          response.datosDesvTemperatura.forEach(function (data) {
            if (response.banda1DesvTemperatura != null) {
              Banda1DesvTemperatura.push(response.banda1DesvTemperatura);
            }
            if (response.banda2DesvTemperatura != null) {
              Banda2DesvTemperatura.push(response.banda2DesvTemperatura);
            }
            DiaDesvTemperatura.push(data.dia);
            DatosDesvTemperatura.push(data.desvTemperatura);
          });

          response.datosDesvAcidez.forEach(function (data) {
            if (response.banda1DesvAcidez != null) {
              Banda1DesvAcidez.push(response.banda1DesvAcidez);
            }
            if (response.banda2DesvAcidez != null) {
              Banda2DesvAcidez.push(response.banda2DesvAcidez);
            }
            DiaDesvAcidez.push(data.dia);
            DatosDesvAcidez.push(data.desvAcidez);
          });

          response.datosConsumoFl.forEach(function (data) {
            if (response.banda1ConsumoFl != null) {
              Banda1ConsumoFl.push(response.banda1ConsumoFl);
            }
            if (response.banda2ConsumoFl != null) {
              Banda2ConsumoFl.push(response.banda2ConsumoFl);
            }
            DiaConsumoFl.push(data.dia);
            DatosConsumoFl.push(data.consumoFl);
          });

          response.datosPorcHierro.forEach(function (data) {
            if (response.banda1PorcHierro != null) {
              Banda1PorcHierro.push(response.banda1PorcHierro);
            }
            if (response.banda2PorcHierro != null) {
              Banda2PorcHierro.push(response.banda2PorcHierro);
            }
            DiaPorcHierro.push(data.dia);
            DatosPorcHierro.push(data.porcHierro);
          });

          response.datosPurezaSilicio.forEach(function (data) {
            if (response.banda1PurezaSilicio != null) {
              Banda1PurezaSilicio.push(response.banda1PurezaSilicio);
            }
            if (response.banda2PurezaSilicio != null) {
              Banda2PurezaSilicio.push(response.banda2PurezaSilicio);
            }
            DiaPurezaSilicio.push(data.dia);
            DatosPurezaSilicio.push(data.purezaSilicio);
          });

          response.datosPorcSilicio.forEach(function (data) {
            if (response.banda1PorcSilicio != null) {
              Banda1PorcSilicio.push(response.banda1PorcSilicio);
            }
            if (response.banda2PorcSilicio != null) {
              Banda2PorcSilicio.push(response.banda2PorcSilicio);
            }
            DiaPorcSilicio.push(data.dia);
            DatosPorcSilicio.push(data.porcSilicio);
          });


          var ChartOptionsVoltaje = {
            responsive: true,
            maintainAspectRatio: true,
            hoverMode: "index",
            stacked: false,
            responsive: true,
            title: {
              display: true,
              text:
                "Voltaje" ,
            },
            tooltips: {
              mode: "nearest",
              intersect: true,
            },
            hover: {
              mode: "nearest",
              intersect: true,
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
                    labelString:"V (voltios)",
                    display: true,
                  },
                  type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                  display: true,
                  position: "left",
                  id: "y-axis-1",
                  ticks: {
                    min: response.minVoltaje,
                    max: response.maxVoltaje,
                  },
                },
              ],

              xAxes: [
                {
                  scaleLabel: {
                    labelString: 'fecha',
                    display: true,
                  },
                  position: "bottom",
                  id: "x-axis-1",
                  ticks: {
                    // maxTicksLimit: 20
                  },
                },
              ],
            },
          };
          var ChartOptionsCorriente = {
            responsive: true,
            maintainAspectRatio: true,
            hoverMode: "index",
            stacked: false,
            responsive: true,
            title: {
              display: true,
              text:
                "Corriente" ,
            },
            tooltips: {
              mode: "nearest",
              intersect: true,
            },
            hover: {
              mode: "nearest",
              intersect: true,
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
                    labelString:"kA",
                    display: true,
                  },
                  type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                  display: true,
                  position: "left",
                  id: "y-axis-1",
                  ticks: {
                    min: response.minCorriente,
                    max: response.maxCorriente,
                  },
                },
              ],

              xAxes: [
                {
                  scaleLabel: {
                    labelString: 'fecha',
                    display: true,
                  },
                  position: "bottom",
                  id: "x-axis-1",
                  ticks: {
                    // maxTicksLimit: 20
                  },
                },
              ],
            },
          };
          var ChartOptionsEfCorriente = {
            responsive: true,
            maintainAspectRatio: true,
            hoverMode: "index",
            stacked: false,
            responsive: true,
            title: {
              display: true,
              text:
                "Eficiencia de Corriente" ,
            },
            tooltips: {
              mode: "nearest",
              intersect: true,
            },
            hover: {
              mode: "nearest",
              intersect: true,
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
                  },
                  type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                  display: true,
                  position: "left",
                  id: "y-axis-1",
                  ticks: {
                    min: response.minEfCorriente,
                    max: response.maxEfCorriente,
                  },
                },
              ],

              xAxes: [
                {
                  scaleLabel: {
                    labelString: 'fecha',
                    display: true,
                  },
                  position: "bottom",
                  id: "x-axis-1",
                  ticks: {
                    // maxTicksLimit: 20
                  },
                },
              ],
            },
          };
          var ChartOptionsDesvResistencia = {
            responsive: true,
            maintainAspectRatio: true,
            hoverMode: "index",
            stacked: false,
            responsive: true,
            title: {
              display: true,
              text:
                "Desviación de ressitencia" ,
            },
            tooltips: {
              mode: "nearest",
              intersect: true,
            },
            hover: {
              mode: "nearest",
              intersect: true,
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
                  },
                  type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                  display: true,
                  position: "left",
                  id: "y-axis-1",
                  ticks: {
                    min: response.minDesvResistencia,
                    max: response.maxDesvResistencia,
                  },
                },
              ],

              xAxes: [
                {
                  scaleLabel: {
                    labelString: 'fecha',
                    display: true,
                  },
                  position: "bottom",
                  id: "x-axis-1",
                  ticks: {
                    // maxTicksLimit: 20
                  },
                },
              ],
            },
          };
         
          var ChartOptionsFrecuenciaEA = {
            responsive: true,
            maintainAspectRatio: true,
            hoverMode: "index",
            stacked: false,
            responsive: true,
            title: {
              display: true,
              text:
                "Frecuencia de efecto anódico" ,
            },
            tooltips: {
              mode: "nearest",
              intersect: true,
            },
            hover: {
              mode: "nearest",
              intersect: true,
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
                    labelString:"EA",
                    display: true,
                  },
                  type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                  display: true,
                  position: "left",
                  id: "y-axis-1",
                  ticks: {
                    min: response.minFrecuenciaEA,
                    max: response.maxFrecuenciaEA,
                  },
                },
              ],

              xAxes: [
                {
                  scaleLabel: {
                    labelString: 'fecha',
                    display: true,
                  },
                  position: "bottom",
                  id: "x-axis-1",
                  ticks: {
                    // maxTicksLimit: 20
                  },
                },
              ],
            },
          };

          var ChartOptionsPotencia = {
            responsive: true,
            maintainAspectRatio: true,
            hoverMode: "index",
            stacked: false,
            responsive: true,
            title: {
              display: true,
              text:
                "Potencia" ,
            },
            tooltips: {
              mode: "nearest",
              intersect: true,
            },
            hover: {
              mode: "nearest",
              intersect: true,
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
                    labelString:"Kw",
                    display: true,
                  },
                  type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                  display: true,
                  position: "left",
                  id: "y-axis-1",
                  ticks: {
                    min: response.minPotencia,
                    max: response.maxPotencia,
                  },
                },
              ],

              xAxes: [
                {
                  scaleLabel: {
                    labelString: 'fecha',
                    display: true,
                  },
                  position: "bottom",
                  id: "x-axis-1",
                  ticks: {
                    // maxTicksLimit: 20
                  },
                },
              ],
            },
          };

          var ChartOptionsNivelDeMetal = {
            responsive: true,
            maintainAspectRatio: true,
            hoverMode: "index",
            stacked: false,
            responsive: true,
            title: {
              display: true,
              text:
                "Nivel de metal" ,
            },
            tooltips: {
              mode: "nearest",
              intersect: true,
            },
            hover: {
              mode: "nearest",
              intersect: true,
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
                    labelString:"cm",
                    display: true,
                  },
                  type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                  display: true,
                  position: "left",
                  id: "y-axis-1",
                  ticks: {
                    min: response.minNivelDeMetal,
                    max: response.maxNivelDeMetal,
                  },
                },
              ],

              xAxes: [
                {
                  scaleLabel: {
                    labelString: 'fecha',
                    display: true,
                  },
                  position: "bottom",
                  id: "x-axis-1",
                  ticks: {
                    // maxTicksLimit: 20
                  },
                },
              ],
            },
          };

          var ChartOptionsNivelDeBano = {
            responsive: true,
            maintainAspectRatio: true,
            hoverMode: "index",
            stacked: false,
            responsive: true,
            title: {
              display: true,
              text:
                "Nivel de bano" ,
            },
            tooltips: {
              mode: "index",
              intersect: true,
            },
            hover: {
              mode: "index",
              intersect: true,
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
                    labelString:"cm",
                    display: true,
                  },
                  type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                  display: true,
                  position: "left",
                  id: "y-axis-1",
                  ticks: {
                    min: response.minNivelDeBano,
                    max: response.maxNivelDeBano,
                  },
                },
              ],

              xAxes: [
                {
                  scaleLabel: {
                    labelString: 'fecha',
                    display: true,
                  },
                  position: "bottom",
                  id: "x-axis-1",
                  ticks: {
                    // maxTicksLimit: 20
                  },
                },
              ],
            },
          };

          var ChartOptionsFrecuenciaTK = {
            responsive: true,
            maintainAspectRatio: true,
            hoverMode: "index",
            stacked: false,
            responsive: true,
            title: {
              display: true,
              text:
                "Frecuencia de Tracking" ,
            },
            tooltips: {
              mode: "nearest",
              intersect: true,
            },
            hover: {
              mode: "nearest",
              intersect: true,
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
                    labelString:"N",
                    display: true,
                  },
                  type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                  display: true,
                  position: "left",
                  id: "y-axis-1",
                  ticks: {
                    min: response.minFrecuenciaTK,
                    max: response.maxFrecuenciaTK,
                  },
                },
              ],

              xAxes: [
                {
                  scaleLabel: {
                    labelString: 'fecha',
                    display: true,
                  },
                  position: "bottom",
                  id: "x-axis-1",
                  ticks: {
                    // maxTicksLimit: 20
                  },
                },
              ],
            },
          };

          console.log(Banda1Voltaje);
          var voltajeChartData = {
            labels: DiaVoltaje,
            datasets: [
              {
                label: "Voltaje",
                data: DatosVoltaje,
                borderWidth: 1,
                backgroundColor: "#83befc",
                borderColor: "#0306ad",
                pointBorderColor: "#0306ad",
                pointBackgroundColor: "#0306ad",
                fill: false,
                lineTension: 0,
              },
              {
                label: "banda1",
                data: Banda1Voltaje,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "#fad9b6",
                borderColor: "red",
                pointBackgroundColor: "red",
                pointBorderColor: "red",
                pointStyle: "line",
                fill: +2,
                lineTension: 0,
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
                lineTension: 0,
              },
            ],
          };

          var corrienteChartData = {
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
                lineTension: 0,
              },
              {
                label: "banda1",
                data: Banda1Corriente,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "#fad9b6",
                borderColor: "red",
                pointBackgroundColor: "red",
                pointBorderColor: "red",
                pointStyle: "line",
                fill: +2,
                lineTension: 0,
              },
              {
                label: "banda2",
                data: Banda2Corriente,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "transparent",
                borderColor: "orange",
                pointBackgroundColor: "orange",
                pointBorderColor: "orange",
                pointStyle: "line",
                fill: false,
                lineTension: 0,
              },
            ],
          };

          var efCorrienteChartData = {
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
                lineTension: 0,
              },
              {
                label: "banda1",
                data: Banda1EfCorriente,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "#fad9b6",
                borderColor: "red",
                pointBackgroundColor: "red",
                pointBorderColor: "red",
                pointStyle: "line",
                fill: +2,
                lineTension: 0,
              },
              {
                label: "banda2",
                data: Banda2EfCorriente,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "transparent",
                borderColor: "orange",
                pointBackgroundColor: "orange",
                pointBorderColor: "orange",
                pointStyle: "line",
                fill: false,
                lineTension: 0,
              },
            ],
          };

          var desvResistenciaChartData = {
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
                lineTension: 0,
              },
              {
                label: "banda1",
                data: Banda1DesvResistencia,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "#fad9b6",
                borderColor: "red",
                pointBackgroundColor: "red",
                pointBorderColor: "red",
                pointStyle: "line",
                fill: +2,
                lineTension: 0,
              },
              {
                label: "banda2",
                data: Banda2DesvResistencia,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "transparent",
                borderColor: "orange",
                pointBackgroundColor: "orange",
                pointBorderColor: "orange",
                pointStyle: "line",
                fill: false,
                lineTension: 0,
              },
            ],
          };

          var frecuenciaEAChartData = {
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
                lineTension: 0,
              },
              {
                label: "banda1",
                data: Banda1FrecuenciaEA,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "#fad9b6",
                borderColor: "red",
                pointBackgroundColor: "red",
                pointBorderColor: "red",
                pointStyle: "line",
                fill: +2,
                lineTension: 0,
              },
              {
                label: "banda2",
                data: Banda2FrecuenciaEA,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "transparent",
                borderColor: "orange",
                pointBackgroundColor: "orange",
                pointBorderColor: "orange",
                pointStyle: "line",
                fill: false,
                lineTension: 0,
              },
            ],
          };

          var potenciaChartData = {
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
                lineTension: 0,
              },
              {
                label: "banda1",
                data: Banda1Potencia,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "#fad9b6",
                borderColor: "red",
                pointBackgroundColor: "red",
                pointBorderColor: "red",
                pointStyle: "line",
                fill: +2,
                lineTension: 0,
              },
              {
                label: "banda2",
                data: Banda2Potencia,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "transparent",
                borderColor: "orange",
                pointBackgroundColor: "orange",
                pointBorderColor: "orange",
                pointStyle: "line",
                fill: false,
                lineTension: 0,
              },
            ],
          };

          var nivelDeMetalChartData = {
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
                lineTension: 0,
              },
              {
                label: "banda1",
                data: Banda1NivelDeMetal,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "#fad9b6",
                borderColor: "red",
                pointBackgroundColor: "red",
                pointBorderColor: "red",
                pointStyle: "line",
                fill: +2,
                lineTension: 0,
              },
              {
                label: "banda2",
                data: Banda2NivelDeMetal,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "transparent",
                borderColor: "orange",
                pointBackgroundColor: "orange",
                pointBorderColor: "orange",
                pointStyle: "line",
                fill: false,
                lineTension: 0,
              },
            ],
          };

          var nivelDeBanoChartData = {
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
                lineTension: 0,
              },
              {
                label: "banda1",
                data: Banda1NivelDeBano,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "#fad9b6",
                borderColor: "red",
                pointBackgroundColor: "red",
                pointBorderColor: "red",
                pointStyle: "line",
                fill: +2,
                lineTension: 0,
              },
              {
                label: "banda2",
                data: Banda2NivelDeBano,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "transparent",
                borderColor: "orange",
                pointBackgroundColor: "orange",
                pointBorderColor: "orange",
                pointStyle: "line",
                fill: false,
                lineTension: 0,
              },
            ],
          };

          var frecuenciaTKChartData = {
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
                lineTension: 0,
              },
              {
                label: "banda1",
                data: Banda1FrecuenciaTK,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "#fad9b6",
                borderColor: "red",
                pointBackgroundColor: "red",
                pointBorderColor: "red",
                pointStyle: "line",
                fill: +2,
                lineTension: 0,
              },
              {
                label: "banda2",
                data: Banda2FrecuenciaTK,
                yAxisID: "y-axis-1",
                borderWidth: 1,
                backgroundColor: "transparent",
                borderColor: "orange",
                pointBackgroundColor: "orange",
                pointBorderColor: "orange",
                pointStyle: "line",
                fill: false,
                lineTension: 0,
              },
            ],
          };
          console.log(response);
          voltajeChart.options = ChartOptionsVoltaje;
          voltajeChart.data = voltajeChartData;
          voltajeChart.update();

          corrienteChart.options = ChartOptionsCorriente;
          corrienteChart.data = corrienteChartData;
          corrienteChart.update();

          efCorrienteChart.options = ChartOptionsEfCorriente;
          efCorrienteChart.data = efCorrienteChartData;
          efCorrienteChart.update();

          desvResistenciaChart.options = ChartOptionsDesvResistencia;
          desvResistenciaChart.data = desvResistenciaChartData;
          desvResistenciaChart.update();

          frecuenciaEAChart.options = ChartOptionsFrecuenciaEA;
          frecuenciaEAChart.data = frecuenciaEAChartData;
          frecuenciaEAChart.update();

          potenciaChart.options = ChartOptionsPotencia;
          potenciaChart.data = potenciaChartData;
          potenciaChart.update();

          nivelDeMetalChart.options = ChartOptionsNivelDeMetal;
          nivelDeMetalChart.data = nivelDeMetalChartData;
          nivelDeMetalChart.update();

          nivelDeBanoChart.options = ChartOptionsNivelDeBano;
          nivelDeBanoChart.data = nivelDeBanoChartData;
          nivelDeBanoChart.update();

          frecuenciaTKChart.options = ChartOptionsFrecuenciaTK;
          frecuenciaTKChart.data = frecuenciaTKChartData;
          frecuenciaTKChart.update();
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
    $(document).ready(function () {
      $("#formPredet").bind("submit", function () {
        $.ajaxSetup({
          headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
          },
        });
        datos = $(this).serialize();
        console.log(datos);
        $.ajax({
          type: "post",
          url: "{{ route('evolution.dataChartPrePost') }}",
          data: $(this).serialize(),
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
            MENSAJE = "Enviando: " + data;
            $("#mensaje").html(MENSAJE);
            $("#alertaMsj").html(MENSAJE);
            $("#modalMensaje").modal("show");
          },
          success: function (response) {
            /*
            * Se ejecuta cuando termina la petición y esta ha sido
            * correcta
            * */

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
            response.datosVoltaje.forEach(function (data) {
              if (response.banda1Voltaje != null) {
                Banda1Voltaje.push(response.banda1Voltaje);
              }
              if (response.banda2Voltaje != null) {
                Banda2Voltaje.push(response.banda2Voltaje);
              }
              DiaVoltaje.push(data.dia);
              DatosVoltaje.push(data.voltaje);
            });

            response.datosCorriente.forEach(function (data) {
              if (response.banda1Corriente != null) {
                Banda1Corriente.push(response.banda1Corriente);
              }
              if (response.banda2Corriente != null) {
                Banda2Corriente.push(response.banda2Corriente);
              }
              DiaCorriente.push(data.dia);
              DatosCorriente.push(data.corriente);
            });

            response.datosEfCorriente.forEach(function (data) {
              if (response.banda1EfCorriente != null) {
                Banda1EfCorriente.push(response.banda1EfCorriente);
              }
              if (response.banda2EfCorriente != null) {
                Banda2EfCorriente.push(response.banda2EfCorriente);
              }
              DiaEfCorriente.push(data.dia);
              DatosEfCorriente.push(data.efCorriente);
            });

            response.datosDesvResistencia.forEach(function (data) {
              if (response.banda1DesvResistencia != null) {
                Banda1DesvResistencia.push(response.banda1DesvResistencia);
              }
              if (response.banda2DesvResistencia != null) {
                Banda2DesvResistencia.push(response.banda2DesvResistencia);
              }
              DiaDesvResistencia.push(data.dia);
              DatosDesvResistencia.push(data.desvResistencia);
            });

            response.datosFrecuenciaEA.forEach(function (data) {
              if (response.banda1FrecuenciaEA != null) {
                Banda1FrecuenciaEA.push(response.banda1FrecuenciaEA);
              }
              if (response.banda2FrecuenciaEA != null) {
                Banda2FrecuenciaEA.push(response.banda2FrecuenciaEA);
              }
              DiaFrecuenciaEA.push(data.dia);
              DatosFrecuenciaEA.push(data.frecuenciaEA);
            });

            response.datosPotencia.forEach(function (data) {
              if (response.banda1Potencia != null) {
                Banda1Potencia.push(response.banda1Potencia);
              }
              if (response.banda2Potencia != null) {
                Banda2Potencia.push(response.banda2Potencia);
              }
              DiaPotencia.push(data.dia);
              DatosPotencia.push(data.potencia);
            });

            response.datosNivelDeMetal.forEach(function (data) {
              if (response.banda1NivelDeMetal != null) {
                Banda1NivelDeMetal.push(response.banda1NivelDeMetal);
              }
              if (response.banda2NivelDeMetal != null) {
                Banda2NivelDeMetal.push(response.banda2NivelDeMetal);
              }
              DiaNivelDeMetal.push(data.dia);
              DatosNivelDeMetal.push(data.nivelDeMetal);
            });

            response.datosNivelDeBanio.forEach(function (data) {
              if (response.banda1NivelDeBano != null) {
                Banda1NivelDeBano.push(response.banda1NivelDeBano);
              }
              if (response.banda2NivelDeBano != null) {
                Banda2NivelDeBano.push(response.banda2NivelDeBano);
              }
              DiaNivelDeBano.push(data.dia);
              DatosNivelDeBano.push(data.nivelDeBanio);
            });

            response.datosFrecuenciaTK.forEach(function (data) {
              if (response.banda1FrecuenciaTK != null) {
                Banda1FrecuenciaTK.push(response.banda1FrecuenciaTK);
              }
              if (response.banda2FrecuenciaTK != null) {
                Banda2FrecuenciaTK.push(response.banda2FrecuenciaTK);
              }
              DiaFrecuenciaTK.push(data.dia);
              DatosFrecuenciaTK.push(data.frecuenciaTK);
            });

            response.datosDuracionTK.forEach(function (data) {
              if (response.banda1DuracionTK != null) {
                Banda1DuracionTK.push(response.banda1DuracionTK);
              }
              if (response.banda2DuracionTK != null) {
                Banda2DuracionTK.push(response.banda2DuracionTK);
              }
              DiaDuracionTK.push(data.dia);
              DatosDuracionTK.push(data.duracionTK);
            });

            response.datosGolpesAlumina.forEach(function (data) {
              if (response.banda1GolpesAlumina != null) {
                Banda1GolpesAlumina.push(response.banda1GolpesAlumina);
              }
              if (response.banda2GolpesAlumina != null) {
                Banda2GolpesAlumina.push(response.banda2GolpesAlumina);
              }
              DiaGolpesAlumina.push(data.dia);
              DatosGolpesAlumina.push(data.golpesAlumina);
            });

            response.datosAlimentacionAlumina.forEach(function (data) {
              if (response.banda1AlimentacionAlumina != null) {
                Banda1AlimentacionAlumina.push(response.banda1AlimentacionAlumina);
              }
              if (response.banda2AlimentacionAlumina != null) {
                Banda2AlimentacionAlumina.push(response.banda2AlimentacionAlumina);
              }
              DiaAlimentacionAlumina.push(data.dia);
              DatosAlimentacionAlumina.push(data.alimentacionAlumina);
            });

            response.datosTemperatura.forEach(function (data) {
              if (response.banda1Temperatura != null) {
                Banda1Temperatura.push(response.banda1Temperatura);
              }
              if (response.banda2Temperatura != null) {
                Banda2Temperatura.push(response.banda2Temperatura);
              }
              DiaTemperatura.push(data.dia);
              DatosTemperatura.push(data.temperatura);
            });

            response.datosAcidez.forEach(function (data) {
              if (response.banda1Acidez != null) {
                Banda1Acidez.push(response.banda1Acidez);
              }
              if (response.banda2Acidez != null) {
                Banda2Acidez.push(response.banda2Acidez);
              }
              DiaAcidez.push(data.dia);
              DatosAcidez.push(data.acidez);
            });

            response.datosDesvTemperatura.forEach(function (data) {
              if (response.banda1DesvTemperatura != null) {
                Banda1DesvTemperatura.push(response.banda1DesvTemperatura);
              }
              if (response.banda2DesvTemperatura != null) {
                Banda2DesvTemperatura.push(response.banda2DesvTemperatura);
              }
              DiaDesvTemperatura.push(data.dia);
              DatosDesvTemperatura.push(data.desvTemperatura);
            });

            response.datosDesvAcidez.forEach(function (data) {
              if (response.banda1DesvAcidez != null) {
                Banda1DesvAcidez.push(response.banda1DesvAcidez);
              }
              if (response.banda2DesvAcidez != null) {
                Banda2DesvAcidez.push(response.banda2DesvAcidez);
              }
              DiaDesvAcidez.push(data.dia);
              DatosDesvAcidez.push(data.desvAcidez);
            });

            response.datosConsumoFl.forEach(function (data) {
              if (response.banda1ConsumoFl != null) {
                Banda1ConsumoFl.push(response.banda1ConsumoFl);
              }
              if (response.banda2ConsumoFl != null) {
                Banda2ConsumoFl.push(response.banda2ConsumoFl);
              }
              DiaConsumoFl.push(data.dia);
              DatosConsumoFl.push(data.consumoFl);
            });

            response.datosPorcHierro.forEach(function (data) {
              if (response.banda1PorcHierro != null) {
                Banda1PorcHierro.push(response.banda1PorcHierro);
              }
              if (response.banda2PorcHierro != null) {
                Banda2PorcHierro.push(response.banda2PorcHierro);
              }
              DiaPorcHierro.push(data.dia);
              DatosPorcHierro.push(data.porcHierro);
            });

            response.datosPurezaSilicio.forEach(function (data) {
              if (response.banda1PurezaSilicio != null) {
                Banda1PurezaSilicio.push(response.banda1PurezaSilicio);
              }
              if (response.banda2PurezaSilicio != null) {
                Banda2PurezaSilicio.push(response.banda2PurezaSilicio);
              }
              DiaPurezaSilicio.push(data.dia);
              DatosPurezaSilicio.push(data.purezaSilicio);
            });

            response.datosPorcSilicio.forEach(function (data) {
              if (response.banda1PorcSilicio != null) {
                Banda1PorcSilicio.push(response.banda1PorcSilicio);
              }
              if (response.banda2PorcSilicio != null) {
                Banda2PorcSilicio.push(response.banda2PorcSilicio);
              }
              DiaPorcSilicio.push(data.dia);
              DatosPorcSilicio.push(data.porcSilicio);
            });

            console.log(response);
            var ChartOptionsVoltaje = {
              responsive: true,
              maintainAspectRatio: true,
              hoverMode: "index",
              stacked: false,
              responsive: true,
              title: {
                display: true,
                text:
                  "Voltaje" ,
              },
              tooltips: {
                mode: "nearest",
                intersect: true,
              },
              hover: {
                mode: "nearest",
                intersect: true,
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
                        labelString:"V (voltios)",
                        display: true,
                      },
                      type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                      display: true,
                      position: "left",
                      id: "y-axis-1",
                      ticks: {
                        min: response.minVoltaje,
                        max: response.maxVoltaje,
                      },
                    },
                  ],

                  xAxes: [
                    {
                      scaleLabel: {
                        labelString: 'fecha',
                        display: true,
                      },
                      position: "bottom",
                      id: "x-axis-1",
                      ticks: {
                        // maxTicksLimit: 20
                      },
                    },
                  ],
                },
            };
            var ChartOptionsCorriente = {
              responsive: true,
              maintainAspectRatio: true,
              hoverMode: "index",
              stacked: false,
              responsive: true,
              title: {
                display: true,
                text:
                  "Corriente" ,
              },
              tooltips: {
                mode: "nearest",
                intersect: true,
              },
              hover: {
                mode: "nearest",
                intersect: true,
              },
              scales: {
                yAxes: [
                  {
                    scaleLabel: {
                      labelString:"kA",
                      display: true,
                    },
                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: "left",
                    id: "y-axis-1",
                    ticks: {
                      min: response.minCorriente,
                      max: response.maxCorriente,
                    },
                  },
                ],

                xAxes: [
                  {
                    scaleLabel: {
                      labelString: 'fecha',
                      display: true,
                    },
                    position: "bottom",
                    id: "x-axis-1",
                    ticks: {
                      // maxTicksLimit: 20
                    },
                  },
                ],
              },
            };
            var ChartOptionsEfCorriente = {
              responsive: true,
              maintainAspectRatio: true,
              hoverMode: "index",
              stacked: false,
              responsive: true,
              title: {
                display: true,
                text:
                  "Eficiencia de Corriente" ,
              },
              tooltips: {
                mode: "nearest",
                intersect: true,
              },
              hover: {
                mode: "nearest",
                intersect: true,
              },
              scales: {
                yAxes: [
                  {
                    scaleLabel: {
                      labelString:"%",
                      display: true,
                    },
                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: "left",
                    id: "y-axis-1",
                    ticks: {
                      min: response.minEfCorriente,
                      max: response.maxEfCorriente,
                    },
                  },
                ],

                xAxes: [
                  {
                    scaleLabel: {
                      labelString: 'fecha',
                      display: true,
                    },
                    position: "bottom",
                    id: "x-axis-1",
                    ticks: {
                      // maxTicksLimit: 20
                    },
                  },
                ],
              },
            };
            var ChartOptionsDesvResistencia = {
              responsive: true,
              maintainAspectRatio: true,
              hoverMode: "index",
              stacked: false,
              responsive: true,
              title: {
                display: true,
                text:
                  "Desviación de ressitencia" ,
              },
              tooltips: {
                mode: "nearest",
                intersect: true,
              },
              hover: {
                mode: "nearest",
                intersect: true,
              },
              scales: {
                yAxes: [
                  {
                    scaleLabel: {
                      labelString:"%",
                      display: true,
                    },
                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: "left",
                    id: "y-axis-1",
                    ticks: {
                      min: response.minDesvResistencia,
                      max: response.maxDesvResistencia,
                    },
                  },
                ],

                xAxes: [
                  {
                    scaleLabel: {
                      labelString: 'fecha',
                      display: true,
                    },
                    position: "bottom",
                    id: "x-axis-1",
                    ticks: {
                      // maxTicksLimit: 20
                    },
                  },
                ],
              },
            };
          
            var ChartOptionsFrecuenciaEA = {
              responsive: true,
              maintainAspectRatio: true,
              hoverMode: "index",
              stacked: false,
              responsive: true,
              title: {
                display: true,
                text:
                  "Frecuencia de efecto anódico" ,
              },
              tooltips: {
                mode: "nearest",
                intersect: true,
              },
              hover: {
                mode: "nearest",
                intersect: true,
              },
              scales: {
                yAxes: [
                  {
                    scaleLabel: {
                      labelString:"EA",
                      display: true,
                    },
                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: "left",
                    id: "y-axis-1",
                    ticks: {
                      min: response.minFrecuenciaEA,
                      max: response.maxFrecuenciaEA,
                    },
                  },
                ],

                xAxes: [
                  {
                    scaleLabel: {
                      labelString: 'fecha',
                      display: true,
                    },
                    position: "bottom",
                    id: "x-axis-1",
                    ticks: {
                      // maxTicksLimit: 20
                    },
                  },
                ],
              },
            };

            var ChartOptionsPotencia = {
              responsive: true,
              maintainAspectRatio: true,
              hoverMode: "index",
              stacked: false,
              responsive: true,
              title: {
                display: true,
                text:
                  "Potencia" ,
              },
              tooltips: {
                mode: "nearest",
                intersect: true,
              },
              hover: {
                mode: "nearest",
                intersect: true,
              },
              scales: {
                yAxes: [
                  {
                    scaleLabel: {
                      labelString:"Kw",
                      display: true,
                    },
                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: "left",
                    id: "y-axis-1",
                    ticks: {
                      min: response.minPotencia,
                      max: response.maxPotencia,
                    },
                  },
                ],

                xAxes: [
                  {
                    scaleLabel: {
                      labelString: 'fecha',
                      display: true,
                    },
                    position: "bottom",
                    id: "x-axis-1",
                    ticks: {
                      // maxTicksLimit: 20
                    },
                  },
                ],
              },
            };

            var ChartOptionsNivelDeMetal = {
              responsive: true,
              maintainAspectRatio: true,
              hoverMode: "index",
              stacked: false,
              responsive: true,
              title: {
                display: true,
                text:
                  "Nivel de metal" ,
              },
              tooltips: {
                mode: "nearest",
                intersect: true,
              },
              hover: {
                mode: "nearest",
                intersect: true,
              },
              scales: {
                yAxes: [
                  {
                    scaleLabel: {
                      labelString:"cm",
                      display: true,
                    },
                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: "left",
                    id: "y-axis-1",
                    ticks: {
                      min: response.minNivelDeMetal,
                      max: response.maxNivelDeMetal,
                    },
                  },
                ],

                xAxes: [
                  {
                    scaleLabel: {
                      labelString: 'fecha',
                      display: true,
                    },
                    position: "bottom",
                    id: "x-axis-1",
                    ticks: {
                      // maxTicksLimit: 20
                    },
                  },
                ],
              },
            };

            var ChartOptionsNivelDeBano = {
              responsive: true,
              maintainAspectRatio: true,
              hoverMode: "index",
              stacked: false,
              responsive: true,
              title: {
                display: true,
                text:
                  "Nivel de bano" ,
              },
              tooltips: {
                mode: "index",
                intersect: true,
              },
              hover: {
                mode: "index",
                intersect: true,
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
                      labelString:"cm",
                      display: true,
                    },
                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: "left",
                    id: "y-axis-1",
                    ticks: {
                      min: response.minNivelDeBano,
                      max: response.maxNivelDeBano,
                    },
                  },
                ],

                xAxes: [
                  {
                    scaleLabel: {
                      labelString: 'fecha',
                      display: true,
                    },
                    position: "bottom",
                    id: "x-axis-1",
                    ticks: {
                      // maxTicksLimit: 20
                    },
                  },
                ],
              },
            };

            var ChartOptionsFrecuenciaTK = {
              responsive: true,
              maintainAspectRatio: true,
              hoverMode: "index",
              stacked: false,
              responsive: true,
              title: {
                display: true,
                text:
                  "Frecuencia de Tracking" ,
              },
              tooltips: {
                mode: "nearest",
                intersect: true,
              },
              hover: {
                mode: "nearest",
                intersect: true,
              },
              scales: {
                yAxes: [
                  {
                    scaleLabel: {
                      labelString:"N",
                      display: true,
                    },
                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: "left",
                    id: "y-axis-1",
                    ticks: {
                      min: response.minFrecuenciaTK,
                      max: response.maxFrecuenciaTK,
                    },
                  },
                ],

                xAxes: [
                  {
                    scaleLabel: {
                      labelString: 'fecha',
                      display: true,
                    },
                    position: "bottom",
                    id: "x-axis-1",
                    ticks: {
                      // maxTicksLimit: 20
                    },
                  },
                ],
              },
            };

            console.log(Banda1Voltaje);
            var voltajeChartData = {
              labels: DiaVoltaje,
              datasets: [
                {
                  label: "Voltaje",
                  data: DatosVoltaje,
                  borderWidth: 1,
                  backgroundColor: "#83befc",
                  borderColor: "#0306ad",
                  pointBorderColor: "#0306ad",
                  pointBackgroundColor: "#0306ad",
                  fill: false,
                  lineTension: 0,
                },
                {
                  label: "banda1",
                  data: Banda1Voltaje,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "#b7babd",
                  borderColor: "red",
                  pointBackgroundColor: "red",
                  pointBorderColor: "red",
                  pointStyle: "line",
                  fill: +2,
                  lineTension: 0,
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
                  lineTension: 0,
                },
              ],
            };

            var corrienteChartData = {
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
                  lineTension: 0,
                },
                {
                  label: "banda1",
                  data: Banda1Corriente,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "red",
                  pointBackgroundColor: "red",
                  pointBorderColor: "red",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
                {
                  label: "banda2",
                  data: Banda2Corriente,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "orange",
                  pointBackgroundColor: "orange",
                  pointBorderColor: "orange",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
              ],
            };

            var efCorrienteChartData = {
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
                  lineTension: 0,
                },
                {
                  label: "banda1",
                  data: Banda1EfCorriente,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "red",
                  pointBackgroundColor: "red",
                  pointBorderColor: "red",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
                {
                  label: "banda2",
                  data: Banda2EfCorriente,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "orange",
                  pointBackgroundColor: "orange",
                  pointBorderColor: "orange",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
              ],
            };

            var desvResistenciaChartData = {
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
                  lineTension: 0,
                },
                {
                  label: "banda1",
                  data: Banda1DesvResistencia,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "red",
                  pointBackgroundColor: "red",
                  pointBorderColor: "red",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
                {
                  label: "banda2",
                  data: Banda2DesvResistencia,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "orange",
                  pointBackgroundColor: "orange",
                  pointBorderColor: "orange",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
              ],
            };

            var frecuenciaEAChartData = {
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
                  lineTension: 0,
                },
                {
                  label: "banda1",
                  data: Banda1FrecuenciaEA,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "red",
                  pointBackgroundColor: "red",
                  pointBorderColor: "red",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
                {
                  label: "banda2",
                  data: Banda2FrecuenciaEA,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "orange",
                  pointBackgroundColor: "orange",
                  pointBorderColor: "orange",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
              ],
            };

            var potenciaChartData = {
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
                  lineTension: 0,
                },
                {
                  label: "banda1",
                  data: Banda1Potencia,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "red",
                  pointBackgroundColor: "red",
                  pointBorderColor: "red",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
                {
                  label: "banda2",
                  data: Banda2Potencia,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "orange",
                  pointBackgroundColor: "orange",
                  pointBorderColor: "orange",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
              ],
            };

            var nivelDeMetalChartData = {
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
                  lineTension: 0,
                },
                {
                  label: "banda1",
                  data: Banda1NivelDeMetal,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "red",
                  pointBackgroundColor: "red",
                  pointBorderColor: "red",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
                {
                  label: "banda2",
                  data: Banda2NivelDeMetal,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "orange",
                  pointBackgroundColor: "orange",
                  pointBorderColor: "orange",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
              ],
            };

            var nivelDeBanoChartData = {
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
                  lineTension: 0,
                },
                {
                  label: "banda1",
                  data: Banda1NivelDeBano,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "#fad9b6",
                  borderColor: "red",
                  pointBackgroundColor: "red",
                  pointBorderColor: "red",
                  pointStyle: "line",
                  fill: +2,
                  lineTension: 0,
                },
                {
                  label: "banda2",
                  data: Banda2NivelDeBano,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "orange",
                  pointBackgroundColor: "orange",
                  pointBorderColor: "orange",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
              ],
            };

            var frecuenciaTKChartData = {
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
                  lineTension: 0,
                },
                {
                  label: "banda1",
                  data: Banda1FrecuenciaTK,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "red",
                  pointBackgroundColor: "red",
                  pointBorderColor: "red",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
                {
                  label: "banda2",
                  data: Banda2FrecuenciaTK,
                  yAxisID: "y-axis-1",
                  borderWidth: 1,
                  backgroundColor: "transparent",
                  borderColor: "orange",
                  pointBackgroundColor: "orange",
                  pointBorderColor: "orange",
                  pointStyle: "line",
                  fill: false,
                  lineTension: 0,
                },
              ],
            };
            console.log(response);
            voltajeChart.options = ChartOptionsVoltaje;
            voltajeChart.data = voltajeChartData;
            voltajeChart.update();

            corrienteChart.options = ChartOptionsCorriente;
            corrienteChart.data = corrienteChartData;
            corrienteChart.update();

            efCorrienteChart.options = ChartOptionsEfCorriente;
            efCorrienteChart.data = efCorrienteChartData;
            efCorrienteChart.update();

            desvResistenciaChart.options = ChartOptionsDesvResistencia;
            desvResistenciaChart.data = desvResistenciaChartData;
            desvResistenciaChart.update();

            frecuenciaEAChart.options = ChartOptionsFrecuenciaEA;
            frecuenciaEAChart.data = frecuenciaEAChartData;
            frecuenciaEAChart.update();

            potenciaChart.options = ChartOptionsPotencia;
            potenciaChart.data = potenciaChartData;
            potenciaChart.update();

            nivelDeMetalChart.options = ChartOptionsNivelDeMetal;
            nivelDeMetalChart.data = nivelDeMetalChartData;
            nivelDeMetalChart.update();

            nivelDeBanoChart.options = ChartOptionsNivelDeBano;
            nivelDeBanoChart.data = nivelDeBanoChartData;
            nivelDeBanoChart.update();

            frecuenciaTKChart.options = ChartOptionsFrecuenciaTK;
            frecuenciaTKChart.data = frecuenciaTKChartData;
            frecuenciaTKChart.update();
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
        // Nos permite cancelar el envio del formulario
        return false;
      });
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