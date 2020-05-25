<?php

namespace App\Http\Controllers;

use App\Celda;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Evolution;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class EvolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('evolution.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evolution  $evolution
     * @return \Illuminate\Http\Response
     */
    public function show(Evolution $evolution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evolution  $evolution
     * @return \Illuminate\Http\Response
     */
    public function edit(Evolution $evolution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evolution  $evolution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evolution $evolution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evolution  $evolution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evolution $evolution)
    {
        //
    }
    public function EvolutionDataChart(Request $request)
    {
        if ($request->isMethod('get')) {
        $result = DB::connection('reduccion')->table('diariocelda')
        ->whereBetween('celda', [1000,1001])
        ->whereYear('dia','2018')
        ->whereMonth('dia','05')
        ->get();
        return response()->json($result);
        }
        else{

            list( $fecha1, $fecha2) = explode(' - ', $request->input('rangoFecha'));
            $celda1 = $request->input('celda1');
            $celda2 = $request->input('celda2');
            $calculo = $request->input('calculo');
            $variable = $request->input('variable');
            $variableDB = $request->input('variable');
            $operador1 = $request->input('operador1');
            $operador2 = $request->input('var2Operador');
            switch ($operador1) {
                case 'mayor':
                    $operador1 = '>';
                    break;
                case 'menor':
                    $operador1 = '<';
                    break;
                case 'mayorigual':
                    $operador1 = '>=';
                    break;
                case 'menorigual':
                    $operador1 = '<=';
                    break;
                    
                    
            }


            $rangoOp1 = $request->input('rango1');
            $rangoOp2 = $request->input('rango2');
            

            $min = floatval($request->input('EscalaMin'));
            $max = floatval($request->input('EscalaMax'));
            $banda1= $request->input('banda1');
            $banda2= $request->input('banda2');

            switch($variableDB){
                case "Voltaje":
                    $variableDB = 'voltaje';
                    $ylabel = 'V (voltios)'; 
                    $xlabel = 'fecha';

                    if($banda1 == ''){
                        $banda1 = 4.55 ;
                    } 
                    if($banda2 == ''){
                        $banda2 = 4.65;
                    }   

                    if($min == ''){
                        $min = 4.4;
                    } 
                    if($max == ''){
                        $max = 5.1;
                    }   
                    

                break;
                
                case "Efectos anodicos":
                    $variableDB = 'numeroEA';
                    $ylabel = 'EA/CD'; 
                    $xlabel = 'fecha';
                    $banda1= 0.4;
                    $banda2= null;
                    if($min == ''){
                        $min = 0;
                    } 
                    if($max == ''){
                        $max = 4;
                    }  
                break;
                
                case "Desviación de Resistencia":
                    $variableDB = 'voltaje';
                break;
                
                case "Alimentacion de Alumina":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Temperatura de baño":
                    $variableDB = 'temperatura';
                break;
                
                case "Duracion de Tracking":
                    $variableDB = 'duracionTk';
                break;
                
                case "Acidez de Baño":
                    $variableDB = 'acidez';
                break;
                
                case "Dump Size Alumina":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Consumo AlF3":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Track CD":
                    $variableDB = 'numeroTk';
                break;
                
                case "Consumo AlF3 Manual":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "VMAX del Efecto Anodico":
                    $variableDB = 'vMaxEA';
                break;
                
                case "Eficiencia de Trasegado (Eficiencia de corriente)":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Duracion de Efecto anódico":
                    $variableDB = 'duracionEA';
                break;
                
                case "Nivel de Metal":
                    $variableDB = 'nivelDeMetal';
                break;
                
                case "Corriente de Linea ":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Potencia nominal":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "(BO+RAJ+BIM+Tetas)":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Potencia Neta":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Anodos B/O  cambio Normal":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Nivel de Baño":
                    $variableDB = 'nivelDeBanio';
                break;
                
                case "Anodos Bimetalicos":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Criolita Neta ":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Criolita de Arranque":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Anodos B/A":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Baño Fase Densa":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Desviacion de Temperatura":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Hierro Metal de Celdas ":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Desviacion Acidez":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Silicio Metal Celdas":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Desviacion Nm":
                    $variableDB = 'voltaje'; //falta ubicarlo en BD
                break;
                
                case "Frecuencia Desnatado":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Desviacion Nb":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Celdas Conectadas":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Frecuencia Efectos Anodicos ":
                    $variableDB = 'voltaje'; //falta ubicarlo en BD
                break;
                
                case "% CaF2 en el baño electrolitico":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;

            }
            
            $variable2 = $request->input('variable2');
            $variableDB2 = $request->input('variable2');
            $rangoOp1Var2 = $request->input('var2Rango1');
            $rangoOp2Var2 = $request->input('var2Rango2');

            $banda1Var2 = null;
            $banda2Var2 = null;
            $minVar2 = null;
            $maxVar2 = null;
            $ylabelVar2 = null;
            $xlabelVar2 = null;
            $result = null;
            $result2 = null;
            $datatableVar2 = null;
            switch ($operador2) {
                case 'mayor':
                    $operador2 = '>';
                    break;
                case 'menor':
                    $operador2 = '<';
                    break;
                case 'mayorigual':
                    $operador2 = '>=';
                    break;
                case 'menorigual':
                    $operador2 = '<=';
                    break;       
            }
        if($variable2 != "" ){
            switch($variableDB2){
                case "Voltaje":
                    $variableDB2 = 'voltaje';
                    $ylabelVar2 = 'V (voltios)'; 
                    $xlabelVar2 = 'fecha';

                    if($banda1Var2 == ''){
                        $banda1Var2 = 4.55 ;
                    } 
                    if($banda2Var2 == ''){
                        $banda2Var2 = 4.65;
                    }   

                    if($minVar2 == ''){
                        $minVar2 = 4.4;
                    } 
                    if($maxVar2 == ''){
                        $maxVar2 = 5.1;
                    }   
                    

                break;
                
                case "Efectos anodicos":
                    $variableDB2 = 'numeroEA';
                    $ylabelVar2 = 'EA/CD'; 
                    $xlabelVar2 = 'fecha';
                    $banda1Var2= 0.4;
                    $banda2Var2= null;
                    if($minVar2 == ''){
                        $minVar2 = 0;
                    } 
                    if($maxVar2 == ''){
                        $maxVar2 = 4;
                    }  
                break;
                
                case "Desviación de Resistencia":
                    $variableDB2 = 'voltaje';
                break;
                
                case "Alimentacion de Alumina":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Temperatura de baño":
                    $variableDB2 = 'temperatura';
                break;
                
                case "Duracion de Tracking":
                    $variableDB2 = 'duracionTk';
                break;
                
                case "Acidez de Baño":
                    $variableDB2 = 'acidez';
                break;
                
                case "Dump Size Alumina":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Consumo AlF3":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Track CD":
                    $variableDB2 = 'numeroTk';
                break;
                
                case "Consumo AlF3 Manual":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "VMAX del Efecto Anodico":
                    $variableDB2 = 'vMaxEA';
                break;
                
                case "Eficiencia de Trasegado (Eficiencia de corriente)":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Duracion de Efecto anódico":
                    $variableDB2 = 'duracionEA';
                break;
                
                case "Nivel de Metal":
                    $variableDB2 = 'nivelDeMetal';
                break;
                
                case "Corriente de Linea ":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Potencia nominal":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "(BO+RAJ+BIM+Tetas)":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Potencia Neta":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Anodos B/O  cambio Normal":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Nivel de Baño":
                    $variableDB2 = 'nivelDeBanio';
                break;
                
                case "Anodos Bimetalicos":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Criolita Neta ":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Criolita de Arranque":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Anodos B/A":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Baño Fase Densa":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Desviacion de Temperatura":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Hierro Metal de Celdas ":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Desviacion Acidez":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Silicio Metal Celdas":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Desviacion Nm":
                    $variableDB2 = 'voltaje'; //falta ubicarlo en BD
                break;
                
                case "Frecuencia Desnatado":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Desviacion Nb":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Celdas Conectadas":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Frecuencia Efectos Anodicos ":
                    $variableDB2 = 'voltaje'; //falta ubicarlo en BD
                break;
                
                case "% CaF2 en el baño electrolitico":
                    $variableDB2 = 'voltaje';//falta ubicarlo en BD
                break;

            }
        } 
            if($celda1 != $celda2){
                if( $calculo == 'Promedio'){
                    if ($rangoOp1 != '' AND $rangoOp2 != '' AND $operador1 == '' ) {
                        $result = DB::connection('reduccion')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                            ->groupBy('dia')
                            ->having('dia', '>=', $fecha1)
                            ->select('dia', DB::raw('AVG('.$variableDB.') as '.$variableDB))
                            ->get();
                            $datatable = Datatables::of($result)->make();
    
                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                    $result2 = DB::connection('reduccion')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('AVG('.$variableDB2.') as '.$variableDB2))
                                            ->get();
    
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('AVG('.$variableDB2.') as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                    $result2 = DB::connection('reduccion')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('AVG('.$variableDB2.') as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();
    
                                }
                            }
    
                            return response()->json(['datos' => $result,
                                                     'variable'=> $variable,
                                                     'varKey'=> $variableDB,
                                                     'banda1' => $banda1,
                                                     'banda2' => $banda2,
                                                     'miny' => $min, 
                                                     'maxy' => $max,
                                                     'ylabel'=> $ylabel,
                                                     'xlabel'=> $xlabel,
                                                     'datatable' => $datatable,
    
                                                     'datosVar2' => $result2,
                                                     'variableVar2'=> $variable2,
                                                     'varKeyVar2'=> $variableDB2,
                                                     'banda1Var2' => $banda1Var2,
                                                     'banda2Var2' => $banda2Var2,
                                                     'minyVar2' => $minVar2, 
                                                     'maxyVar2' => $maxVar2,
                                                     'ylabelVar2'=> $ylabelVar2,
                                                     'xlabelVar2'=> $xlabelVar2,
                                                     'datatableVar2' => $datatableVar2  ]);
                    }elseif ($rangoOp1 != '' AND $rangoOp2 == '' AND $operador1 != '' ){
                            $result = DB::connection('reduccion')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('AVG('.$variableDB.') as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('AVG('.$variableDB2.') as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                            $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('AVG('.$variableDB2.') as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('AVG('.$variableDB2.') as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
    
                                    }
                                }
                                return response()->json(['datos' => $result,
                                                        'variable'=> $variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        
                                                        'datosVar2' => $result2,
                                                        'variableVar2'=> $variable2,
                                                        'varKeyVar2'=> $variableDB2,
                                                        'banda1Var2' => $banda1Var2,
                                                        'banda2Var2' => $banda2Var2,
                                                        'minyVar2' => $minVar2, 
                                                        'maxyVar2' => $maxVar2,
                                                        'ylabelVar2'=> $ylabelVar2,
                                                        'xlabelVar2'=> $xlabelVar2,
                                                        'datatableVar2' => $datatableVar2]);
                    }elseif (($rangoOp1 == '' AND $rangoOp2 == '' AND $operador1 == '' )) {
                        $result = DB::connection('reduccion')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('AVG('.$variableDB.') as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('AVG('.$variableDB2.') as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                            $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('AVG('.$variableDB2.') as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('AVG('.$variableDB2.') as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
    
                                    }
                                }
    
                                return response()->json(['datos' => $result,
                                                        'variable'=> $variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        
                                                        'datosVar2' => $result2,
                                                        'variableVar2'=> $variable2,
                                                        'varKeyVar2'=> $variableDB2,
                                                        'banda1Var2' => $banda1Var2,
                                                        'banda2Var2' => $banda2Var2,
                                                        'minyVar2' => $minVar2, 
                                                        'maxyVar2' => $maxVar2,
                                                        'ylabelVar2'=> $ylabelVar2,
                                                        'xlabelVar2'=> $xlabelVar2,
                                                        'datatableVar2' => $datatableVar2]);
    
                        }
                    }

                elseif ($calculo == 'Desviacion estandar') {
                    if ($rangoOp1 != '' AND $rangoOp2 != '' AND $operador1 == '' ) {
                        $result = DB::connection('reduccion')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                            ->groupBy('dia')
                            ->having('dia', '>=', $fecha1)
                            ->select('dia', DB::raw('STDDEV('.$variableDB.') as '.$variableDB))
                            ->get();
                            $datatable = Datatables::of($result)->make();
    
                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                    $result2 = DB::connection('reduccion')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('STDDEV('.$variableDB2.') as '.$variableDB2))
                                            ->get();
    
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('STDDEV('.$variableDB2.') as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                    $result2 = DB::connection('reduccion')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('STDDEV('.$variableDB2.') as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();
    
                                }
                            }
    
                            return response()->json(['datos' => $result,
                                                     'variable'=> $variable,
                                                     'varKey'=> $variableDB,
                                                     'banda1' => $banda1,
                                                     'banda2' => $banda2,
                                                     'miny' => $min, 
                                                     'maxy' => $max,
                                                     'ylabel'=> $ylabel,
                                                     'xlabel'=> $xlabel,
                                                     'datatable' => $datatable,
    
                                                     'datosVar2' => $result2,
                                                     'variableVar2'=> $variable2,
                                                     'varKeyVar2'=> $variableDB2,
                                                     'banda1Var2' => $banda1Var2,
                                                     'banda2Var2' => $banda2Var2,
                                                     'minyVar2' => $minVar2, 
                                                     'maxyVar2' => $maxVar2,
                                                     'ylabelVar2'=> $ylabelVar2,
                                                     'xlabelVar2'=> $xlabelVar2,
                                                     'datatableVar2' => $datatableVar2  ]);
                    }elseif ($rangoOp1 != '' AND $rangoOp2 == '' AND $operador1 != '' ){
                            $result = DB::connection('reduccion')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('STDDEV('.$variableDB.') as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('STDDEV('.$variableDB2.') as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                            $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('STDDEV('.$variableDB2.') as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('STDDEV('.$variableDB2.') as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
    
                                    }
                                }
                                return response()->json(['datos' => $result,
                                                        'variable'=> $variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        
                                                        'datosVar2' => $result2,
                                                        'variableVar2'=> $variable2,
                                                        'varKeyVar2'=> $variableDB2,
                                                        'banda1Var2' => $banda1Var2,
                                                        'banda2Var2' => $banda2Var2,
                                                        'minyVar2' => $minVar2, 
                                                        'maxyVar2' => $maxVar2,
                                                        'ylabelVar2'=> $ylabelVar2,
                                                        'xlabelVar2'=> $xlabelVar2,
                                                        'datatableVar2' => $datatableVar2]);
                    }elseif (($rangoOp1 == '' AND $rangoOp2 == '' AND $operador1 == '' )) {
                        $result = DB::connection('reduccion')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('STDDEV('.$variableDB.') as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('STDDEV('.$variableDB2.') as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                            $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('STDDEV('.$variableDB2.') as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('STDDEV('.$variableDB2.') as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
    
                                    }
                                }
    
                                return response()->json(['datos' => $result,
                                                        'variable'=> $variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        
                                                        'datosVar2' => $result2,
                                                        'variableVar2'=> $variable2,
                                                        'varKeyVar2'=> $variableDB2,
                                                        'banda1Var2' => $banda1Var2,
                                                        'banda2Var2' => $banda2Var2,
                                                        'minyVar2' => $minVar2, 
                                                        'maxyVar2' => $maxVar2,
                                                        'ylabelVar2'=> $ylabelVar2,
                                                        'xlabelVar2'=> $xlabelVar2,
                                                        'datatableVar2' => $datatableVar2]);
    
                        }
                    }  
                

            }else{
                    if ($rangoOp1 != '' AND $rangoOp2 != '' AND $operador1 == '' ) {
                        $result = DB::connection('reduccion')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                            ->select('celda','dia',$variableDB) 
                            ->get();
                            $datatable = Datatables::of($result)->make();

                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                    $result2 = DB::connection('reduccion')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();

                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                    $result2 = DB::connection('reduccion')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();

                                }
                            }

                            return response()->json(['datos' => $result,
                                                    'variable'=> $variable,
                                                    'varKey'=> $variableDB,
                                                    'banda1' => $banda1,
                                                    'banda2' => $banda2,
                                                    'miny' => $min, 
                                                    'maxy' => $max,
                                                    'ylabel'=> $ylabel,
                                                    'xlabel'=> $xlabel,
                                                    'datatable' => $datatable,

                                                    'datosVar2' => $result2,
                                                    'variableVar2'=> $variable2,
                                                    'varKeyVar2'=> $variableDB2,
                                                    'banda1Var2' => $banda1Var2,
                                                    'banda2Var2' => $banda2Var2,
                                                    'minyVar2' => $minVar2, 
                                                    'maxyVar2' => $maxVar2,
                                                    'ylabelVar2'=> $ylabelVar2,
                                                    'xlabelVar2'=> $xlabelVar2,
                                                    'datatableVar2' => $datatableVar2  ]);
                    }elseif ($rangoOp1 != '' AND $rangoOp2 == '' AND $operador1 != '' ){
                            $result = DB::connection('reduccion')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                            $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                    }
                                }
                                return response()->json(['datos' => $result,
                                                        'variable'=> $variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        
                                                        'datosVar2' => $result2,
                                                        'variableVar2'=> $variable2,
                                                        'varKeyVar2'=> $variableDB2,
                                                        'banda1Var2' => $banda1Var2,
                                                        'banda2Var2' => $banda2Var2,
                                                        'minyVar2' => $minVar2, 
                                                        'maxyVar2' => $maxVar2,
                                                        'ylabelVar2'=> $ylabelVar2,
                                                        'xlabelVar2'=> $xlabelVar2,
                                                        'datatableVar2' => $datatableVar2]);
                    }elseif (($rangoOp1 == '' AND $rangoOp2 == '' AND $operador1 == '' )) {
                    $result = DB::connection('reduccion')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->select('celda','dia',$variableDB) 
                            ->get();
                            $datatable = Datatables::of($result)->make();
                            if($variable2 != ''){
                                //segunda variable
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                    $result2 = DB::connection('reduccion')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();

                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                    $result2 = DB::connection('reduccion')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();

                                }
                            }

                            return response()->json(['datos' => $result,
                                                    'variable'=> $variable,
                                                    'varKey'=> $variableDB,
                                                    'banda1' => $banda1,
                                                    'banda2' => $banda2,
                                                    'miny' => $min, 
                                                    'maxy' => $max,
                                                    'ylabel'=> $ylabel,
                                                    'xlabel'=> $xlabel,
                                                    'datatable' => $datatable,
                                                    
                                                    'datosVar2' => $result2,
                                                    'variableVar2'=> $variable2,
                                                    'varKeyVar2'=> $variableDB2,
                                                    'banda1Var2' => $banda1Var2,
                                                    'banda2Var2' => $banda2Var2,
                                                    'minyVar2' => $minVar2, 
                                                    'maxyVar2' => $maxVar2,
                                                    'ylabelVar2'=> $ylabelVar2,
                                                    'xlabelVar2'=> $xlabelVar2,
                                                    'datatableVar2' => $datatableVar2]);

                    }
                }
            
                /* //segunda variable
                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                ->select('celda','dia',$variableDB2) 
                                ->get();

                                $datatableVar2 = Datatables::of($result2)->make();
                                
                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                            $result2 = DB::connection('reduccion')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                ->select('celda','dia',$variableDB2) 
                                ->get();
                                $datatableVar2 = Datatables::of($result2)->make();
                                
                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                        $result2 = DB::connection('reduccion')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->select('celda','dia',$variableDB2) 
                                ->get();
                                $datatableVar2 = Datatables::of($result2)->make();

                    } 
                */
        }
    }
}
