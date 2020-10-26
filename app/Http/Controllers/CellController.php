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

    public function CellDataChartTable(Request $request)
    {
                
            list( $fecha1, $fecha2) = explode(' - ', $request->input('rangoFecha'));
            $celda1 = $request->input('celda1');
            $celda2 = $request->input('celda2');
            $calculo = $request->input('calculo');
            $variable = $request->input('variable');
            $variableDB = $request->input('variable');
            $operador1 = $request->input('operador1');

            $varFiltro = $request->input('varFiltro') ; 
            $rangoVF1 = $request->input('rangoVF1'); 
            $rangoVF2 = $request->input('rangoVF2') ; 
            $operadorVF = $request->input('operadorVF');

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
            if($varFiltro != "" ){
                switch($varFiltro){
                    case "Voltaje":
                        $varFiltro = 'voltaje';
                    break;
                    
                    case "Efectos anodicos":
                        $varFiltro = 'numeroEA';
                        
                    break;// frecuencia de efectos anodicos falta encontrar en bd, segun maita
                    
                    case "Desviación de Resistencia":
                        $varFiltro = 'resistencia';
                        
                    break;
                    
                    case "Alimentacion de alumina":
                        $varFiltro = 'golpesAlumina';
                        
                    break;
                    
                    case "Temperatura de baño":
                        $varFiltro = 'temperatura';
                        
                    break;
                    
                    case "Duracion de Tracking":
                        $varFiltro = 'duracionTk';
                       
                    break;
                    
                    case "Acidez de Baño":
                        $varFiltro = 'acidez';
                      
                    break;
                    
                    case "Dump Size Alumina":
                        $varFiltro = 'voltaje';
                        
                    break;
                    
                    case "Consumo AlF3":
                        $varFiltro = 'voltaje';
                        
                    break;
                    
                    case "Track CD":
                        $varFiltro = 'numeroTk';
                       
                    break; //segun maita
                    
                    case "Consumo AlF3 Manual":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "VMAX del Efecto Anodico":
                        $varFiltro = 'vMaxEA';
                    break;
                    
                    case "Eficiencia de Trasegado (Eficiencia de corriente)":
                        $varFiltro = 'voltaje';
                        
                    break;
                    
                    case "Duracion de Efecto anódico":
                        $varFiltro = 'duracionEA';
                    break;
                    
                    case "Nivel de Metal":
                        $varFiltro = 'nivelDeMetal';
                        
                    break;
                    
                    case "Corriente de Linea ":
                        $varFiltro = 'voltaje';
                        
                    break;
                    
                    case "Potencia nominal":
                        $varFiltro = 'voltaje';
                        
                    break;
                    
                    case "(BO+RAJ+BIM+Tetas)":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "Potencia Neta":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "Anodos B/O  cambio Normal":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "Nivel de Baño":
                        $varFiltro = 'nivelDeBanio';
                        
                    break;
                    
                    case "Anodos Bimetalicos":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "Criolita Neta ":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "Criolita de Arranque":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "Anodos B/A":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "Baño Fase Densa":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "Desviacion de Temperatura":
                        $varFiltro = 'voltaje';
                       
                    break;
                    
                    case "Hierro Metal de Celdas ":
                        $varFiltro = 'voltaje';
                       
                    break;
                    
                    case "Desviacion Acidez":
                        $varFiltro = 'voltaje';
                       
                    break;
                    
                    case "Silicio Metal Celdas":
                        $varFiltro = 'voltaje';
                       
                    break;
                    
                    case "Desviacion Nm":
                        $varFiltro = 'voltaje'; //falta ubicarlo en BD
                    break;
                    
                    case "Frecuencia Desnatado":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "Desviacion Nb":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "Celdas Conectadas":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "Frecuencia Efectos Anodicos ":
                        $varFiltro = 'voltaje';
                        
                    break;
                    
                    case "% CaF2 en el baño electrolitico":
                        $varFiltro = 'voltaje';//falta ubicarlo en BD
                    break;

                    case "Edad":
                        $varFiltro = 'edad';//falta ubicarlo en BD
                    break;
    
    
                }
                switch ($operadorVF) {
                    case 'mayor':
                        $operadorVF = '>';
                        break;
                    case 'menor':
                        $operadorVF = '<';
                        break;
                    case 'mayorigual':
                        $operadorVF = '>=';
                        break;
                    case 'menorigual':
                        $operadorVF = '<=';
                        break;       
                }
            } 
            

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
                    $ylabel = 'EA'; 
                    $xlabel = 'fecha';
                    $banda1= 0.4;
                    $banda2= null;
                    if($min == ''){
                        $min = 0;
                    } 
                    if($max == ''){
                        $max = 4;
                    }  
                break;// frecuencia de efectos anodicos falta encontrar en bd, segun maita
                
                case "Desviación de Resistencia":
                    $variableDB = 'resistencia';
                    $ylabel = 'Microhomnio'; 
                    $xlabel = 'fecha';
                    $banda1= 0.06;                    ;
                    $banda2= null;
                    if($min == ''){
                        $min = 0;
                    } 
                    if($max == ''){
                        $max = 1;
                    }  
                break;
                
                case "Alimentacion de alumina":
                    $variableDB = 'golpesAlumina';
                    $ylabel = 'numero'; 
                    $xlabel = 'fecha';
                    $banda1= 1200;                    ;
                    $banda2= 1300; // segun maita
                    if($min == ''){
                        $min =800;
                    } 
                    if($max == ''){
                        $max = 1350;
                    }  //falta ubicarlo en BD
                break;
                
                case "Temperatura de baño":
                    $variableDB = 'temperatura';
                    $ylabel = '°C'; 
                    $xlabel = 'fecha';
                    $banda1= 960;                    ;
                    $banda2= 965;// segun maita
                    if($min == ''){
                        $min =950;
                    } 
                    if($max == ''){
                        $max = 990;
                    }  
                break;
                
                case "Duracion de Tracking":
                    $variableDB = 'duracionTk';
                    $ylabel = 'h'; 
                    $xlabel = 'fecha';
                    $banda1= 0.7;                    ;
                    $banda2= 0.8; //segun maita
                    if($min == ''){
                        $min =0.5;
                    } 
                    if($max == ''){
                        $max = 1.9;
                    } 
                break;
                
                case "Acidez de Bano":
                    $variableDB = 'acidez';
                    // segun maita
                    $ylabel = '%AlF3'; 
                    $xlabel = 'fecha';
                    $banda1= 10.5;                    ;
                    $banda2= 11;
                    if($min == ''){
                        $min =8;
                    } 
                    if($max == ''){
                        $max = 13.5;
                    } //segun maita
                break;
                
                case "Dump Size Alumina":
                    $variableDB = 'voltaje';
                    $ylabel = 'KG/golpe'; 
                    $xlabel = 'fecha';
                    $banda1= null;                    ;
                    $banda2= 2.4;
                    if($min == ''){
                        $min =1.7;
                    } 
                    if($max == ''){
                        $max = 3.2;
                    } //falta ubicarlo en BD
                break;
                
                case "Consumo AlF3":
                    $variableDB = 'voltaje';
                    $ylabel = 'KG/CD'; 
                    $xlabel = 'fecha';
                    $banda1= 50;                    ;
                    $banda2= 70;
                    if($min == ''){
                        $min =0;
                    } 
                    if($max == ''){
                        $max = 170;
                    } //falta ubicarlo en BD segun maita
                break;
                
                case "Track CD":
                    $variableDB = 'numeroTk';
                    $ylabel = 'KG/CD'; 
                    $xlabel = 'fecha';
                    $banda1= 1;                    ;
                    $banda2= 1.3;
                    if($min == ''){
                        $min =0;
                    } 
                    if($max == ''){
                        $max = 2.5;
                    }
                break; //segun maita
                
                case "Consumo AlF3 Manual":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;
                
                case "VMAX del Efecto Anodico":
                    $variableDB = 'vMaxEA';
                break;
                
                case "Eficiencia de Trasegado (Eficiencia de corriente)":
                    $variableDB = 'voltaje';
                    $ylabel = '%'; 
                    $xlabel = 'fecha';
                    $banda1= 90;                    ;
                    $banda2= 94;
                    if($min == ''){
                        $min =50;
                    } 
                    if($max == ''){
                        $max = 110;
                    }//falta ubicarlo en BD segun maita
                break;
                
                case "Duracion de Efecto anódico":
                    $variableDB = 'duracionEA';
                break;
                
                case "Nivel de Metal":
                    $variableDB = 'nivelDeMetal';
                    $ylabel = 'cm'; 
                    $xlabel = 'fecha';
                    $banda1= 20;                    ;
                    $banda2= 22;
                    if($min == ''){
                        $min =18;
                    } 
                    if($max == ''){
                        $max = 27;
                    }
                break;
                
                case "Corriente de Linea ":
                    $variableDB = 'voltaje';
                    $ylabel = 'kA'; 
                    $xlabel = 'fecha';
                    $banda1= null;                    ;
                    $banda2= 219; //segun maita
                    if($min == ''){
                        $min =180;
                    } 
                    if($max == ''){
                        $max = 240;
                    }//falta ubicarlo en BD
                break;
                
                case "Potencia nominal":
                    $variableDB = 'voltaje';
                    $ylabel = 'KG/CD'; 
                    $xlabel = 'fecha';
                    $banda1= 980;                    ;
                    $banda2= 1000;
                    if($min == ''){
                        $min =920;
                    } 
                    if($max == ''){
                        $max = 1120;
                    }//falta ubicarlo en BD
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
                    $ylabel = 'cm'; 
                    $xlabel = 'fecha';
                    $banda1= 20;                    ;
                    $banda2= 23;
                    if($min == ''){
                        $min =15;
                    } 
                    if($max == ''){
                        $max = 27;
                    }
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
                    $variableDB = 'voltaje';
                    $ylabel = '°C'; 
                    $xlabel = 'fecha';
                    $banda1= null;                    ;
                    $banda2= 10;
                    if($min == ''){
                        $min =0;
                    } 
                    if($max == ''){
                        $max = 25;
                    }//falta ubicarlo en BD
                break;
                
                case "Hierro Metal de Celdas ":
                    $variableDB = 'voltaje';
                    $ylabel = '%'; 
                    $xlabel = 'fecha';
                    $banda1= null;                    ;
                    $banda2= 0.2;
                    if($min == ''){
                        $min =0;
                    } 
                    if($max == ''){
                        $max = 1.1;
                    }//falta ubicarlo en BD, segun maita
                break;
                
                case "Desviacion Acidez":
                    $variableDB = 'voltaje';
                    $ylabel = '%'; 
                    $xlabel = 'fecha';
                    $banda1= null;                    ;
                    $banda2= 1;
                    if($min == ''){
                        $min =0;
                    } 
                    if($max == ''){
                        $max = 4;
                    }//falta ubicarlo en BD
                break;
                
                case "Silicio Metal Celdas":
                    $variableDB = 'voltaje';
                    $ylabel = '%'; 
                    $xlabel = 'fecha';
                    $banda1= 0.05;                    ;
                    $banda2= 0.08;
                    if($min == ''){
                        $min =0;
                    } 
                    if($max == ''){
                        $max = 0.45;
                    }//falta ubicarlo en BD
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
                    $variableDB = 'voltaje';
                    $ylabel = 'EA/CD'; 
                    $xlabel = 'fecha';
                    $banda1= null;                    ;
                    $banda2= 0.15; //segun maita
                    if($min == ''){
                        $min =1;
                    } 
                    if($max == ''){
                        $max = 1.2;
                    } //falta ubicarlo en BD
                break;
                
                case "% CaF2 en el baño electrolitico":
                    $variableDB = 'voltaje';//falta ubicarlo en BD
                break;

            }
            
            $variable2 = $request->input('variable2');
            $variableDB2 = $request->input('variable2');
            $rangoOp1Var2 = $request->input('var2Rango1');
            $rangoOp2Var2 = $request->input('var2Rango2');

            $banda1Var2 =  $request->input('banda1Var2');
            $banda2Var2 = $request->input('banda2Var2');
            $minVar2 = null;
            $maxVar2 = null;
            $ylabelVar2 = null;
            $xlabelVar2 = null;
            $result = null;
            $result2 = null;
            $datatableVar2 = null;
            
            if($variable2 != "" ){
                switch($variableDB2){
                    case "Voltaje":
                        $variableDB2 = 'voltaje';
                        $ylabelVar2 = 'V (voltios)'; 
                        $xlabelVar2 = 'fecha';

                        if($banda1Var2  == ''){
                            $banda1Var2  = 4.55 ;
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
                        $ylabelVar2 = 'EA'; 
                        $xlabelVar2 = 'fecha';
                        
                        $banda2Var2= null;
                        if($banda1Var2  == ''){
                            $banda1Var2 = 0.4;
                        } 
                        if($minVar2 == ''){
                            $minVar2 = 0;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 4;
                        }  
                    break;// frecuencia de efectos anodicos falta encontrar en bd, segun maita
                    
                    case "Desviación de Resistencia":
                        $variableDB2 = 'resistencia';
                        $ylabelVar2 = 'Microhomnio'; 
                        $xlabelVar2 = 'fecha';
                                          ;
                        $banda2Var2= null;
                        if($banda1Var2  == ''){
                           $banda1Var2 = 0.06;  
                        } 
                        
                        if($minVar2 == ''){
                            $minVar2 = 0;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 1;
                        }  
                    break;
                    
                    case "Alimentacion de alumina":
                        $variableDB2 = 'golpesAlumina';
                        $ylabelVar2 = 'numero'; 
                        $xlabelVar2 = 'fecha';
                                          ;
                        
                        if($banda1Var2  == ''){
                             $banda1Var2 = 1200; 
                        } 
                        if($banda2Var2 == ''){
                            $banda2Var2= 1300; // segun maita
                        }   
                        if($minVar2 == ''){
                            $minVar2 =800;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 1350;
                        }  //falta ubicarlo en BD
                    break;
                    
                    case "Temperatura de baño":
                        $variableDB2 = 'temperatura';
                        $ylabelVar2 = '°C'; 
                        $xlabelVar2 = 'fecha';
                                      ;
                        
                        if($banda1Var2  == ''){
                            $banda1Var2 = 960;     
                        } 
                        if($banda2Var2 == ''){
                           $banda2Var2= 965;// segun maita
                        }   
                        if($minVar2 == ''){
                            $minVar2 =950;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 990;
                        }  
                    break;
                    
                    case "Duracion de Tracking":
                        $variableDB2 = 'duracionTk';
                        $ylabelVar2 = 'h'; 
                        $xlabelVar2 = 'fecha';
                       
                        if($banda1Var2  == ''){
                           $banda1Var2 = 0.7;     
                        } 
                        if($banda2Var2 == ''){
                           $banda2Var2= 0.8; //segun maita
                        }   
                        if($minVar2 == ''){
                            $minVar2 =0.5;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 1.9;
                        } 
                    break;
                    
                    case "Acidez de Baño":
                        $variableDB2 = 'acidez';
                        // segun maita
                        $ylabelVar2 = '%AlF3'; 
                        $xlabelVar2 = 'fecha';
                                        
                        
                        if($banda1Var2  == ''){
                            $banda1Var2 = 10.5;   
                        } 
                        if($banda2Var2 == ''){
                            $banda2Var2= 11;
                        }   
                        if($minVar2 == ''){
                            $minVar2 =8;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 13.5;
                        } //segun maita
                    break;
                    
                    case "Dump Size Alumina":
                        $variableDB2 = 'voltaje';
                        $ylabelVar2 = 'KG/golpe'; 
                        $xlabelVar2 = 'fecha';
                        $banda1Var2 = null;                    ;
                        
                        if($banda2Var2 == ''){
                          $banda2Var2= 2.4;
                        }   
                        if($minVar2 == ''){
                            $minVar2 =1.7;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 3.2;
                        } //falta ubicarlo en BD
                    break;
                    
                    case "Consumo AlF3":
                        $variableDB2 = 'voltaje';
                        $ylabelVar2 = 'KG/CD'; 
                        $xlabelVar2 = 'fecha';
                                       
                        if($banda1Var2  == ''){
                            $banda1Var2 = 50;   
                        } 
                        if($banda2Var2 == ''){
                          $banda2Var2= 70;
                        }   
                        if($minVar2 == ''){
                            $minVar2 =0;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 170;
                        } //falta ubicarlo en BD segun maita
                    break;
                    
                    case "Track CD":
                        $variableDB2 = 'numeroTk';
                        $ylabelVar2 = 'KG/CD'; 
                        $xlabelVar2 = 'fecha';
                                  
                       
                        if($banda1Var2  == ''){
                            $banda1Var2 = 1;      
                        } 
                        if($banda2Var2 == ''){
                            $banda2Var2= 1.3;
                        }   
                        if($minVar2 == ''){
                            $minVar2 =0;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 2.5;
                        }
                    break; //segun maita
                    
                    case "Consumo AlF3 Manual":
                        $variableDB2 = 'voltaje';//falta ubicarlo en BD
                    break;
                    
                    case "VMAX del Efecto Anodico":
                        $variableDB2 = 'vMaxEA';
                    break;
                    
                    case "Eficiencia de Trasegado (Eficiencia de corriente)":
                        $variableDB2 = 'voltaje';
                        $ylabelVar2 = '%'; 
                        $xlabelVar2 = 'fecha';
                                   
                      
                        if($banda1Var2  == ''){
                             $banda1Var2 = 90;       
                        } 
                        if($banda2Var2 == ''){
                             $banda2Var2= 94;
                        }   
                        if($minVar2 == ''){
                            $minVar2 =50;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 110;
                        }//falta ubicarlo en BD segun maita
                    break;
                    
                    case "Duracion de Efecto anódico":
                        $variableDB2 = 'duracionEA';
                    break;
                    
                    case "Nivel de Metal":
                        $variableDB2 = 'nivelDeMetal';
                        $ylabelVar2 = 'cm'; 
                        $xlabelVar2 = 'fecha';

                        if($banda1Var2  == ''){
                            $banda1Var2 = 20;            
                        } 
                        if($banda2Var2 == ''){
                           $banda2Var2= 22;
                        }   
                        if($minVar2 == ''){
                            $minVar2 =18;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 27;
                        }
                    break;
                    
                    case "Corriente de Linea ":
                        $variableDB2 = 'voltaje';
                        $ylabelVar2 = 'kA'; 
                        $xlabelVar2 = 'fecha';
                               
                        if($banda2Var2 == ''){
                           $banda2Var2= 219; //segun maita
                        }   
                        if($minVar2 == ''){
                            $minVar2 =180;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 240;
                        }//falta ubicarlo en BD
                    break;
                    
                    case "Potencia nominal":
                        $variableDB2 = 'voltaje';
                        $ylabelVar2 = 'KG/CD'; 
                        $xlabelVar2 = 'fecha';
                     
                        if($banda1Var2  == ''){
                            $banda1Var2 = 980;         
                        } 
                        if($banda2Var2 == ''){
                             $banda2Var2= 1000;
                        }   
                        if($minVar2 == ''){
                            $minVar2 =920;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 1120;
                        }//falta ubicarlo en BD
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
                        $ylabelVar2 = 'cm'; 
                        $xlabelVar2 = 'fecha';
                                         
                        if($banda1Var2  == ''){
                         $banda1Var2 = 20;  
                        } 
                        if($banda2Var2 == ''){
                           $banda2Var2= 23;
                        }   
                        if($minVar2 == ''){
                            $minVar2 =15;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 27;
                        }
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
                        $variableDB2 = 'voltaje';
                        $ylabelVar2 = '°C'; 
                        $xlabelVar2 = 'fecha';
                        $banda1Var2 = null;                  
                    
                        if($banda2Var2 == ''){
                            $banda2Var2= 10;
                        }   
                        if($minVar2 == ''){
                            $minVar2 =0;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 25;
                        }//falta ubicarlo en BD
                    break;
                    
                    case "Hierro Metal de Celdas ":
                        $variableDB2 = 'voltaje';
                        $ylabelVar2 = '%'; 
                        $xlabelVar2 = 'fecha';
                        $banda1Var2 = null;               
                      
                        if($banda2Var2 == ''){
                             $banda2Var2= 0.2; 
                        }   
                        if($minVar2 == ''){
                            $minVar2 =0;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 1.1;
                        }//falta ubicarlo en BD, segun maita
                    break;
                    
                    case "Desviacion Acidez":
                        $variableDB2 = 'voltaje';
                        $ylabelVar2 = '%'; 
                        $xlabelVar2 = 'fecha';
                        $banda1Var2 = null;                
                        
                        if($banda2Var2 == ''){
                            $banda2Var2= 1;
                    
                        }   
                        if($minVar2 == ''){
                            $minVar2 =0;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 4;
                        }//falta ubicarlo en BD
                    break;
                    
                    case "Silicio Metal Celdas":
                        $variableDB2 = 'voltaje';
                        $ylabelVar2 = '%'; 
                        $xlabelVar2 = 'fecha';
                                           
                       
                        if($banda1Var2  == ''){
                            $banda1Var2 = 0.05;
                        } 
                        if($banda2Var2 == ''){
                            $banda2Var2= 0.08;
                        }   
                        if($minVar2 == ''){
                            $minVar2 =0;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 0.45;
                        }//falta ubicarlo en BD
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
                        $variableDB2 = 'voltaje';
                        $ylabelVar2 = 'EA/CD'; 
                        $xlabelVar2 = 'fecha';
                        $banda1Var2 = null;               
                       
                    
                        if($banda2Var2 == ''){
                            $banda2Var2= 0.15; //segun maita 
                        }   
                        if($minVar2 == ''){
                            $minVar2 =1;
                        } 
                        if($maxVar2 == ''){
                            $maxVar2 = 1.2;
                        } //falta ubicarlo en BD
                    break;
                    
                    case "% CaF2 en el baño electrolitico":
                        $variableDB2 = 'voltaje';//falta ubicarlo en BD
                    break;


                }
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
            } 
            if($celda1 != $celda2){
                if( $calculo == 'Promedio'){
                    
                    if ($rangoOp1 != '' AND $rangoOp2 != '' AND $operador1 == '' ) {
                        if ($varFiltro !='' ) {
                            if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
        
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
        
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2 ,
                                                        
                                                        'calculo' => $calculo]);
                            }elseif ($rangoVF1 != '' AND $rangoVF2 == '' AND $operadorVF != '' ) {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
        
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
        
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2 ,
                                                        
                                                        'calculo' => $calculo]);
                            }
                        }else{
                            $result = DB::connection('reduccionl5')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                            ->groupBy('dia')
                            ->having('dia', '>=', $fecha1)
                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                            ->get();
                            $datatable = Datatables::of($result)->make();
    
                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
    
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                     'datatableVar2' => $datatableVar2 ,
                                                     
                                                     'calculo' => $calculo]);
                        }
                            
                    }elseif ($rangoOp1 != '' AND $rangoOp2 == '' AND $operador1 != '' ){
                        if ($varFiltro !='' ) {
                            if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]);
                            }elseif ($rangoVF1 != '' AND $rangoVF2 == '' AND $operadorVF != '' ) {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]);
                            }
                        
                        }else{
                            $result = DB::connection('reduccionl5')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->where($variableDB, $operador1 , $rangoOp1 ) 
                            ->groupBy('dia')
                            ->having('dia', '>=', $fecha1)
                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                            ->get();
                            $datatable = Datatables::of($result)->make();
                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();

                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                    'datatableVar2' => $datatableVar2,
                                                    
                                                    'calculo' => $calculo]);
                        }      
                                
                    }elseif (($rangoOp1 == '' AND $rangoOp2 == '' AND $operador1 == '' )) {
                        if ($varFiltro !='' ) {
                            if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') {  
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]);
                            }elseif ($rangoVF1 != '' AND $rangoVF2 == '' AND $operadorVF != '' ) { 
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]); $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]);
                            }
                        
                        }else{
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]);
                        }   
                    }
                }

                elseif ($calculo == 'Desviacion estandar') {
                    
                    if ($rangoOp1 != '' AND $rangoOp2 != '' AND $operador1 == '' ) {
                        if ($varFiltro !='' ) {
                            if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
        
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
        
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                        
                                                        'calculo' => $calculo  ]);
                            }elseif ($rangoVF1 != '' AND $rangoVF2 == '' AND $operadorVF != '' ) {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();

                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();

                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                        
                                                        'calculo' => $calculo  ]);
                            }
                        
                        }else{
                            $result = DB::connection('reduccionl5')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                            ->groupBy('dia')
                            ->having('dia', '>=', $fecha1)
                            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                            ->get();
                            $datatable = Datatables::of($result)->make();
    
                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                             $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
    
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                             $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                             $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                     'datatableVar2' => $datatableVar2,
                                                     
                                                     'calculo' => $calculo  ]);
                        }
                            
                    }elseif ($rangoOp1 != '' AND $rangoOp2 == '' AND $operador1 != '' ){
                        if ($varFiltro !='' ) {
                            if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') { 
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]);
                            }elseif ($rangoVF1 != '' AND $rangoVF2 == '' AND $operadorVF != '' ) {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]);
                            }
                        
                        }else{
                            $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]);
                        }
                                
                    }elseif (($rangoOp1 == '' AND $rangoOp2 == '' AND $operador1 == '' )) {
                        if ($varFiltro !='' ) {
                            if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') { 
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]);
                            }elseif ($rangoVF1 != '' AND $rangoVF2 == '' AND $operadorVF != '' ) {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]);
                            }
                        
                        }else{
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]);
                        }
                    }
                }  

                elseif ($calculo == 'Total') {
                    
                    if ($rangoOp1 != '' AND $rangoOp2 != '' AND $operador1 == '' ) {
                        if ($varFiltro !='' ) {
                            if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
        
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
        
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                            'datatableVar2' => $datatableVar2,
                                                        
                                                            'calculo' => $calculo  ]);
                            }elseif ($rangoVF1 != '' AND $rangoVF2 == '' AND $operadorVF != '' ) {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
        
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
        
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                            'datatableVar2' => $datatableVar2,
                                                        
                                                            'calculo' => $calculo  ]);
                            }
                        
                        }else{
                            $result = DB::connection('reduccionl5')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                            ->groupBy('dia')
                            ->having('dia', '>=', $fecha1)
                            ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                            ->get();
                            $datatable = Datatables::of($result)->make();
    
                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
    
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                    
                                                        'calculo' => $calculo  ]);
                        }
                            
                    }elseif ($rangoOp1 != '' AND $rangoOp2 == '' AND $operador1 != '' ){
                        if ($varFiltro !='' ) {
                            if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                    
                                                        'calculo' => $calculo]);
                            }elseif ($rangoVF1 != '' AND $rangoVF2 == '' AND $operadorVF != '' ) {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                    
                                                        'calculo' => $calculo]);
                            }
                        
                        }else{
                            $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                    
                                                        'calculo' => $calculo]);
                        }
                                
                    }elseif (($rangoOp1 == '' AND $rangoOp2 == '' AND $operador1 == '' )) {
                        if ($varFiltro !='' ) {
                            if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                    
                                                        'calculo' => $calculo]);
                            }elseif ($rangoVF1 != '' AND $rangoVF2 == '' AND $operadorVF != '' ) {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                    
                                                        'calculo' => $calculo]);
                            }
                        
                        }else{
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
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
                                                        'datatableVar2' => $datatableVar2,
                                                    
                                                        'calculo' => $calculo]);
    
                        }
                                
                        }
                }  
                

            }else{
                    if ($rangoOp1 != '' AND $rangoOp2 != '' AND $operador1 == '' ) {
                        if ($varFiltro !='' ) {
                           if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($result)->make();

                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
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
                                                        'datatableVar2' => $datatableVar2,
                                                        
                                                            'calculo' => '' ]);
                           }elseif ($rangoVF1 != '' AND $rangoVF2 == '' AND $operadorVF != '' ) {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($result)->make();

                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
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
                                                        'datatableVar2' => $datatableVar2,
                                                        
                                                            'calculo' => '' ]);
                           }
                        
                        }else{
                            $result = DB::connection('reduccionl5')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                            ->select('celda','dia',$variableDB) 
                            ->get();
                            $datatable = Datatables::of($result)->make();

                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();

                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                             $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
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
                                                    'datatableVar2' => $datatableVar2,
                                                    
                                                        'calculo' => '' ]);
                        }
                    }elseif ($rangoOp1 != '' AND $rangoOp2 == '' AND $operador1 != '' ){
                        if ($varFiltro !='' ) {
                            if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
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
                                                        'datatableVar2' => $datatableVar2,
                                                    
                                                        'calculo' => '']);
                            }elseif ($rangoVF1 != '' AND $rangoVF2 == '' AND $operadorVF != '' ){
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
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
                                                        'datatableVar2' => $datatableVar2,
                                                    
                                                        'calculo' => '']);
                            }
                        }else{
                            $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
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
                                                        'datatableVar2' => $datatableVar2,
                                                    
                                                        'calculo' => '']);
                        }
                                
                    }elseif (($rangoOp1 == '' AND $rangoOp2 == '' AND $operador1 == '' )) {
                        if ($varFiltro !='' ) {
                            if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') {
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
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
                                                        'datatableVar2' => $datatableVar2,
                                                        
                                                        'calculo' => '']); 
                            }elseif ($rangoVF1 != '' AND $rangoVF2 == '' AND $operadorVF != '' ){
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($result)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
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
                                                        'datatableVar2' => $datatableVar2,
                                                        
                                                        'calculo' => '']); 
                            }   
                        }else{
                            $result = DB::connection('reduccionl5')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->select('celda','dia',$variableDB) 
                            ->get();
                            $datatable = Datatables::of($result)->make();
                            if($variable2 != ''){
                                //segunda variable
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                             $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();

                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                              $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                             $result2 = DB::connection('reduccionl5')->table('diariocelda')
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
                                                    'datatableVar2' => $datatableVar2,
                                                    
                                                    'calculo' => '']);
                        }
                           
                    }
                }
    
    }
    
    public function CellDataTable(Request $request){
        
        if ($request->isMethod('get')) {
           $celdas = DB::connection('reduccionl5')->table('diariocelda')
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
            
            $celdas = DB::connection('reduccionl5')->table('diariocelda')
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
