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
          <h5 class="modal-title" id="title">Alerta de SICER</h5>
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
          <p id="mensaje">MODULO EN DESARROLLO</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1" role="dialog" id="modalAyuda">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-gradient-info">
          <h5 class="modal-title" id="title">Ayuda de SICER</h5>
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
        <div class="container">
          <p id="mensaje" class="text-justify" > 
          <div class="row">
          <h2>Esta es la sección de consulta de variables de evolución de línea del SICER. </h2>
            En este apartado podrá realizar consultas parametrizadas de las variables en las líneas de producción donde se lleva a cabo el proceso de reducción. <br>
            A continuación se proporciona una lista de operaciones que puede realizar:  
          </div>
          
          <div class="row border border-info m-2">
            <div class="col-md-6 mt-2">
              <ul>
                  <li>Visualizar gráficas de cada variable </li>
                  <li>Consulta de variable por línea, celda o grupo de celdas</li>
                  <li>Consultar promedio de variables </li>
                  <li>Consultar desviación estándar de variables </li>
                  <li>Consultar total de variables (suma) </li>
                  <li>Consultar un máximo de dos variables en el mismo gráfico</li>
                  <li>Consultar información de celdas o línea de acuerdo a un rango de operación de las variables</li>
                </ul>
            </div>
            <div class="col-md-6 mb-2 mt-2">
              <ul>
                <li>Filtrar consulta de variables por un rango de operación</li>
                <li>Configurar escala de la gráfica a visualizar</li>
                <li>Configurar ubicación de las bandas de control de las variables</li>
                <li>Información individual de celda</li>
                <li>Agrupar información por rango de fecha</li>
                <li>Agrupar información por rango de celdas</li>
                <li>Exportar datos de las gráficas o consultas realizadas</li>
                <li>Obtener histórico de los datos</li>
              </ul>  
            </div>
          
          </div>
            
            En el formulario encontrará los siguientes campos a rellenar con los que puede parametrizar su consulta. <br>  
          </p>
          <div class="row">
            <div class="col">
            <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Campo</th>
                <th scope="col">Descripción</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Rango fecha</th>
                <td>Puede seleccionar en el menú desplegable un rango de fecha o en la opción elegir seleccionar dos puntos a través de los calendarios.</td>
              </tr>
              <tr>
                <th scope="row">Rango de celdas</th>
                <td>Debe ingresar el número de celda en ambos campos, puede seleccionar el grupo de celdas que desee consultar o consultar una colocando el mismo número de celda en ambos campos.</td>
              </tr>
              <tr>
                <th scope="row">Línea V</th>
                <td>Puede marcar esta casilla y automáticamente se rellenaran los campos de rango de celdas con la línea que usted ha marcado.</td>
              </tr>
              <tr>
                <th scope="row"> Opción para filtrar</th>
                <td>Esta opción es utilizada cuando desea filtrar a través del valor de una variable, por ejemplo consultar: "celdas con edad mayor a X cantidad de días". </td>
              </tr>
              <tr>
                <th scope="row">Opción para filtrar - Rango de operación</th>
                <td>Estos son campos con los que indica el valor de la variable con la que va a filtrar su consulta: <br> 
                    <strong>Operador:</strong> acá selecciona el operador relacional "mayor", "mayor igual", "menor, "menor igual". <br>
                    <strong>Límite inferior:</strong> seleccione el límite inferior para el valor de la variable. <br>
                    <strong>Límite superior:</strong> seleccione el límite superior para el valor de la variable. <br>
                    <ul>
                      <li>En caso de querer consultar variables que esten dentro de un rango, no debe seleccionar operador y debe rellenar los campos límite inferior y límite superior. </li>
                      <li>En caso de querer consultar variables "mayor", "mayor igual", "menor, "menor igual" a un valor, debe seleccionar el operador y el valor se debe colocar en el campo límite inferior, el campo límite superior no debe tener contenido.</li>
                    </ul>
                    
                </td>
              </tr>
              <tr>
                <th scope="row">Cálculo a consultar para rango de celdas</th>
                <td>Para poder realizar una consulta debe seleccionar el cálculo que desea aplicar sobre las variables. Las opciones son: promedio, desviación estándar y total(suma) esto aplica para rangos de celdas o consulta de línea.</td>
              </tr>
              <tr>
                <th scope="row">Variable Y1 y Variable Y2</th>
                <td> Estas son las variables que puede consultar en esta sección, podrá visualizar el gráfico y debajo los datos del mismo en una tabla, 
                     puede seleccionar la casilla "variable Y2" para activar las opciones de la segunda variable. <br> <strong> NOTA: </strong> Si desea consultar una sola variable es recomendable desactivar la casilla "variable Y2".</td>
              </tr>
              <tr>
              <th scope="row">Variable Y1 - Rango de operación</th>
                <td>Estos son campos con los que indica el valor de la variable Y1: <br> 
                    <strong>Operador:</strong> acá selecciona el operador relacional "mayor", "mayor igual", "menor, "menor igual".<br>
                    <strong>Límite inferior:</strong> seleccione el límite inferior para el valor de la variable. <br>
                    <strong>Límite superior:</strong> seleccione el límite superior para el valor de la variable. <br>
                    <ul>
                      <li>En caso de querer consultar variables que esten dentro de un rango, no debe seleccionar operador y debe rellenar los campos límite inferior y límite superior. </li>
                      <li>En caso de querer consultar variables "mayor", "mayor igual", "menor, "menor igual" a un valor, debe seleccionar el operador y el valor se debe colocar en el campo límite inferior, el campo límite superior no debe tener contenido.</li>
                    </ul>
                    
                </td>
              <tr>
              <th scope="row">Variable Y2 - Rango de operación</th>
                <td>Estos son campos con los que indica el valor de la variable Y2: <br> 
                    <strong>Operador:</strong> acá selecciona el operador relacional "mayor", "mayor igual", "menor, "menor igual" <br>
                    <strong>Límite inferior:</strong> seleccione el límite inferior para el valor de la variable. <br>
                    <strong>Límite superior:</strong> seleccione el límite superior para el valor de la variable. <br>
                    <ul>
                      <li>En caso de querer consultar variables que esten dentro de un rango, no debe seleccionar operador y debe rellenar los campos límite inferior y límite superior. </li>
                      <li>En caso de querer consultar variables "mayor", "mayor igual", "menor, "menor igual" a un valor, este valor se coloca en el campo límite inferior. </li>
                    </ul>
                    
                </td>
              <tr>
                <th scope="row">Configurar gráfica</th>
                <td>Al marcar esta casilla se activan las opciones de configuración de gráfica que le permitirán:
                  <ul>
                    <li>Configurar la escala del gráfico el valor tanto valor mínimo como valor máximo.</li>
                    <li>Configurar la posición de la banda de control mínima y máxima de la variable Y1.</li>
                    <li>Configurar la posición de la banda de control de la variable Y2.</li>                
                  </ul>
                  <p><strong>NOTA:</strong> 
                      Si no tiene seleccionada la casilla "Variable Y2" no se mostrarán las opciones para esta variable.<br>
                      Si desea consultar una sola variable es recomendable desactivar la casilla "variable Y2". 
                  </p>
                </td>
              </tr>
            </tbody>
          </table>

            </div>        
          
          </div>
        


            <p id="mensaje">
              
            </p>
          
          </div>

      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Card para el formulario-->
  <div class="card">
    <div class="card-header bg-gradient-navy">
      <h3 class="card-title">Formulario de consulta</h3>

      <div class="card-tools">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->
        <button
          type="button"
          id="helpWidget"
          class="btn btn-tool"
        >
          <i class="far fa-question-circle"></i> 
        </button>
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

    <div class="card-body">
      <form id="formData">
        <div class="form-row">
          <div class="col-md-3 mr-1">
            {{--
            <div id="selectOrden" class="form-group">
              <label>Opcion eje x</label>
              <select id="orden" name="orden" class="form-control">
                <option selected>Fecha</option>
                <option>Celda</option>
              </select>
            </div>
            --}}
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
                  >Línea V</label
                >
              </div>
            </div>
            <div id="formvarFiltro" class="form-group">
              <label for="varFiltro">Opción para filtrar</label>
              <select id="varFiltro" name="varFiltro" class="form-control">
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
              <label>Rango de operación</label>
              <br />
              <label>Rango para variable de filtrado</label>
              <div class="form-row form-inline">
                <div class="input-group col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">operador</span>
                  </div>
                  <select class="custom-select col-md-4" id="operadorVF" name="operadorVF">
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
                    <span class="input-group-text">Límite inferior</span>
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

              <div class="form-row form-inline">
                <div class="input-group col-md-6 offset-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Límite superior</span>
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
              <label>Cálculo a consultar para rango de celdas</label>
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
              <label for="variable">Variable Y1</label>
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
              <label>Rango de operación</label>
              <br />
              <label>Rango de <span id="labelVariable"> variable </span> a consultar</label>
              <div class="form-row form-inline">
                <div class="input-group col-md-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">operador</span>
                  </div>
                  <select class="custom-select col-md-4" id="operador1" name="operador1">
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
                    <span class="input-group-text">Límite inferior</span>
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

              <div class="form-row form-inline">
                <div class="input-group col-md-6 offset-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Límite superior</span>
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
              <label for="variable2" class="mr-2">Variable Y2 </label>
              <div class="custom-control custom-checkbox">
                <input
                  type="checkbox"
                  name="checkVariable2"
                  class="custom-control-input"
                  id="checkVariable2"
                />
                <label class="custom-control-label" for="checkVariable2"></label>
              </div>
              <label for="variable2" class="mr-2">Configurar gráfica </label>
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
                <label>Rango de operación</label>
                <br />
                <label>Rango de <span id="labelVariable2"> variable </span> a consultar</label>
                <div class="form-row form-inline">
                  <div class="input-group col-md-6">
                    <div class="input-group-prepend">
                      <span class="input-group-text">operador</span>
                    </div>
                    <select
                      class="custom-select col-md-4"
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
                      <span class="input-group-text">Límite inferior</span>
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

                <div class="form-row form-inline">
                  <div class="input-group col-md-6 offset-6">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Límite superior</span>
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

         
          <div class="col-md-4" id="configGrafica" style="display: none;">
            <label>Configuración de gráfica</label>

            <div class="form-group">
              <div class="form-row">
                <label>Mínimo de la escala</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Min (escala de gráfico)</span>
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

                <label>Máximo de la escala</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Max (escala de gráfico)</span>
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

          <div class="col-md-4" id="configGrafica1" style="display: none;">
            <div class="form-group">
              <div class="form-row">
                <label>Variable Y1 Banda de control 1</label>
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

                <label>Variable Y1 Banda de control 2</label>
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
          </div>

          <div class="col-md-4" id="configGrafica2" style="display: none;">
            <div id="bandaVar2">
              <label>Variable Y2 Banda de control 1</label>
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

              <label>Variable Y2 Banda de control 2</label>
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
  <div class="card card-navy" style="display: none;" id="lineVChart">
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
  <div class="card card-navy" id="cardGrafica" style="display: none;">
    <div class="card-header">
      <h3 class="card-title">Gráfica</h3>

      <div class="card-tools">
        <button
          type="button"
          id="consultaChartwidget"
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
        <canvas
          id="consultaChart"
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
  <div class="card card-navy" id="cardTablaDatos" style="display: none;">
    <div class="card-header">
      <h3 class="card-title">Tabla de datos de la gráfica</h3>
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
      <table
        class="table table-striped table-bordered"
        style="width: 100%;"
        id="celdas"
      >
        <thead>
          <tr>
            <th id="thCelda">celda</th>
            <th>dia</th>
            <th id="thVariable"></th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
      <table
        class="table table-striped table-bordered"
        style="display: none; width: 100%;"
        id="celdas2"
      >
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


@stop

@section('js')
  <script> 
    //funcion para mostrar elemento HTML
    function mostrar(elemento) {
      if ($(elemento).is(':hidden'))
        $(elemento).show();
      else
        return;
    }
    //funcion para ocultar elemento HTML
    function ocultar(elemento) {
      if ($(elemento).is(':visible'))
       $(elemento).hide();
      else
        return;
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
   
    $( "#helpWidget" ).click(function() {
            $("#modalAyuda").modal("show");
    });
   // $("#chartwidget").CardWidget("collapse");
    //$("#voltajeChartwidget").CardWidget("collapse");
   // $("#celdaswidget").CardWidget("collapse");

    $(document).ready(function () {
      $("#formdata").submit(function (event) {
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
    var ctx = document.getElementById("consultaChart").getContext("2d");
    var varChart = new Chart(ctx, {
      type: "line",
      data: ChartDataclear,
      options: ChartOptionsclear,
    });

    //funcion para cambiar el texto de la variable cuando cambie el combobox
    $("#variable").change(function (){
      $("#labelVariable").text($('#variable').val());
    });
    $("#variable2").change(function (){
      $("#labelVariable2").text($('#variable2').val());
    });
    //funcion para mostrar elemento HTML cuando cambia un checkbox
    $("#checkConfig").change(function () {
      let estado = $("#checkConfig").is(":checked");
      if (estado) {
        mostrar("#configGrafica");
        mostrar("#configGrafica1");
        mostrar("#configGrafica2");
      } else {
        ocultar("#configGrafica");
        ocultar("#configGrafica1");
        ocultar("#configGrafica2");
      }
    });
    //funcion para cambiar valor de inputs cuando cambia un checkbox
    $("#checkLinea").change(function () {
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
    $("#checkVariable2").change(function () {
      let estado = $("#checkVariable2").is(":checked");
      if (estado) {
        mostrar("#variable2Form");
        mostrar("#bandaVar2");
      } else {
        $("#var2Rango1").val("");
        $("#var2Rango2").val("");
        $("#variable2").val("");
        $("#banda1Var2").val("");
        $("#banda2Var2").val("");
        ocultar("#variable2Form");
        ocultar("#bandaVar2");
      }
    });

   //FUNCION QUE SE ESTA UTILIZANDO PARA GRAFICAR

    $(document).ready(function () {
      $("#formData").bind("submit", function () {
        $.ajaxSetup({
          headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
          },
        });
        datos = $(this).serialize();
        console.log(datos);
        $.ajax({
          type: "post",
          url: "{{ route('evolution.dataChartp') }}",
          data: $(this).serialize(),
          beforeSend: function () {
            /*
            * Esta función se ejecuta durante el envió de la petición al
            * servidor.
            * */
            celldestroy("#celdas");
            celldestroy("#celdas2");
          },
          complete: function (data) {
            /*
            * Se ejecuta al termino de la petición
            * */
          },
          success: function (response) {
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
            response.datos.forEach(function (data) {
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
              response.datosVar2.forEach(function (data) {
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
                hoverMode: "index",
                stacked: false,
                responsive: true,
                title: {
                  display: true,
                  text:
                    response.variable +
                    " - " +
                    response.variableVar2 + " / " + response.celda1 + " - " + response.celda2,
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
                        labelString: response.ylabel,
                        display: true,
                      },
                      type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                      display: true,
                      position: "left",
                      id: "y-axis-1",
                      ticks: {
                        min: response.miny,
                        max: response.maxy,
                      },
                    },
                    {
                      type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                      display: true,
                      scaleLabel: {
                        labelString: response.ylabelVar2,
                        display: true,
                      },
                      position: "right",
                      id: "y-axis-2",
                      ticks: {
                        min: response.minyVar2,
                        max: response.maxyVar2,
                      },
                    },
                  ],

                  xAxes: [
                    {
                      scaleLabel: {
                        labelString: response.xlabel,
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
            } else {
              var ChartOptions = {
                responsive: true,
                hoverMode: "index",
                stacked: false,
                responsive: true,
                title: {
                  display: true,
                  text: response.variable + " / " + response.celda1 + " - " + response.celda2,
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
                        labelString: response.ylabel,
                        display: true,
                      },
                      type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                      display: true,
                      position: "left",
                      id: "y-axis-1",
                      ticks: {
                        min: response.miny,
                        max: response.maxy,
                      },
                    },
                  ],

                  xAxes: [
                    {
                      scaleLabel: {
                        labelString: response.xlabel,
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
            }
            // Si no existe una 2da variable esconde la tabla de datos
            if (response.variableVar2 == null) {
              ocultar("#celdas2");
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
                    backgroundColor: "#83befc",
                    borderColor: "#0306ad",
                    pointBorderColor: "#0306ad",
                    pointBackgroundColor: "#0306ad",
                    fill: false,
                    lineTension: 0,
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
                    label: "referencia mínima",
                    data: banda1,
                    yAxisID: "y-axis-1",
                    borderWidth: 1,
                    backgroundColor: "#fad9b6",
                    borderColor: "red",
                    pointBackgroundColor: "red",
                    pointBorderColor: "red",
                    pointStyle: "line",
                    fill: false,
                    lineTension: 0,
                  },
                  {
                    label: "referencia máxima",
                    data: banda2,
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
                    lineTension: 0,
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
                    label: "referencia mínima 2",
                    data: banda1Var2,
                    yAxisID: "y-axis-2",
                    borderWidth: 1,
                    backgroundColor: "transparent",
                    borderColor: "brown",
                    pointBorderColor: "#brown",
                    pointBackgroundColor: "#brown",
                    pointStyle: "line",
                    fill: false,
                    lineTension: 0,
                  },
                  {
                    label: "referencia máxima 2",
                    data: banda2Var2,
                    yAxisID: "y-axis-2",
                    borderWidth: 1,
                    backgroundColor: "transparent",
                    borderColor: "black",
                    pointBorderColor: "#black",
                    pointBackgroundColor: "#black",
                    pointStyle: "line",
                    fill: false,
                    lineTension: 0,
                  },
                ],
              };
            } else {
              var ChartData = {
                labels: Dia,
                datasets: [
                  {
                    label: response.variable,
                    data: Datos,
                    yAxisID: "y-axis-1",
                    borderWidth: 1,
                    backgroundColor: "#83befc",
                    borderColor: "#0306ad",
                    pointBorderColor: "#0306ad",
                    pointBackgroundColor: "#0306ad",
                    fill: false,
                    lineTension: 0,
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
                    label: "referencia mínima",
                    data: banda1,
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
                    label: "referencia máxima",
                    data: banda2,
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
            }

            varChart.options = ChartOptions;
            varChart.data = ChartData;
            varChart.update();
            $("#consultaChart").CardWidget("expand");
            $("#thVariable").text(response.variable);
            $("#thVariable2").text(response.variableVar2);
            $("#celdaswidget").CardWidget("expand");

            //rellena las tablas con valores consultados
            if (response.calculo != "") {
              $("#thCelda").text(response.calculo);
              $("#celdas").DataTable({
                data: response.datatable.original.data,
                processing: true,
                paging: false,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                columns: [
                  { defaultContent: response.calculo },
                  { data: "dia" },
                  { data: response.varKey },
                ],
                dom: '<"top"Bipfl>rt<"bottom"Bip><"clear">',
                buttons: [
                  {
                    extend: "copy",
                    text: "copiar",
                    className: "btn btn-primary",
                  },
                  {
                    extend: "csv",
                    text: "csv",
                    className: "btn btn-primary",
                  },
                  {
                    extend: "excel",
                    text: "excel",
                    className: "btn btn-primary",
                  },
                  {
                    extend: "pdf",
                    text: "pdf",
                    className: "btn btn-primary",
                  },
                  {
                    extend: "print",
                    text: "imprimir",
                    className: "btn btn-primary",
                  },
                ],
              });
              if (response.variableVar2 != null) {
                $("#thCelda2").text(response.calculo);
                $("#celdas2").DataTable({
                  data: response.datatableVar2.original.data,
                  processing: true,
                  paging: false,
                  language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                  columns: [
                    { defaultContent: response.calculo },
                    { data: "dia" },
                    { data: response.varKeyVar2 },
                  ],
                  dom: '<"top"Bipfl>rt<"bottom"Bip><"clear">',//'<"top"fl>rt<"bottom"Bip><"clear">',
                  buttons: [
                    {
                      extend: "copy",
                      text: "copy",
                      className: "btn btn-primary",
                    },
                    {
                      extend: "csv",
                      text: "csv",
                      className: "btn btn-primary",
                    },
                    {
                      extend: "excel",
                      text: "excel",
                      className: "btn btn-primary",
                    },
                    {
                      extend: "pdf",
                      text: "pdf",
                      className: "btn btn-primary",
                    },
                    {
                      extend: "print",
                      text: "print",
                      className: "btn btn-primary",
                    },
                  ],
                });
              }
            } else {
              $("#thCelda").text("celda");
              $("#celdas").DataTable({
                data: response.datatable.original.data,
                processing: true,
                paging: false,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                columns: [
                  { data: "celda" },
                  { data: "dia" },
                  { data: response.varKey },
                ],
                dom:  '<"top"Bipfl>rt<"bottom"Bip><"clear">',//'<"top"fl>rt<"bottom"Bip><"clear">',
                buttons: [
                  {
                    extend: "copy",
                    text: "copy",
                    className: "btn btn-primary",
                  },
                  {
                    extend: "csv",
                    text: "csv",
                    className: "btn btn-primary",
                  },
                  {
                    extend: "excel",
                    text: "excel",
                    className: "btn btn-primary",
                  },
                  {
                    extend: "pdf",
                    text: "pdf",
                    className: "btn btn-primary",
                  },
                  {
                    extend: "print",
                    text: "print",
                    className: "btn btn-primary",
                  },
                ],
              });
              if (response.variableVar2 != null) {
                $("#thCelda2").text("celda");
                $("#celdas2").DataTable({
                  data: response.datatableVar2.original.data,
                  processing: true,
                  paging: false,
                  language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                  columns: [
                    { data: "celda" },
                    { data: "dia" },
                    { data: response.varKeyVar2 },
                  ],
                  dom: '<"top"Bipfl>rt<"bottom"Bip><"clear">',
                  buttons: [
                    {
                      extend: "copy",
                      text: "copy",
                      className: "btn btn-primary",
                    },
                    {
                      extend: "csv",
                      text: "csv",
                      className: "btn btn-primary",
                    },
                    {
                      extend: "excel",
                      text: "excel",
                      className: "btn btn-primary",
                    },
                    {
                      extend: "pdf",
                      text: "pdf",
                      className: "btn btn-primary",
                    },
                    {
                      extend: "print",
                      text: "print",
                      className: "btn btn-primary",
                    },
                  ],
                });
              }
            }
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