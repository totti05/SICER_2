<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    protected $table = 'variables';
    protected $connection = 'sicerl5';
    protected $fillable = [
        'variable', 'neumonico', 'unidad', 'descripcion', 'calculo', 'procedencia', 'procedencia_area', 'tabla_bd', 'comentario', 'rango_ideal', 'rango_inferior', 'rango_superior'  
    ];
}
