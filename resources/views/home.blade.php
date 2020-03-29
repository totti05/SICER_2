@extends('adminlte::page')

@section('content')
<div class=container>
    <div class="row">
        <div class="col-md-7 offset-3">
            <div class="card">
                <div class="card-header">
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
                                    <td>nro celdas</td>
                                </tr>
                            </tbody>
                        </table>    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    The footer of the card
                </div>
                <!-- /.card-footer -->
                </div>
        </div>
    </div>
</div>


<!-- /.card -->
@stop
@section('plugins.Datatables', true)

