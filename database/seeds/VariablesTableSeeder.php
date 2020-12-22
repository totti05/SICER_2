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
        //variables celdas
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 1,
                    'variable' => 'Edad de celda', 
                    'nombre_var_bd'=> 'edad',
                    'neumonico'=> 'Edad', 
                    'unidad'=> 'número', 
                    'descripcion'=> 'Días que tiene la celda produciendo', 
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
                    'comentario'=> 'El mismo limite de acidez de baño para Complejo I, II y V linea'
                ]);
                DB::connection('sicerl5')->table('variables')->insert([
                    'id'=> 2,
                    'variable' => 'Voltaje Pre', 
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
                    'variable' => 'Desviación de resistencia', 
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

                DB::connection('sicerl5')->table('variables')->insert([
                    'id'=> 5,
                    'variable' => 'Duración de efecto anódico', 
                    'nombre_var_bd'=> 'duracionEA',
                    'neumonico'=> 'DurEA', 
                    'unidad'=> 'minutos', 
                    'descripcion'=> 'Tiempo de duración del Efecto Anódico', 
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
        //variables metal_celdas
        //variables metal_crisol
        //variables fallas_anodos
        //variables atraso_anodos
        //variables alumina
        //variables baño_electrolitico
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 6,
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
            DB::connection('sicerl5')->table('variables')->insert(
            [
                'id'=> 7,
                'variable' => 'VMAX del efecto anódico', 
                'nombre_var_bd'=> 'vMaxEA',
                'neumonico'=> 'VMAX', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 8,
                    'variable' => 'Consumo AlF3', 
                    'nombre_var_bd'=> 'automFl',
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 9,
                    'variable' => 'Consumo AlF3 Manual', 
                    'nombre_var_bd'=> 'manualFL',
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 10,
                    'variable' => 'Criolita neta', 
                    'nombre_var_bd'=> 'criolita',
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 11,
                    'variable' => 'Alimentacion de alumina', 
                    'nombre_var_bd'=> 'golpesAlumina',
                    'neumonico'=> 'acsidez', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 12,
                    'variable' => 'Duracion de tracking', 
                    'nombre_var_bd'=> 'duracionTk',
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 13,
                    'variable' => 'Track CD', 
                    'nombre_var_bd'=> 'numeroTk',
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 14,
                    'variable' => 'Alimentadores Bloqueados', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 15,
                    'variable' => 'Dump Size Alumina', 
                    'nombre_var_bd'=> 'golpeUso',
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 16,
                    'variable' => 'Atraso Cambio Normal', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 17,
                    'variable' => 'Atrasos Banqueo de Ánodos', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 18,
                    'variable' => 'Atrasos en Colada', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 19,
                    'variable' => 'Días de Atrasos Banqueo de Ánodos', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 20,
                    'variable' => 'Días de Atrasos Cambio Normal de Ánodos', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 21,
                    'variable' => 'Nivel de Baño', 
                    'nombre_var_bd'=> 'nivelDeBanio',
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 22,
                    'variable' => 'Temperatura de baño', 
                    'nombre_var_bd'=> 'temperatura',
                    'neumonico'=> 'temperatura', 
                    'unidad'=> 'ºC', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 23,
                    'variable' => '% CaF2 en el baño electrolitico', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 24,
                    'variable' => 'Baño Fase Densa', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 25,
                    'variable' => 'Calidad de Baño', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 26,
                    'variable' => 'Cantidad de Baño', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 27,
                    'variable' => 'Desviacion Acidez', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 28,
                    'variable' => 'Desviacion Nb', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 29,
                    'variable' => 'Ánodos Cambio Quemado por Sobreconducción', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 30,
                    'variable' => 'Ánodos extras', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 31,
                    'variable' => 'Ánodos Rajados', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 32,
                    'variable' => 'Ánodos Tetas', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 33,
                    'variable' => 'Anodos B/A', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 34,
                    'variable' => 'Anodos B/O  cambio Normal', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 35,
                    'variable' => 'Anodos Bimetalicos', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 36,
                    'variable' => 'Celdas C/ Casco Rojo', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 37,
                    'variable' => 'Celdas C/ Derrame de Alumina', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 38,
                    'variable' => 'Celdas C/ Tolvas Vacia', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 39,
                    'variable' => 'Celdas Desincorporadas', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 40,
                    'variable' => 'Celdas Desincorporadas por Alto % Hierro', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 41,
                    'variable' => 'Celdas Desincorporadas por Barra Perforada', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 42,
                    'variable' => 'Celdas Desincorporadas por Pared Perforada', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 43,
                    'variable' => 'Celdas Desincorporadas Programada', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 44,
                    'variable' => 'Celdas Desnatadas', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 45,
                    'variable' => 'Celdas Incorporadas', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 46,
                    'variable' => 'Celdas Conectadas', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 47,
                    'variable' => 'Corriente Nominal', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 48,
                    'variable' => 'Corriente de Linea ', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 49,
                    'variable' => 'Factor Servicio de Grúas', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 50,
                    'variable' => 'Frecuencia Desnatado', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 51,
                    'variable' => 'Frecuencia Efectos Anodicos ', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 52,
                    'variable' => 'Inestabilidad de Celdas', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 53,
                    'variable' => 'Potencia Neta', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 54,
                    'variable' => 'Potencia nominal', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 55,
                    'variable' => 'Nivel de Metal', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 56,
                    'variable' => 'Desviacion Nm', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 57,
                    'variable' => 'Eficiencia de Trasegado (Eficiencia de corriente)', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 58,
                    'variable' => 'Hierro Metal de Celdas', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 59,
                    'variable' => 'Pureza del Metal en Celdas', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 60,
                    'variable' => 'Silicio Metal Celdas', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 61,
                    'variable' => 'Consumo Baño Frío en Crisoles', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 62,
                    'variable' => 'Consumo MDC en Crisoles', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 63,
                    'variable' => 'Hierro en Crisoles', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 64,
                    'variable' => 'Pureza del Metal Crisol', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 65,
                    'variable' => 'Silicio en Crisoles', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 66,
                    'variable' => 'Criolita de Arranque', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 67,
                    'variable' => 'Peso de Ánodo', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 68,
                    'variable' => 'Peso de Cabo', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 69,
                    'variable' => '(BO+RAJ+BIM+Tetas)', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 70,
                    'variable' => 'Voltaje pro', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 71,
                    'variable' => 'Ánodos Cambio Quemado por Sobreconducción', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 72,
                    'variable' => 'Ánodos extras', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 73,
                    'variable' => 'Ánodos Rajados', 
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
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 74,
                    'variable' => 'Ánodos Tetas', 
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
                DB::connection('sicerl5')->table('variables')->insert(
                    [
                        'id'=> 75,
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

                    
        //variables info_linea
    }
}
