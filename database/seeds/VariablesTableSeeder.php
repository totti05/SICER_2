<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class VariablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('sicerl5')->table('variables')->insert(
            [
                'id'=> 1,
                'variable' => 'Acidez de baño', 
                'nombre_var_bd'=> 'acidez',
                'neumonico'=> 'acidez', 
                'unidad'=> '%', 
                'descripcion'=> 'Cantidad de fluoruro de aluminio en exceso en el baño electrolitico', 
                'calculo_variable'=> null, 
                'calculo_rango_ref'=> null,
                'referencia_inferior'=> 10, 
                'referencia_superior'=> 13, 
                'referencia_operativa'=> null,
                'rango_ideal'=> null, 
                'min_grafica'=> null, 
                'max_grafica'=> null,  
                'modulo'=> 'baño_electrolitico',
                'tabla_bd'=> 'bath', 
                'comentario'=> 'El mismo limite de acidez de baño para Complejo I, II y V linea'
            ]);
            DB::connection('sicerl5')->table('variables')->insert([
                'id'=> 2,
                'variable' => 'Voltaje', 
                'nombre_var_bd'=> 'voltaje',
                'neumonico'=> 'Vpre', 
                'unidad'=> 'v(Voltio)', 
                'descripcion'=> 'Voltaje de la celda (Voltaje de referencia)', 
                'calculo_variable'=> null, 
                'calculo_rango_ref'=> 'Superior: Limite de Potencia Nominal maximo / Corriente Nominal del complejo.
                                       Inferior: Limite de Potencia Nominal minimo / Corriente Nominal del complejo',
                'referencia_inferior'=> null, 
                'referencia_superior'=> null, 
                'referencia_operativa'=> null,
                'rango_ideal'=> null, 
                'min_grafica'=> null, 
                'max_grafica'=> null,  
                'modulo'=> 'Celda',
                'tabla_bd'=> 'cells', 
                'comentario'=> 'Se grafica por Complejo, los limites se calculan con el limite maximo o minimo de la 
                                potencia nomimal según el complejo y la corriente nominal según el complejo.'
            ]); 
            DB::connection('sicerl5')->table('variables')->insert([
                'id'=> 3,
                'variable' => 'Efectos anódicos', 
                'nombre_var_bd'=> 'numeroEA',
                'neumonico'=> 'nEA', 
                'unidad'=> 'numero', 
                'descripcion'=> ' Cantidad de EA en la celda', 
                'calculo_variable'=> null, 
                'calculo_rango_ref'=> null,
                'referencia_inferior'=> null, 
                'referencia_superior'=> null, 
                'referencia_operativa'=> null,
                'rango_ideal'=> null, 
                'min_grafica'=> null, 
                'max_grafica'=> null,  
                'modulo'=> 'Celda',
                'tabla_bd'=> 'cells', 
                'comentario'=> null
            ]);
            DB::connection('sicerl5')->table('variables')->insert([
                'id'=> 4,
                'variable' => 'desviación de resistencia', 
                'nombre_var_bd'=> 'dsr',
                'neumonico'=> 'DesvR', 
                'unidad'=> 'µΩ (microhomnio)', 
                'descripcion'=> 'Desviación estándar de la resistencia', 
                'calculo_variable'=> null, 
                'calculo_rango_ref'=> null,
                'referencia_inferior'=> null, 
                'referencia_superior'=> null, 
                'referencia_operativa'=> null,
                'rango_ideal'=> null, 
                'min_grafica'=> null, 
                'max_grafica'=> null,  
                'modulo'=> 'Celda',
                'tabla_bd'=> 'cells', 
                'comentario'=> null
            ]
            );
    }
}
