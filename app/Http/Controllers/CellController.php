<?php

namespace App\Http\Controllers;

use App\Celda;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       
        return view('cell.index');
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
     * @param  \App\Cell  $cell
     * @return \Illuminate\Http\Response
     */
    public function show(Cell $cell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cell  $cell
     * @return \Illuminate\Http\Response
     */
    public function edit(Cell $cell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cell  $cell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cell $cell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cell  $cell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cell $cell)
    {
        //
    }

    public function CellDataChart()
    {
        $result = DB::connection('reduccion')->table('diariocelda')
        ->whereBetween('celda', [1000,1001])
        ->whereYear('dia','2018')
        ->whereMonth('dia','05')
        ->get();
        return response()->json($result);
    
    }
    
    public function CellDataTable(Request $request){
        
        if ($request->isMethod('get')) {
           $celdas = DB::connection('reduccion')->table('diariocelda')
        ->whereBetween('celda', [1001 ,1002])
        ->whereYear('dia', '2018')
        ->whereMonth('dia', '05')
        ->get();
        return Datatables::of($celdas)->make();
        }else{
            list( $fecha1, $fecha2) = explode(' - ', $request->input('0.value'));
            $celda1 = $request->input('1.value');
            $celda2 = $request->input('2.value');
            $variableDB = $request->input('3.value');
            $min = $request->input('4.value');
            $max = $request->input('5.value');

            switch($variableDB){
                case "Voltaje":
                    $variableDB = 'voltaje';
                    $ylabel = 'V (voltios)'; 
                    $xlabel = 'fecha';
                    $banda1 = 4.8;
                    if($min == ''){
                        $min = 4.50;
                    } 
                    if($max == ''){
                        $max = 5.18;
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
                
                case "Alimentacion de alumina":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Temperatura de baño":
                    $variableDB = 'temperatura';
                break;
                
                 case "Duracion del tracking":
                    $variableDB = 'duracionTk';
                break;
                
                case "Acidez de baño":
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
                
                case "Corriente de Linea":
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
                
                case "Anodos B/O cambio Normal":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Nivel de Baño":
                    $variableDB = 'nivelDeBanio';
                break;
                
                case "Anodos Bimetalicos":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "Criolita Neta":
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
                
                case "Hierro Metal de Celdas":
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
                
                case "Frecuencia Efectos Anodicos":
                    $variableDB = 'voltaje'; //falta ubicarlo en BD
                break;
                
                case "% CaF2 en el baño electrolitico":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;

            }
            
            $celdas = DB::connection('reduccion')->table('diariocelda')
                        ->whereBetween('celda', [$celda1,$celda2])
                        ->whereBetween('dia', [$fecha1,$fecha2])  
                        ->select('celda','dia',$variableDB) 
                        ->get();
                        return Datatables::of($celdas)->make();; 
                        

        }
        /*
 
        elseif ($request->isMethod('get')) {
         }
       */
    }

}
