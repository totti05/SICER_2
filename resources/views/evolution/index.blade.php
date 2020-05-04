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
    <form id="formData">
      <div class="form-row">
      <div class ="col-md-3 mr-1">
      <div class="form-group">
        <label>Rango de fecha y hora</label>
        <div class="input-group ">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-clock"></i></span>
          </div>
          <input type="text" name="rangoFecha" class="form-control float-right " id="rangoFecha">
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->
   
      <div class="form-group">
          <label >Rango de celdas</label>
          <div class="form-row form-inline">
              <div class="input-group col-md-6">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-th"></i></span>
                </div>
                  <input type="number"
                    class="form-control" name="celda1" min="901" max="1090" id="celda1" aria-describedby="helpId" placeholder="">
              </div>
              <!--  / input group -->
              <span class=""> - </span>
              <div class="input-group col-md-5 ">
                  <input type="number"
                    class="form-control" name="celda2" min="901" max="1090" id="celda2" aria-describedby="helpId" placeholder="">
              </div>
              <!--  / input group -->
              
              
          </div>
          <small id="helpId" class="form-text text-muted">Celdas 901-1090</small>
          <!-- /.form row -->
          <div class="custom-control custom-checkbox ">
            <input type="checkbox" name="checkLinea" class="custom-control-input" id="checkLinea">
            <label class="custom-control-label" for="checkLinea">Linea V</label>
          </div>
      </div>
      <!-- /.form group -->
      </div>

      <div class ="col-md-4 mr-2">
      <div id= "formvariable" class="form-group ">
        <label for="variable">Variable 1</label>
        <select id="variable" name="variable" class="form-control">
        <option selected>Voltaje</option>
          <option>Efectos anodicos</option>
          <option>Alimentacion de alumina</option>
          <option>Temperatura de baño</option>
          <option>Duracion del tracking</option>
          <option>Acidez de baño</option>
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
          <label >Rango de operacion</label>
          <br>
          <label>Rango 1 a consultar</label>
          <div class="form-row form-inline">
              <div class="input-group col-md-6 ">
                <div class="input-group-prepend   ">
                  <span class="input-group-text">operador</span>
                </div>
                <select class="custom-select  "  id="operador1" name="operador1">
                <option selected value=""></option>
                  <option value="mayor">></option>
                  <option value="menor"><</option>
                  <option value="menorigual">&le;</option>
                  <option value="mayorigual">&ge;</option>
                </select>
              </div> 
              <!--  / input group -->
              <div class="input-group col-md-6">
                <div class="input-group-prepend  ">
                  <span class="input-group-text ">rango 1</span>
                </div>
                <input type="number" step="0.01" name="rango1" class="form-control float-right " id="rango1">
              </div>
              <!--  / input group -->
            </div>  
            <!-- /.form row -->  
              
            <label>Rango 2 a consultar</label>
            <div class="form-row form-inline">
              <div class="input-group col-md-6 offset-6">
                <div class="input-group-prepend  ">
                  <span class="input-group-text ">rango 2</span>
                </div>
                <input type="number" step="0.01" name="rango2" class="form-control float-right " id="rango2">
              </div>
              <!--  / input group -->
            </div>  
            <!-- /.form row --> 
      </div>
      <!-- /.form group -->
      </div>
      



      <div class ="col-md-4 mr-2">
      <div id= "formvariable2" class="form-group ">
        <label for="variable2">Variable 2</label>
        <select id="variable2" name="variable2" class="form-control">
        <option selected>Voltaje</option>
          <option>Efectos anodicos</option>
          <option>Alimentacion de alumina</option>
          <option>Temperatura de baño</option>
          <option>Duracion del tracking</option>
          <option>Acidez de baño</option>
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
          <label >Rango de operacion</label>
          <br>
          <label>Rango 1 a consultar</label>
          <div class="form-row form-inline">
              <div class="input-group col-md-6 ">
                <div class="input-group-prepend   ">
                  <span class="input-group-text">operador</span>
                </div>
                <select class="custom-select  "  id="var2Operador" name="var2Operador">
                <option selected value=""></option>
                  <option value="mayor">></option>
                  <option value="menor"><</option>
                  <option value="menorigual">&le;</option>
                  <option value="mayorigual">&ge;</option>
                </select>
              </div> 
              <!--  / input group -->
              <div class="input-group col-md-6">
                <div class="input-group-prepend  ">
                  <span class="input-group-text ">rango 1</span>
                </div>
                <input type="number" step="0.01" name="var2Rango1" class="form-control float-right " id="var2Rango1">
              </div>
              <!--  / input group -->
            </div>  
            <!-- /.form row -->  
              
            <label>Rango 2 a consultar</label>
            <div class="form-row form-inline">
              <div class="input-group col-md-6 offset-6">
                <div class="input-group-prepend  ">
                  <span class="input-group-text ">rango 2</span>
                </div>
                <input type="number" step="0.01" name="var2Rango2" class="form-control float-right " id="var2Rango2">
              </div>
              <!--  / input group -->
            </div>  
            <!-- /.form row --> 
            <div class="custom-control custom-checkbox ">
            <input type="checkbox" name="checkConfig" class="custom-control-input" id="checkConfig">
            <label class="custom-control-label" for="checkConfig">Configurar grafica</label>
          </div>
      </div>
      <!-- /.form group -->
      </div>



      <div class ="col-md-3 " id="configGrafica" style= 'display:none'>
      <label >Configuración de grafica</label>
      <div class="form-group">
        <div class="form-row ">
            
            <label>Banda de control 1</label>
            <div class="input-group  ">
              <div class="input-group-prepend">
              <span class="input-group-text">Min (banda 1)</span>
              </div>
              <input type="number" step="0.01" name="banda1" class="form-control float-right col-md-3 " id="banda1">
            </div>
            <!-- /.input group -->
          
            <label>Banda de control 2</label>
            <div class="input-group ">
             
              <div class="input-group-prepend">
              <span class="input-group-text">Max (banda 2)</span>
              </div>
              <input type="number" step="0.01" name="banda2" class="form-control float-right col-md-3" id="banda2">
            </div>
            <!-- /.input group -->
       </div>
       <!-- /.form row -->
      </div>
      <!-- /.form group -->

      <div class="form-group">
        <div class="form-row ">
            
            <label>Minimo de la escala</label>
            <div class="input-group ">
              <div class="input-group-prepend">
              <span class="input-group-text">Min (escala de grafico)</span>
              </div>
              <input type="number" name="EscalaMin" class="form-control float-right col-md-3 " id="EscalaMin">
            </div>
            <!-- /.input group -->
          
            <label>Maximo de la escala</label>
            <div class="input-group">
             
              <div class="input-group-prepend">
              <span class="input-group-text">Max (escala de grafico)</span>
              </div>
              <input type="number" name="EscalaMax" class="form-control float-right col-md-3" id="EscalaMax">
            </div>
            <!-- /.input group -->
       </div>
       <!-- /.form row -->
      </div>
      <!-- /.form group -->   
      </div> 
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>

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

<!-- Card para las graficas-->
<!-- Aqui se deberia utilizar un ciclo para mostrar las distintas graficas con menos codigo-->
<!-- LINE CHART -->
<div class="card card-info" style= 'display:none' id="lineVChart">
  <div class="card-header">
      <h3 class="card-title">Line V Chart</h3>

      <div class="card-tools">
        <button type="button" id="chartwidget" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <canvas id="lineChart" style="display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
<!-- /.card -->

<!-- Card para las graficas-->
<!-- voltaje LINE CHART -->
<div class="card card-info" id='cardGrafica' style= 'display:none'>
  <div class="card-header">
      <h3 class="card-title">Voltaje PRE Chart</h3>

      <div class="card-tools">
        <button type="button" id="voltajeChartwidget" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <canvas id="voltajeChart" style="display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
<!-- /.card -->


<!-- Card para la tabla de los datos de la grafica -->
<div class="card card-info" id="cardTablaDatos" style= 'display:none'>
    <div class="card-header">
        <h3 class="card-title">Tabla de datos de la grafica</h3>
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
                <th id="thVariable"></th>
              </tr>
            </thead>
            <tbody>
            
            </tbody>
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
    function mostrar(elemento){
    $(elemento).show();
    }
    //funcion para ocultar elemento HTML
    function ocultar(elemento){
    $(elemento).hide();
    }
    //funcion para destruir datatable y poder repintar
    const celldestroy = () => {
      cell = $('#celdas').DataTable();
      cell.destroy();
    }
     //Date range picker with time picker
     $('#rangoFecha').daterangepicker({
        "showWeekNumbers": true,
        "minYear": 2003,
        ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
            'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
            'Este mes': [moment().startOf('month'), moment().endOf('month')],
            'Último mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
        "locale": {
              "format": "YYYY/MM/DD",
              "separator": " - ",
              "applyLabel": "Seleccionar",
              "cancelLabel": "Cancelar",
              "fromLabel": "Desde",
              "toLabel": "Hasta",
              "customRangeLabel": "Elegir",
              "weekLabel": "Sem",
              "daysOfWeek": [
                  "Do",
                  "Lu",
                  "Ma",
                  "Mi",
                  "Ju",
                  "Vi",
                  "Sa"
              ],
              "monthNames": [
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
              "firstDay": 1
            },
              "linkedCalendars": false,
              "minDate": "01/01/2003",
              "maxDate": moment()
        }, function(start, end, label) {
          console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
      });
    
    $('#chartwidget').CardWidget('collapse'); 
    $('#voltajeChartwidget').CardWidget('collapse'); 
    $('#celdaswidget').CardWidget('collapse'); 

    $(document).ready(function(){
      $('#formdata').submit(function(event){

        event.preventDefault();
        formdatos = $(this).serializeArray();
        console.log( $( this ).serializeArray() );
        
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

    //funcion para mostrar elemento HTML cuando cambia un checkbox
    $('#checkConfig').change(function() {
      let estado = $('#checkConfig').is(":checked");
      if (estado) {
        mostrar('#configGrafica');
      }else{
        ocultar('#configGrafica');
      }
  });
  //funcion para cambiar valor de inputs cuando cambia un checkbox
  $('#checkLinea').change(function() {
      let estado = $('#checkLinea').is(":checked");
      if (estado) {
        $('#celda1').val(901);
        $('#celda2').val(1090);
      }else{
        $('#celda1').val('');
        $('#celda2').val('');
      }
  });


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
                          pointBorderColor    : '#f2ff03',
                          pointBackgroundColor: '#00ff15',
                          fill                : false,
                          lineTension         : 0
                      },
                      {
                          label: 'Volta',
                          data: [5.5,3.4,4.4],
                          borderWidth: 1,
                          backgroundColor     : 'transparent',
                          borderColor         : '#00ff15',
                          pointBorderColor    : '#00ff15',
                          pointBackgroundColor: '#00ff15',
                          fill                : false,
                          lineTension         : 0
                      }],
                      
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

        //FUNCION QUE SE ESTA UTILIZANDO PARA GRAFICAR

    $(document).ready(function () {
      $("#formData").bind("submit",function(){
        $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
        });
        datos = $(this).serialize();
        console.log(datos);
        $.ajax({
            type:"post",
            url: "{{ route('evolution.dataChartp') }}",
            data:$(this).serialize(),
            beforeSend: function(){
                /*
                * Esta función se ejecuta durante el envió de la petición al
                * servidor.
                * */
                celldestroy();
            },
            complete:function(data){
                /*
                * Se ejecuta al termino de la petición
                * */
            },
            success: function(response){
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

                    response.datos.forEach(function(data){
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
                      
                      case "Alimentacion de Alumina":
                        Datos.push(data.voltaje);
                        //$variableDB = 'voltaje';//falta ubicarlo en BD
                      break;
                      
                      case "Temperatura de baño":
                      Datos.push(data.temperatura);
                      break;
                      
                      case "Duracion de Tracking":
                        Datos.push(data.duracionTk);
                      break;
                      
                      case "Acidez de Baño":
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
                  /* var areaChartData = {
                      labels  : Dia,
                      datasets: [
                        {
                          label               : [],
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
                  } */
                  console.log(etiqueta);
                  console.log(Dia);
                  console.log(Celdas);
                  console.log(Datos);
                  console.log(banda1);
                  console.log(banda2);


                mostrar('#cardGrafica'); 
                mostrar('#cardTablaDatos');
                var ctx = document.getElementById("voltajeChart").getContext('2d');
                var voltajeChart = new Chart(ctx, {
                  type: 'line',
                      data: {
                      labels:Dia,
                      datasets: [{
                          label: response.variable ,
                          data: Datos,
                          yAxisID : 'y-axis-1',
                          borderWidth: 1,
                          backgroundColor     : 'transparent',
                          borderColor         : '#007bff',
                          pointBorderColor    : '#007bff',
                          pointBackgroundColor: '#007bff',
                          fill                : false,
                          lineTension         : 0
                      },
                      {
                          label: 'celdas',
                          data: Celdas,
                          yAxisID : 'y-axis-2',
                          showLine: false,
                          borderWidth: 1,
                          backgroundColor     : 'transparent',
                          borderColor         : 'green',
                          pointStyle: 'line',
                          fill                : false,
                          lineTension         : 0
                      },
                      {
                          label: 'banda1',
                          data: banda1,
                          yAxisID : 'y-axis-1',
                          borderWidth: 1,
                          backgroundColor     : 'transparent',
                          borderColor         : 'red',
                          pointStyle: 'line',
                          fill                : false,
                          lineTension         : 0
                      },
                      {
                          label: 'banda2',
                          data: banda2,
                          yAxisID : 'y-axis-1',
                          borderWidth: 1,
                          backgroundColor     : 'transparent',
                          borderColor         : 'yellow',
                          pointStyle: 'line',
                          fill                : false,
                          lineTension         : 0
                      }
                      ]
                  },
                  options: {
                    tooltips: { 
                      mode: 'index' 
                      },
                    scales: {
                          yAxes: [{
                            scaleLabel: {
                              labelString : response.ylabel,
                              display: true}, 
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'left',
                            id: 'y-axis-1',
                            ticks: {
                              
                              min: response.miny,
                              max: response.maxy

                            }
                          }, {
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: false,
                            position: 'right',
                            id: 'y-axis-2',
                            ticks: {
                                beginAtZero:false
                                }
                            }],

                            xAxes: [{
                            scaleLabel: {
                              labelString : response.xlabel,
                              display: true},
                            ticks: {
                             // maxTicksLimit: 20
                            }
                          }]

                        }
                      }
                   
                });
                $('#voltajeChart').CardWidget('expand');
                $('#thVariable').text(response.variable);
                $('#celdaswidget').CardWidget('expand');
                $('#celdas').DataTable( 
              { 
                'data': response.datatable.original.data,
                "processing": true,
                "pagination": false, 
                "columns": [
                  {data: 'celda'},
                  {data: 'dia'},
                  {data: response.varKey },
                          ],
              "dom": '<"top"fl>rt<"bottom"Bip><"clear">',
              "buttons": [
                { extend: 'copy', text: 'copy', className: 'btn btn-primary' },
                { extend: 'csv', text: 'csv', className: 'btn btn-primary' } ,
                { extend: 'excel', text: 'excel', className: 'btn btn-primary', } , 
                { extend: 'pdf', text: 'pdf', className: 'btn btn-primary' } , 
                { extend: 'print', text: 'print', className: 'btn btn-primary' },  
                ]
                });
              },
            error: function(data){
                /*
                * Se ejecuta si la peticón ha sido erronea
                * */
                alert("Problemas al tratar de enviar el formulario");
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
