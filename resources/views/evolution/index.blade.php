@extends('adminlte::page')
@section('content_header')
    <h1 class=""><i class="fa fa-chart-bar"></i> Evolucion de línea</h1>
@endsection
@section('content')
<div class="box box-default bg-white">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-search"></i> Formulario</h3>
    </div>
    <div class="box-body">  
        <div class="row">
            <div class="col-md-4">
                <!-- Date -->
              <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date range -->
              <div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <label>Date and time range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservationtime">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <label>Date range button:</label>

                <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Date range picker
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>  
            </div>     
        </div> 
    </div>                    
</div>

<div class="box box-default bg-white mt-3">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-chart-line"></i> Graficas</h3>
    </div>
    <div class="box-body">  
        <div class="row">
            <div class="col">
               Formulario    
            </div>     
        </div> 
    </div>                    
</div>
@stop
@section('plugins.DateRangePicker', true)