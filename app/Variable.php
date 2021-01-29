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
        'rango_ideal', 'min_grafica', 'max_grafica','tabla_bd', 
        'comentario'
    ];

    protected $casts = [
        'referencia_inferior'  => 'float', 
        'referencia_superior'  => 'float', 
        'referencia_operativa'  => 'float',
        'rango_ideal'  => 'float', 
        'min_grafica'  => 'float', 
        'max_grafica'  => 'float'
    ];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = true;

    public function Modules()
    {
        return $this->belongsToMany('App\Module');
    }
}
