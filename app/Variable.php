<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    protected $table = 'variables';
    protected $connection = 'sicerl5';
    protected $fillable = [
        'variable','nombre_var_bd', 'neumonico', 'unidad', 
        'descripcion', 'calculo_variable', 'calculo_rango_ref',
        'referencia_inferior', 'referencia_superior', 'referencia_operativa',
        'rango_ideal', 'min_grafica', 'max_grafica',  'modulo','tabla_bd', 
        'comentario'
    ];
}
