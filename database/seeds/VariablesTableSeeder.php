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
                    'referencia_inferior'=> 4.55, 
                    'referencia_superior'=> 4.65, 
                    'referencia_operativa'=> null,
                    'rango_ideal'=> null, 
                    'min_grafica'=> 4.4, 
                    'max_grafica'=> 5.1,  
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
                    'referencia_operativa'=> 0.4,
                    'rango_ideal'=> null, 
                    'min_grafica'=> 0, 
                    'max_grafica'=> 4,  
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
                    'referencia_operativa'=> 0.06,
                    'rango_ideal'=> null, 
                    'min_grafica'=> 0, 
                    'max_grafica'=> 1,  
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
                    'referencia_inferior'=> 10.5, 
                    'referencia_superior'=> 11, 
                    'referencia_operativa'=> null,
                    'rango_ideal'=> null, 
                    'min_grafica'=> 8, 
                    'max_grafica'=> 13.5,  
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
                'unidad'=> 'v (voltio)', 
                'descripcion'=> 'Voltaje maximo registrado durante un efecto anodico', 
                'calculo_variable'=> null, 
                'calculo_rango_ref'=> null,
                'referencia_inferior'=> 35, 
                'referencia_superior'=> 40, 
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
                    'neumonico'=> 'kgFluorCD', 
                    'unidad'=> '(Kg/CD) kilos por celda', 
                    'descripcion'=> 'Cantidad de Fluoruro de Aluminio que se adiciona a una celda', 
                    'calculo_variable'=> null, 
                    'calculo_rango_ref'=> null,
                    'referencia_inferior'=> 50, 
                    'referencia_superior'=> 70, 
                    'referencia_operativa'=> null,
                    'rango_ideal'=> null, 
                    'min_grafica'=> 0, 
                    'max_grafica'=> 170,  
                    'modulo'=> 'baño_electrolitico',
                    'tabla_bd'=> 'bath', 
                    'comentario'=> 'El mismo limite de acidez de baño para Complejo I, II y V linea'
                ]);
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 9,
                    'variable' => 'Consumo AlF3 Manual', 
                    'nombre_var_bd'=> 'manualFL',
                    'neumonico'=> 'kgFluorM/CD', 
                    'unidad'=> '(Kg/CD) kilos por celda', 
                    'descripcion'=> 'Cantidad de Fluoruro de Aluminio que se adiciona manualmente a una celda', 
                    'calculo_variable'=> 'kgfluorM/N°de celdas activas en el complejo', 
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
                    'neumonico'=> 'Kg/CD', 
                    'unidad'=> 'kilos por celda', 
                    'descripcion'=> 'Cantidad de criolita neta en la celda', 
                    'calculo_variable'=> null, 
                    'calculo_rango_ref'=> null,
                    'referencia_inferior'=> 70, 
                    'referencia_superior'=> 185, 
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
                    'neumonico'=> 'golpeAlum', 
                    'unidad'=> 'número', 
                    'descripcion'=> 'Cantidad de alumina adicionada en la celda', 
                    'calculo_variable'=> null, 
                    'calculo_rango_ref'=> '(((CorrienteR * 8,052 * (90,5/100) *1,96)-100) /2,35)',
                    'referencia_inferior'=> 1200, 
                    'referencia_superior'=> 1300, 
                    'referencia_operativa'=> null,
                    'rango_ideal'=> null, 
                    'min_grafica'=> 800, 
                    'max_grafica'=> 1350,  
                    'modulo'=> 'baño_electrolitico',
                    'tabla_bd'=> 'bath', 
                    'comentario'=> 'El mismo limite de acidez de baño para Complejo I, II y V linea'
                ]);
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 12,
                    'variable' => 'Duracion de tracking', 
                    'nombre_var_bd'=> 'duracionTk',
                    'neumonico'=> 'tiemTrack', 
                    'unidad'=> 'h (Horas)', 
                    'descripcion'=> 'Tiempo de duración de la alimentacion Tracking', 
                    'calculo_variable'=> null, 
                    'calculo_rango_ref'=> null,
                    'referencia_inferior'=> 0.7, 
                    'referencia_superior'=> 0.8, 
                    'referencia_operativa'=> null,
                    'rango_ideal'=> null, 
                    'min_grafica'=> 0.5, 
                    'max_grafica'=> 1.9,  
                    'modulo'=> 'baño_electrolitico',
                    'tabla_bd'=> 'bath', 
                    'comentario'=> 'El mismo limite de acidez de baño para Complejo I, II y V linea'
                ]);
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 13,
                    'variable' => 'Track CD', 
                    'nombre_var_bd'=> 'numeroTk',
                    'neumonico'=> 'TrackCD', 
                    'unidad'=> 'número', 
                    'descripcion'=> 'es el numero de tracking ejecutado en un dia ', 
                    'calculo_variable'=> null, 
                    'calculo_rango_ref'=> null,
                    'referencia_inferior'=> 1, 
                    'referencia_superior'=> 1.3, 
                    'referencia_operativa'=> null,
                    'rango_ideal'=> null, 
                    'min_grafica'=> 0, 
                    'max_grafica'=> 2.5,  
                    'modulo'=> 'baño_electrolitico',
                    'tabla_bd'=> 'bath', 
                    'comentario'=> 'El mismo limite de acidez de baño para Complejo I, II y V linea'
                ]);
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 14,
                    'variable' => 'Alimentadores Bloqueados', 
                    'nombre_var_bd'=> 'acidez',
                    'neumonico'=> 'TotalAlimBloq', 
                    'unidad'=> 'número', 
                    'descripcion'=> 'Total de Alimentadores Bloqueados (Alimentadores de Alúmina)', 
                    'calculo_variable'=> 'Σ(AliTolva1 + AloTolva2 + AliTolva3 + AliTolva4)', 
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
                    'neumonico'=> 'golpeReal', 
                    'unidad'=> '( Kg/ golp) kilos por golpe', 
                    'descripcion'=> 'la masa de alumina descargada por cada accionamiento del alimentador ', 
                    'calculo_variable'=> null, 
                    'calculo_rango_ref'=> null,
                    'referencia_inferior'=> null, 
                    'referencia_superior'=> null, 
                    'referencia_operativa'=> 2.4,
                    'rango_ideal'=> null, 
                    'min_grafica'=> 1.7, 
                    'max_grafica'=> 3.2,  
                    'modulo'=> 'baño_electrolitico',
                    'tabla_bd'=> 'bath', 
                    'comentario'=> 'El mismo limite de acidez de baño para Complejo I, II y V linea'
                ]);
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 16,
                    'variable' => 'Atraso Cambio Normal', 
                    'nombre_var_bd'=> 'acidez',
                    'neumonico'=> 'AtrasoCN', 
                    'unidad'=> 'número', 
                    'descripcion'=> 'Cantidad de ánodos atrasados por cambio normal', 
                    'calculo_variable'=> 'Promedio de ánodos atrasados por cambio normal', 
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
                    'neumonico'=> 'AtrasoBA', 
                    'unidad'=> 'número', 
                    'descripcion'=> 'Cantidad de ánodos atrasados por Banqueo', 
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
                    'neumonico'=> 'AtrasoCol', 
                    'unidad'=> 'número', 
                    'descripcion'=> 'Cantidad de Atrasos en colada', 
                    'calculo_variable'=> 'PromedioAtrasoCol', 
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
                    'neumonico'=> 'DíasAtrasoBA', 
                    'unidad'=> 'Días', 
                    'descripcion'=> 'Días de Atrasos por banqueo de ánodos', 
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
                    'neumonico'=> 'DíasAtrasoCN', 
                    'unidad'=> 'Días', 
                    'descripcion'=> 'Días de Atrasos por cambio normal de ánodos ', 
                    'calculo_variable'=> 'PromedioCN/((18/12 *CeldasOperativas))', 
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
                    'neumonico'=> 'nivelDeBanio', 
                    'unidad'=> 'cm (centimetros)', 
                    'descripcion'=> 'Es la altura de la columna de baño en la celda', 
                    'calculo_variable'=> null, 
                    'calculo_rango_ref'=> null,
                    'referencia_inferior'=> 20, 
                    'referencia_superior'=> 23, 
                    'referencia_operativa'=> null,
                    'rango_ideal'=> null, 
                    'min_grafica'=> 15, 
                    'max_grafica'=> 27,  
                    'modulo'=> 'baño_electrolitico',
                    'tabla_bd'=> 'bath', 
                    'comentario'=> 'El mismo limite de acidez de baño para Complejo I, II y V linea'
                ]);
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 22,
                    'variable' => 'Temperatura de baño', 
                    'nombre_var_bd'=> 'temperatura',
                    'neumonico'=> 'temp', 
                    'unidad'=> 'ºC', 
                    'descripcion'=> 'Temperatura en que se encuenta el baño electrolitico de una celda', 
                    'calculo_variable'=> null, 
                    'calculo_rango_ref'=> null,
                    'referencia_inferior'=> 960, 
                    'referencia_superior'=> 965, 
                    'referencia_operativa'=> null,
                    'rango_ideal'=> null, 
                    'min_grafica'=> 950, 
                    'max_grafica'=> 990,  
                    'modulo'=> 'baño_electrolitico',
                    'tabla_bd'=> 'bath', 
                    'comentario'=> 'El mismo limite de acidez de baño para Complejo I, II y V linea'
                ]);
            DB::connection('sicerl5')->table('variables')->insert(
                [
                    'id'=> 23,
                    'variable' => '% CaF2 en el baño electrolitico', 
                    'nombre_var_bd'=> 'acidez',
                    'neumonico'=> 'CalcioB', 
                    'unidad'=> '%', 
                    'descripcion'=> '% de fluoruro de Calcio que se encuentra en el baño electrolitico', 
                    'calculo_variable'=> null, 
                    'calculo_rango_ref'=> null,
                    'referencia_inferior'=> null, 
                    'referencia_superior'=> null, 
                    'referencia_operativa'=> 5.4,
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
                    'neumonico'=> 'MezclaBFM', 
                    'unidad'=> 'kg (kilos)', 
                    'descripcion'=> 'Baño frio molido suministrado a la celda via fase densa', 
                    'calculo_variable'=> null, 
                    'calculo_rango_ref'=> '(Celdas activas L1 + Celdas activas L2 / 2) *112 * 0,35 / 0,3
                    (Celdas activas L3 + Celdas activas L4 / 2) *112 * 0,35 / 0,3
                    (( Celdas activas V Linea ) * 26 / 23 ) * 320
                    ',
                    'referencia_inferior'=> null, 
                    'referencia_superior'=> null, 
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
                    'variable' => 'Desviacion de temperatura', 
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
