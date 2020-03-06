@extends('adminlte::page')

@section('content')
<div class="box box-default bg-white">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-th"></i> Celdas conectadas</h3>
    </div>
    <div class="box-body">  
        <div class="row">
            <div class="col">
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
        </div>            
    </div>     
</div>
@endsection
