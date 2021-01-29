<?php

namespace App\Http\Controllers;

use App\Celda;
use App\User;
use App\Variable;
use App\Module;
use Illuminate\Support\Facades\DB;
use App\Evolution;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use setasign\Fpdi\Fpdi;

class EvolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variables = Module::find(2)->Variables()->orderBy('variable')->get();
        return view('evolution.index', ['variables' => $variables]);
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

    public function lineV()
    {
        return view('evolution.lineaV');
    }

    public function PDFC()
    {
        
        $pdf = new Fpdi();
        // add a page
        $pdf->AddPage();
        // set the source file
        $pdf->setSourceFile("Trabajo Remoto usando Conexion VPN.PDF");
        // import page 1
        $tplIdx = $pdf->importPage(1);
        // use the imported page and place it at point 10,10 with a width of 100 mm
        $pdf->useImportedPage($tplIdx, 10, 10, 100);

        // now write some text above the imported page
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(255, 0, 0);
        $pdf->SetXY(30, 30);
        $pdf->Write(0, 'This is just a simple text');

        $pdf->Output();
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
//funcion que se utiliza cuando se solicita mediante get datos de graficos
    public function EvolutionDataChartGet(Request $request)
    {
        if ($request->isMethod('get')) {
            /* $date1 = strtotime("2020/07/01"); 
            $fecha1 = date("Y/m/d", strtotime("2020/07/01"));
            $date2 = strtotime('+30 day', strtotime($fecha1));
            $fecha2 = date("Y/m/d", $date2); */
            $fecha2=date("Y-m-d");
            $fecha1= date("Y-m-d",strtotime($fecha2."- 1 month"));

           // $fecha1= "2018/03/01";
           // $fecha2 ="2018/03/30";
            $celda1=901;
            $celda2= 1090;
           

            $voltaje = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(voltaje), 4), ",","") as voltaje'))
            ->get();

            $banda1Voltaje = 4.55;
            $banda2Voltaje = 4.65;
            $minVoltaje =  4.4;
            $maxVoltaje = 5.1;

            $corriente = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(corrienteL), 4), ",","") as corriente'))
            ->get();

            $banda1Corriente = 219;
            $banda2Corriente = null;
            $minCorriente =  180;
            $maxCorriente = 240;

            $efCorriente = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(eficc_rcol), 4), ",","") as efCorriente'))
            ->get();

            $banda1EfCorriente = 90;
            $banda2EfCorriente = 94;
            $minEfCorriente =  50;
            $maxEfCorriente = 110;

            $desvResistencia = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(dsr), 4), ",","") as desvResistencia'))
            ->get();

            $banda1DesvResistencia = 0.06;
            $banda2DesvResistencia = null;
            $minDesvResistencia =  -0.2;
            $maxDesvResistencia = 0.2;

            $frecuenciaEA = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(SUM(numeroEA)/count(*), 4), ",","") as frecuenciaEA'))
            ->get();

            $banda1FrecuenciaEA = 0.15;
            $banda2FrecuenciaEA = null;
            $minFrecuenciaEA =  0;
            $maxFrecuenciaEA = 1.2;

            $potencia = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(potencia), 4), ",", "") as potencia'))
            ->get();

            $banda1Potencia = 980;
            $banda2Potencia = 1000;
            $minPotencia =  920;
            $maxPotencia = 1120;

            $nivelDeMetal = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(nivelDeMetal), 4), ",","") as nivelDeMetal'))
            ->get();

            $banda1NivelDeMetal = 20;
            $banda2NivelDeMetal = 22;
            $minNivelDeMetal =  18;
            $maxNivelDeMetal = 27;

            $nivelDeBanio = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(nivelDeBanio), 4), ",","") as nivelDeBanio'))
            ->get();

            $banda1NivelDeBano = 20;
            $banda2NivelDeBano = 23;
            $minNivelDeBano =  15;
            $maxNivelDeBano = 27;

            $frecuenciaTK = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(SUM(numeroTK)/count(*), 4), ",","") as frecuenciaTK'))
            ->get();

            $banda1FrecuenciaTK = 0.15;
            $banda2FrecuenciaTK = null;
            $minFrecuenciaTK =  0;
            $maxFrecuenciaTK = 2.5;

            $duracionTK = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(duracionTk), 4), ",","") as duracionTk'))
            ->get();

            $banda1DuracionTK = 0.7;
            $banda2DuracionTK = 0.8;
            $minDuracionTK =  0.5;
            $maxDuracionTK = 1.9;

            $golpesAlumina = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(golpesAlumina), 4), ",","") as golpesAlumina'))
            ->get();

            $banda1GolpesAlumina = 2.4;
            $banda2GolpesAlumina = null;
            $minGolpesAlumina =  1.7;
            $maxGolpesAlumina = 3.2;
            
            $alimentacionAlumina = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(golpesAlumina), 4), ",","") as alimentacionAlumina'))
            ->get();
            
            $banda1AlimentacionAlumina = 1200;
            $banda2AlimentacionAlumina = 1300;
            $minAlimentacionAlumina =  800;
            $maxAlimentacionAlumina = 1350;

            $temperatura = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(temperatura), 4), ",","") as temperatura'))
            ->get();

            $banda1Temperatura = 960;
            $banda2Temperatura = 965;
            $minTemperatura =  950;
            $maxTemperatura = 990;

            $acidez = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(acidez), 4), ",","") as acidez'))
            ->get();

            $banda1Acidez = 10.5;
            $banda2Acidez = 11;
            $minAcidez =  8;
            $maxAcidez = 13.5;

            $desvTemperatura = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV(temperatura), 4), ",","") as desvTemperatura'))
            ->get();
            
            $banda1DesvTemperatura = 10;
            $banda2DesvTemperatura = null;
            $minDesvTemperatura =  0;
            $maxDesvTemperatura = 25;

            $desvAcidez = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV(acidez), 4), ",","") as desvAcidez'))
            ->get();

            $banda1DesvAcidez = 1.0;
            $banda2DesvAcidez = null;
            $minDesvAcidez =  0;
            $maxDesvAcidez = 4;

            $consumoFl = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(temperatura), 4), ",","") as consumoFl'))
            ->get();

            $banda1ConsumoFl = 50;
            $banda2ConsumoFl = 70;
            $minConsumoFl =  0;
            $maxConsumoFl = 170;


            $porcHierro = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(fe), 4), ",","") as porcHierro'))
            ->get();

            $banda1PorcHierro = 0.2;
            $banda2PorcHierro = null;
            $minPorcHierro =  0;
            $maxPorcHierro = 1.1;

            $purezaSilicio = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(si), 4), ",","") as purezaSilicio'))
            ->get();

            $banda1PurezaSilicio = 1;
            $banda2PurezaSilicio = 1;
            $minPurezaSilicio =  0;
            $maxPurezaSilicio = 0.45;

            $porcSilicio = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(si), 4), ",","") as porcSilicio'))
            ->get();

            $banda1PorcSilicio = 0.08;
            $banda2PorcSilicio = null;
            $minPorcSilicio =  0;
            $maxPorcSilicio = 0.45;

            return response()->json(
            [   'fecha1' => $fecha1,
                'fecha2' => $fecha2,

                'datosVoltaje' => $voltaje,
                'banda1Voltaje' => $banda1Voltaje,
                'banda2Voltaje' => $banda2Voltaje,
                'minVoltaje' => $minVoltaje,
                'maxVoltaje' => $maxVoltaje,

                'datosCorriente' => $corriente,
                'banda1Corriente' => $banda1Corriente,
                'banda2Corriente' => $banda2Corriente,
                'minCorriente' => $minCorriente,
                'maxCorriente' => $maxCorriente,

                'datosEfCorriente' => $efCorriente,
                'banda1EfCorriente' => $banda1EfCorriente,
                'banda2EfCorriente' => $banda2EfCorriente,
                'minEfCorriente' => $minEfCorriente,
                'maxEfCorriente' => $maxEfCorriente,

                'datosDesvResistencia' => $desvResistencia,
                'banda1DesvResistencia' => $banda1DesvResistencia ,
                'banda2DesvResistencia' => $banda2DesvResistencia,
                'minDesvResistencia' => $minDesvResistencia,
                'maxDesvResistencia' => $maxDesvResistencia,
                
                'datosFrecuenciaEA' => $frecuenciaEA,
                'banda1FrecuenciaEA' => $banda1FrecuenciaEA ,
                'banda2FrecuenciaEA' => $banda2FrecuenciaEA,
                'minFrecuenciaEA' => $minFrecuenciaEA,
                'maxFrecuenciaEA' => $maxFrecuenciaEA,
                
                'datosPotencia' => $potencia,
                'banda1Potencia' => $banda1Potencia,
                'banda2Potencia' => $banda2Potencia  , 
                'minPotencia' => $minPotencia,
                'maxPotencia' => $maxPotencia,
                
                'datosNivelDeMetal' => $nivelDeMetal,
                'banda1NivelDeMetal' =>  $banda1NivelDeMetal, 
                'banda2NivelDeMetal' => $banda2NivelDeMetal,
                'minNivelDeMetal' => $minNivelDeMetal,
                'maxNivelDeMetal' => $maxNivelDeMetal,
                
                'datosNivelDeBanio' => $nivelDeBanio,
                'banda1NivelDeBano' => $banda1NivelDeBano,
                'banda2NivelDeBano' => $banda2NivelDeBano,
                'minNivelDeBano' => $minNivelDeBano,
                'maxNivelDeBano' => $maxNivelDeBano,
                
                'datosFrecuenciaTK' => $frecuenciaTK,
                'banda1FrecuenciaTK' => $banda1FrecuenciaTK,
                'banda2FrecuenciaTK' => $banda2FrecuenciaTK,
                'minFrecuenciaTK' => $minFrecuenciaTK,
                'maxFrecuenciaTK' => $maxFrecuenciaTK,
                
                'datosDuracionTK' => $duracionTK,
                'banda1DuracionTK' => $banda1DuracionTK,
                'banda2DuracionTK' => $banda2DuracionTK, 
                'minDuracionTK' => $minDuracionTK,
                'maxDuracionTK' => $maxDuracionTK,
                
                'datosGolpesAlumina' => $golpesAlumina,
                'banda1GolpesAlumina' => $banda1GolpesAlumina,
                'banda2GolpesAlumina' => $banda2GolpesAlumina,
                'minGolpesAlumina' => $minGolpesAlumina,
                'maxGolpesAlumina' => $maxGolpesAlumina,
                
                'datosAlimentacionAlumina' => $alimentacionAlumina,
                'banda1AlimentacionAlumina' => $banda1AlimentacionAlumina,
                'banda2AlimentacionAlumina' => $banda2AlimentacionAlumina,
                'minAlimentacionAlumina' => $minAlimentacionAlumina,
                'maxAlimentacionAlumina' => $maxAlimentacionAlumina,

                'datosTemperatura' => $temperatura,
                'banda1Temperatura' => $banda1Temperatura,
                'banda2Temperatura' => $banda2Temperatura,
                'minTemperatura' => $minTemperatura,
                'maxTemperatura' => $maxTemperatura,
                
                'datosAcidez' => $acidez,
                'banda1Acidez' => $banda1Acidez,
                'banda2Acidez' => $banda2Acidez,
                'minAcidez' => $minAcidez,
                'maxAcidez' => $maxAcidez,
                
                'datosDesvTemperatura' => $desvTemperatura,
                'banda1DesvTemperatura' =>  $banda1DesvTemperatura,
                'banda2DesvTemperatura' => $banda2DesvTemperatura,
                'minDesvTemperatura' => $minDesvTemperatura,
                'maxDesvTemperatura' => $maxDesvTemperatura,
                
                'datosDesvAcidez' => $desvAcidez,
                'banda1DesvAcidez' => $banda1DesvAcidez,
                'banda2DesvAcidez' => $banda2DesvAcidez,
                'minDesvAcidez' => $minDesvAcidez,
                'maxDesvAcidez' => $maxDesvAcidez,
                
                'datosConsumoFl' => $consumoFl,
                'banda1ConsumoFl' => $banda1ConsumoFl,
                'banda2ConsumoFl' => $banda2ConsumoFl,
                'minConsumoFl' => $minConsumoFl,
                'maxConsumoFl' => $maxConsumoFl,
                
                'datosPorcHierro' => $porcHierro,
                'banda1PorcHierro' => $banda1PorcHierro,
                'banda2PorcHierro' => $banda2PorcHierro, 
                'minPorcHierro' => $minPorcHierro,
                'maxPorcHierro' => $maxPorcHierro,
                
                'datosPurezaSilicio' => $purezaSilicio,
                'banda1PurezaSilicio' => $banda1PurezaSilicio,
                'banda2PurezaSilicio' => $banda2PurezaSilicio,
                'minPurezaSilicio' => $minPurezaSilicio,
                'maxPurezaSilicio' => $maxPurezaSilicio,
                
                'datosPorcSilicio' => $porcSilicio,
                'banda1PorcSilicio' => $banda1PorcSilicio,
                'banda2PorcSilicio' => $banda2PorcSilicio,
                'minPorcSilicio' => $minPorcSilicio,
                'maxPorcSilicio' => $maxPorcSilicio,
                
                ]);

        }
        
    }

    //funcion que se utiliza cuando se envia mediante post un rango de fecha
    public function EvolutionDataChartPost(Request $request)
    {
        if ($request->isMethod('post')) {
            list( $fecha1, $fecha2) = explode(' - ', $request->input('rangoFechaPredet'));

           // $fecha1= "2018/03/01";
           // $fecha2 ="2018/03/30";
            $celda1=901;
            $celda2= 1090;
           

            $voltaje = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(voltaje),4), ",","") as voltaje'))
            ->get();

            $banda1Voltaje = 4.55;
            $banda2Voltaje = 4.65;
            $minVoltaje =  4.4;
            $maxVoltaje = 5.1;

            $corriente = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(corrienteL),4), ",","") as corriente'))
            ->get();

            $banda1Corriente = 219;
            $banda2Corriente = null;
            $minCorriente =  180;
            $maxCorriente = 240;

            $efCorriente = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(corrienteL),4), ",","") as efCorriente'))
            ->get();

            $banda1EfCorriente = 90;
            $banda2EfCorriente = 94;
            $minEfCorriente =  50;
            $maxEfCorriente = 110;

            $desvResistencia = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(dsr),4), ",","") as desvResistencia'))
            ->get();

            $banda1DesvResistencia = 0.06;
            $banda2DesvResistencia = null;
            $minDesvResistencia =  -0.2;
            $maxDesvResistencia = 0.2;

            $frecuenciaEA = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(SUM(numeroEA)/count(*),4), ",","") as frecuenciaEA'))
            ->get();

            $banda1FrecuenciaEA = 0.15;
            $banda2FrecuenciaEA = null;
            $minFrecuenciaEA =  0;
            $maxFrecuenciaEA = 1.2;

            $potencia = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(potencia),4), ",","") as potencia'))
            ->get();

            $banda1Potencia = 980;
            $banda2Potencia = 1000;
            $minPotencia =  920;
            $maxPotencia = 1120;

            $nivelDeMetal = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(nivelDeMetal),4), ",","") as nivelDeMetal'))
            ->get();

            $banda1NivelDeMetal = 20;
            $banda2NivelDeMetal = 22;
            $minNivelDeMetal =  18;
            $maxNivelDeMetal = 27;

            $nivelDeBanio = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(nivelDeBanio),4), ",","") as nivelDeBanio'))
            ->get();

            $banda1NivelDeBano = 20;
            $banda2NivelDeBano = 23;
            $minNivelDeBano =  15;
            $maxNivelDeBano = 27;

            $frecuenciaTK = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(SUM(numeroTK)/count(*),4), ",","") as frecuenciaTK'))
            ->get();

            $banda1FrecuenciaTK = 0.15;
            $banda2FrecuenciaTK = null;
            $minFrecuenciaTK =  0;
            $maxFrecuenciaTK = 2.5;

            $duracionTK = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(duracionTk),4), ",","") as duracionTk'))
            ->get();

            $banda1DuracionTK = 0.7;
            $banda2DuracionTK = 0.8;
            $minDuracionTK =  0.5;
            $maxDuracionTK = 1.9;

            $golpesAlumina = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(golpesAlumina),4), ",","") as golpesAlumina'))
            ->get();

            $banda1GolpesAlumina = 2.4;
            $banda2GolpesAlumina = null;
            $minGolpesAlumina =  1.7;
            $maxGolpesAlumina = 3.2;
            
            $alimentacionAlumina = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(golpesAlumina),4), ",","") as alimentacionAlumina'))
            ->get();
            
            $banda1AlimentacionAlumina = 1200;
            $banda2AlimentacionAlumina = 1300;
            $minAlimentacionAlumina =  800;
            $maxAlimentacionAlumina = 1350;

            $temperatura = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(temperatura),4), ",","") as temperatura'))
            ->get();

            $banda1Temperatura = 960;
            $banda2Temperatura = 965;
            $minTemperatura =  950;
            $maxTemperatura = 990;

            $acidez = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(acidez),4), ",","") as acidez'))
            ->get();

            $banda1Acidez = 10.5;
            $banda2Acidez = 11;
            $minAcidez =  8;
            $maxAcidez = 13.5;

            $desvTemperatura = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV(temperatura),4), ",","") as desvTemperatura'))
            ->get();
            
            $banda1DesvTemperatura = 10;
            $banda2DesvTemperatura = null;
            $minDesvTemperatura =  0;
            $maxDesvTemperatura = 25;

            $desvAcidez = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV(acidez),4), ",","") as desvAcidez'))
            ->get();

            $banda1DesvAcidez = 1.0;
            $banda2DesvAcidez = null;
            $minDesvAcidez =  0;
            $maxDesvAcidez = 4;

            $consumoFl = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(temperatura),4), ",","") as consumoFl'))
            ->get();

            $banda1ConsumoFl = 50;
            $banda2ConsumoFl = 70;
            $minConsumoFl =  0;
            $maxConsumoFl = 170;


            $porcHierro = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(fe),4), ",","") as porcHierro'))
            ->get();

            $banda1PorcHierro = 0.2;
            $banda2PorcHierro = null;
            $minPorcHierro =  0;
            $maxPorcHierro = 1.1;

            $purezaSilicio = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(si),4), ",","") as purezaSilicio'))
            ->get();

            $banda1PurezaSilicio = 1;
            $banda2PurezaSilicio = 1;
            $minPurezaSilicio =  0;
            $maxPurezaSilicio = 0.45;

            $porcSilicio = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(si),4), ",","") as porcSilicio'))
            ->get();

            $banda1PorcSilicio = 0.08;
            $banda2PorcSilicio = null;
            $minPorcSilicio =  0;
            $maxPorcSilicio = 0.45;

            return response()->json(
            [   'fecha1' => $fecha1,
            'fecha2' => $fecha2,

            'datosVoltaje' => $voltaje,
            'banda1Voltaje' => $banda1Voltaje,
            'banda2Voltaje' => $banda2Voltaje,
            'minVoltaje' => $minVoltaje,
            'maxVoltaje' => $maxVoltaje,

            'datosCorriente' => $corriente,
            'banda1Corriente' => $banda1Corriente,
            'banda2Corriente' => $banda2Corriente,
            'minCorriente' => $minCorriente,
            'maxCorriente' => $maxCorriente,

            'datosEfCorriente' => $efCorriente,
            'banda1EfCorriente' => $banda1EfCorriente,
            'banda2EfCorriente' => $banda2EfCorriente,
            'minEfCorriente' => $minEfCorriente,
            'maxEfCorriente' => $maxEfCorriente,

            'datosDesvResistencia' => $desvResistencia,
            'banda1DesvResistencia' => $banda1DesvResistencia ,
            'banda2DesvResistencia' => $banda2DesvResistencia,
            'minDesvResistencia' => $minDesvResistencia,
            'maxDesvResistencia' => $maxDesvResistencia,
            
            'datosFrecuenciaEA' => $frecuenciaEA,
            'banda1FrecuenciaEA' => $banda1FrecuenciaEA ,
            'banda2FrecuenciaEA' => $banda2FrecuenciaEA,
            'minFrecuenciaEA' => $minFrecuenciaEA,
            'maxFrecuenciaEA' => $maxFrecuenciaEA,
            
            'datosPotencia' => $potencia,
            'banda1Potencia' => $banda1Potencia,
            'banda2Potencia' => $banda2Potencia  , 
            'minPotencia' => $minPotencia,
            'maxPotencia' => $maxPotencia,
            
            'datosNivelDeMetal' => $nivelDeMetal,
            'banda1NivelDeMetal' =>  $banda1NivelDeMetal, 
            'banda2NivelDeMetal' => $banda2NivelDeMetal,
            'minNivelDeMetal' => $minNivelDeMetal,
            'maxNivelDeMetal' => $maxNivelDeMetal,
            
            'datosNivelDeBanio' => $nivelDeBanio,
            'banda1NivelDeBano' => $banda1NivelDeBano,
            'banda2NivelDeBano' => $banda2NivelDeBano,
            'minNivelDeBano' => $minNivelDeBano,
            'maxNivelDeBano' => $maxNivelDeBano,
            
            'datosFrecuenciaTK' => $frecuenciaTK,
            'banda1FrecuenciaTK' => $banda1FrecuenciaTK,
            'banda2FrecuenciaTK' => $banda2FrecuenciaTK,
            'minFrecuenciaTK' => $minFrecuenciaTK,
            'maxFrecuenciaTK' => $maxFrecuenciaTK,
            
            'datosDuracionTK' => $duracionTK,
            'banda1DuracionTK' => $banda1DuracionTK,
            'banda2DuracionTK' => $banda2DuracionTK, 
            'minDuracionTK' => $minDuracionTK,
            'maxDuracionTK' => $maxDuracionTK,
            
            'datosGolpesAlumina' => $golpesAlumina,
            'banda1GolpesAlumina' => $banda1GolpesAlumina,
            'banda2GolpesAlumina' => $banda2GolpesAlumina,
            'minGolpesAlumina' => $minGolpesAlumina,
            'maxGolpesAlumina' => $maxGolpesAlumina,
            
            'datosAlimentacionAlumina' => $alimentacionAlumina,
            'banda1AlimentacionAlumina' => $banda1AlimentacionAlumina,
            'banda2AlimentacionAlumina' => $banda2AlimentacionAlumina,
            'minAlimentacionAlumina' => $minAlimentacionAlumina,
            'maxAlimentacionAlumina' => $maxAlimentacionAlumina,

            'datosTemperatura' => $temperatura,
            'banda1Temperatura' => $banda1Temperatura,
            'banda2Temperatura' => $banda2Temperatura,
            'minTemperatura' => $minTemperatura,
            'maxTemperatura' => $maxTemperatura,
            
            'datosAcidez' => $acidez,
            'banda1Acidez' => $banda1Acidez,
            'banda2Acidez' => $banda2Acidez,
            'minAcidez' => $minAcidez,
            'maxAcidez' => $maxAcidez,
            
            'datosDesvTemperatura' => $desvTemperatura,
            'banda1DesvTemperatura' =>  $banda1DesvTemperatura,
            'banda2DesvTemperatura' => $banda2DesvTemperatura,
            'minDesvTemperatura' => $minDesvTemperatura,
            'maxDesvTemperatura' => $maxDesvTemperatura,
            
            'datosDesvAcidez' => $desvAcidez,
            'banda1DesvAcidez' => $banda1DesvAcidez,
            'banda2DesvAcidez' => $banda2DesvAcidez,
            'minDesvAcidez' => $minDesvAcidez,
            'maxDesvAcidez' => $maxDesvAcidez,
            
            'datosConsumoFl' => $consumoFl,
            'banda1ConsumoFl' => $banda1ConsumoFl,
            'banda2ConsumoFl' => $banda2ConsumoFl,
            'minConsumoFl' => $minConsumoFl,
            'maxConsumoFl' => $maxConsumoFl,
            
            'datosPorcHierro' => $porcHierro,
            'banda1PorcHierro' => $banda1PorcHierro,
            'banda2PorcHierro' => $banda2PorcHierro, 
            'minPorcHierro' => $minPorcHierro,
            'maxPorcHierro' => $maxPorcHierro,
            
            'datosPurezaSilicio' => $purezaSilicio,
            'banda1PurezaSilicio' => $banda1PurezaSilicio,
            'banda2PurezaSilicio' => $banda2PurezaSilicio,
            'minPurezaSilicio' => $minPurezaSilicio,
            'maxPurezaSilicio' => $maxPurezaSilicio,
            
            'datosPorcSilicio' => $porcSilicio,
            'banda1PorcSilicio' => $banda1PorcSilicio,
            'banda2PorcSilicio' => $banda2PorcSilicio,
            'minPorcSilicio' => $minPorcSilicio,
            'maxPorcSilicio' => $maxPorcSilicio,
                
                ]);

        }
        
    }
    //funcion que se utiliza cuando se solicita mediante get datos de graficos y mediante post las distintas variables para consulta detallada
    public function EvolutionDataChart(Request $request)
    {   //get  no se utiliza
        if ($request->isMethod('get')) {
            $fecha1='2018-03-01';
            $fecha2='2018-03-30';
            $celda1=901;
            $celda2= 1090;
           

            $voltaje = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(voltaje), 4), ",","") as voltaje'))
            ->get();

            $banda1Voltaje = 4.55;
            $banda2Voltaje = 4.65;

            $corriente = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(corrienteL), 4), ",","") as corriente'))
            ->get();

            $banda1Corriente = 219;
            $banda2Corriente = null;

            $efCorriente = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(corrienteL), 4), ",","") as efCorriente'))
            ->get();

            $banda1EfCorriente = 90;
            $banda2EfCorriente = 94;

            $desvResistencia = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(dsr), 4), ",","") as desvResistencia'))
            ->get();

            $banda1DesvResistencia = 0.06;
            $banda2DesvResistencia = null;

            $frecuenciaEA = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(SUM(numeroEA)/count(*), 4), ",","") as frecuenciaEA'))
            ->get();

            $banda1FrecuenciaEA = 0.15;
            $banda2FrecuenciaEA = null;

            $potencia = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(potencia), 4), ",","") as potencia'))
            ->get();

            $banda1Potencia = 980;
            $banda2Potencia = 1000;

            $nivelDeMetal = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(nivelDeMetal), 4), ",","") as nivelDeMetal'))
            ->get();

            $banda1NivelDeMetal = 20;
            $banda2NivelDeMetal = 22;

            $nivelDeBanio = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(nivelDeBanio), 4), ",","") as nivelDeBanio'))
            ->get();

            $banda1NivelDeBano = 20;
            $banda2NivelDeBano = 23;

            $frecuenciaTK = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(SUM(numeroTK)/count(*)), 4), ",","") as frecuenciaTK'))
            ->get();

            $banda1FrecuenciaTK = 0.15;
            $banda2FrecuenciaTK = null;

            $duracionTK = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(duracionTk), 4), ",","") as duracionTk'))
            ->get();

            $banda1DuracionTK = 0.7;
            $banda2DuracionTK = 0.8;

            $golpesAlumina = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(golpesAlumina), 4), ",","") as golpesAlumina'))
            ->get();

            $banda1GolpesAlumina = 2.4;
            $banda2GolpesAlumina = null;
            
            $alimentacionAlumina = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(golpesAlumina), 4), ",","") as alimentacionAlumina'))
            ->get();
            
            $banda1AlimentacionAlumina = 1200;
            $banda2AlimentacionAlumina = 1300;

            $temperatura = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(temperatura), 4), ",","") as temperatura'))
            ->get();

            $banda1Temperatura = 960;
            $banda2Temperatura = 965;

            $acidez = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(acidez), 4), ",","") as acidez'))
            ->get();

            $banda1Acidez = 10.5;
            $banda2Acidez = 11;

            $desvTemperatura = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV(temperatura), 4), ",","") as desvTemperatura'))
            ->get();
            
            $banda1DesvTemperatura = 10;
            $banda2DesvTemperatura = null;

            $desvAcidez = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV(acidez), 4), ",","") as desvAcidez'))
            ->get();

            $banda1DesvAcidez = 1.0;
            $banda2DesvAcidez = null;

            $consumoFl = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(temperatura), 4), ",","") as consumoFl'))
            ->get();

            $banda1ConsumoFl = 50;
            $banda2ConsumoFl = 70;


            $porcHierro = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(fe), 4), ",","") as porcHierro'))
            ->get();

            $banda1PorcHierro = 0.2;
            $banda2PorcHierro = null;

            $purezaSilicio = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(si), 4), ",","") as purezaSilicio'))
            ->get();

            $banda1PurezaSilicio = 1;
            $banda2PurezaSilicio = 1;

            $porcSilicio = DB::connection('reduccionl5')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('dia')
            ->having('dia', '>=', $fecha1)
            ->select('dia', DB::raw('REPLACE(FORMAT(AVG(si), 4), ",","") as porcSilicio'))
            ->get();

            $banda1PorcSilicio = 0.08;
            $banda2PorcSilicio = null;

            return response()->json(
            [   'datosVoltaje' => $voltaje,
                'banda1Voltaje' => $banda1Voltaje,
                'banda2Voltaje' => $banda2Voltaje,

                'datosCorriente' => $corriente,
                'banda1Corriente' => $banda1Corriente,
                'banda2Corriente' => $banda2Corriente,

                'datosEfCorriente' => $efCorriente,
                'banda1EfCorriente' => $banda1EfCorriente,
                'banda2EfCorriente' => $banda2EfCorriente,

                'datosDesvResistencia' => $desvResistencia,
                'banda1DesvResistencia' => $banda1DesvResistencia ,
                'banda2DesvResistencia' => $banda2DesvResistencia,
                
                'datosFrecuenciaEA' => $frecuenciaEA,
                'banda1FrecuenciaEA' => $banda1FrecuenciaEA ,
                'banda2FrecuenciaEA' => $banda2FrecuenciaEA,
                
                'datosPotencia' => $potencia,
                'banda1Potencia' => $banda1Potencia,
                'banda2Potencia' => $banda2Potencia  , 
                
                'datosNivelDeMetal' => $nivelDeMetal,
                'banda1NivelDeMetal' =>  $banda1NivelDeMetal, 
                'banda2NivelDeMetal' => $banda2NivelDeMetal,
                
                'datosNivelDeBanio' => $nivelDeBanio,
                'banda1NivelDeBano' => $banda1NivelDeBano,
                'banda2NivelDeBano' => $banda2NivelDeBano,
                
                'datosFrecuenciaTK' => $frecuenciaTK,
                'banda1FrecuenciaTK' => $banda1FrecuenciaTK,
                'banda2FrecuenciaTK' => $banda2FrecuenciaTK,
                
                'datosDuracionTK' => $duracionTK,
                'banda1DuracionTK' => $banda1DuracionTK,
                'banda2DuracionTK' => $banda2DuracionTK, 
                
                'datosGolpesAlumina' => $golpesAlumina,
                'banda1GolpesAlumina' => $banda1GolpesAlumina,
                'banda2GolpesAlumina' => $banda2GolpesAlumina,
                
                'datosAlimentacionAlumina' => $alimentacionAlumina,
                'banda1AlimentacionAlumina' => $banda1AlimentacionAlumina,
                'banda2AlimentacionAlumina' => $banda2AlimentacionAlumina,
                
                'datosTemperatura' => $temperatura,
                'banda1Temperatura' => $banda1Temperatura,
                'banda2Temperatura' => $banda2Temperatura,
                
                'datosAcidez' => $acidez,
                'banda1Acidez' => $banda1Acidez,
                'banda2Acidez' => $banda2Acidez,
                
                'datosDesvTemperatura' => $desvTemperatura,
                'banda1DesvTemperatura' =>  $banda1DesvTemperatura,
                'banda2DesvTemperatura' => $banda2DesvTemperatura,
                
                'datosDesvAcidez' => $desvAcidez,
                'banda1DesvAcidez' => $banda1DesvAcidez,
                'banda2DesvAcidez' => $banda2DesvAcidez,
                
                'datosConsumoFl' => $consumoFl,
                'banda1ConsumoFl' => $banda1ConsumoFl,
                'banda2ConsumoFl' => $banda2ConsumoFl,
                
                'datosPorcHierro' => $porcHierro,
                'banda1PorcHierro' => $banda1PorcHierro,
                'banda2PorcHierro' => $banda2PorcHierro, 
                
                'datosPurezaSilicio' => $purezaSilicio,
                'banda1PurezaSilicio' => $banda1PurezaSilicio,
                'banda2PurezaSilicio' => $banda2PurezaSilicio,
                
                'datosPorcSilicio' => $porcSilicio,
                'banda1PorcSilicio' => $banda1PorcSilicio,
                'banda2PorcSilicio' => $banda2PorcSilicio,
                
                ]);

        }
        else{

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


            $var =  Variable::find($variable);
            $variableDB = $var->nombre_var_bd;
            $ylabel = $var ->unidad; 
            $xlabel = 'fecha';

            if($banda1 == ''){
                $banda1 = $var->referencia_inferior ;
            } 
            if($banda2 == ''){
                $banda2 = $var->referencia_superior ;
            }   

            if($min == ''){
                $min = $var->min_grafica;
            } 
            if($max == ''){
                $max =  $var->max_grafica;
            }   



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
                $var2 =  Variable::find($variable2);
                $variableDB2 = $var2 ->nombre_var_bd;
                $ylabelVar2 = $var2 ->unidad; 
                $xlabelVar2 = 'fecha';
                if($banda1Var2 == ''){
                    $banda1Var2 = $var2->referencia_inferior ;
                } 
                if($banda2Var2 == ''){
                    $banda2Var2 = $var2->referencia_superior ;
                }   
    
                if($minVar2 == ''){
                    $minVar2 = $var2->min_grafica;
                } 
                if($maxVar2 == ''){
                    $maxVar2 =  $var2->max_grafica;
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
        
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
        

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
        
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
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

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
        
                                    }
                                }
        
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                $datatable = Datatables::of($result)->make();

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
        
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
        

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
        
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
        
                                    }
                                }
        
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as dato'))
                            ->get();
                            $datatable = Datatables::of($result)->make();

                            $tabla = DB::connection('reduccionl5')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                            ->groupBy('dia')
                            ->having('dia', '>=', $fecha1)
                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                            ->get();
                            $datatable = Datatables::of($tabla)->make();
    
                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                            ->get();


                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
    
                                            $datatableVar2 = Datatables::of($tabla2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                            ->get();
                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($tabla2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($tabla2)->make();
    
                                }
                            }
    
                            return response()->json(['datos' => $result,
                                                    'variable'=> $var->variable,
                                                     'varKey'=> $variableDB,
                                                     'banda1' => $banda1,
                                                     'banda2' => $banda2,
                                                     'miny' => $min, 
                                                     'maxy' => $max,
                                                     'ylabel'=> $ylabel,
                                                     'xlabel'=> $xlabel,
                                                     'datatable' => $datatable,
                                                     'celda1' =>$celda1,
                                                     'celda2' =>$celda2,
                                                                                                            
                                                     'datosVar2' => $result2,
                                                      'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as dato'))
                            ->get();
                            

                            $tabla = DB::connection('reduccionl5')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->where($variableDB, $operador1 , $rangoOp1 ) 
                            ->groupBy('dia')
                            ->having('dia', '>=', $fecha1)
                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                            ->get();
                            $datatable = Datatables::of($tabla)->make();
                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                            ->get();

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();

                                            $datatableVar2 = Datatables::of($tabla2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                            ->get();
                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($tabla2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                            ->get();
                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($tabla2)->make();

                                }
                            }
                            return response()->json(['datos' => $result,
                                                   'variable'=> $var->variable,
                                                    'varKey'=> $variableDB,
                                                    'banda1' => $banda1,
                                                    'banda2' => $banda2,
                                                    'miny' => $min, 
                                                    'maxy' => $max,
                                                    'ylabel'=> $ylabel,
                                                    'xlabel'=> $xlabel,
                                                    'datatable' => $datatable,
                                                    'celda1' =>$celda1,
                                                    'celda2' =>$celda2,
                                                        
                                                    'datosVar2' => $result2,
                                                     'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                $datatable = Datatables::of($result)->make();

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
    
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
    
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
                                                        'varKeyVar2'=> $variableDB2,
                                                        'banda1Var2' => $banda1Var2,
                                                        'banda2Var2' => $banda2Var2,
                                                        'minyVar2' => $minVar2, 
                                                        'maxyVar2' => $maxVar2,
                                                        'ylabelVar2'=> $ylabelVar2,
                                                        'xlabelVar2'=> $xlabelVar2,
                                                        'datatableVar2' => $datatableVar2,
                                                     
                                                        'calculo' => $calculo]); 
                                

                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
    
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as dato'))
                                ->get();

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                              

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(AVG('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
    
                                return response()->json(['datos' => $result,
                                                        'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                        'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                $datatable = Datatables::of($result)->make();

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
        
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
        
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
        
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
        
                                    }
                                }
        
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();

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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();

                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();

                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();

                                    }
                                }

                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as dato'))
                            ->get();
                            

                            $tabla = DB::connection('reduccionl5')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                            ->groupBy('dia')
                            ->having('dia', '>=', $fecha1)
                            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                            ->get();
                            $datatable = Datatables::of($tabla)->make();
    
                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                             $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                            ->get();
    
                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
    
                                            $datatableVar2 = Datatables::of($tabla2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                             $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                            ->get();
                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($tabla2)->make();
                                            
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
                                                    'variable'=> $var->variable,
                                                     'varKey'=> $variableDB,
                                                     'banda1' => $banda1,
                                                     'banda2' => $banda2,
                                                     'miny' => $min, 
                                                     'maxy' => $max,
                                                     'ylabel'=> $ylabel,
                                                     'xlabel'=> $xlabel,
                                                     'datatable' => $datatable,
                                                     'celda1' =>$celda1,
                                                     'celda2' =>$celda2,
                                                        
                                                     'datosVar2' => $result2,
                                                      'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                  //voy por aqui              
                    }elseif (($rangoOp1 == '' AND $rangoOp2 == '' AND $operador1 == '' )) {
                        if ($varFiltro !='' ) {
                            if ($rangoVF1 != '' AND $rangoVF2 != '' AND $operadorVF == '') { 
                                $result = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
    
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
    
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                               $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(STDDEV('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
    
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
        
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
        
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
        
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
        
                                    }
                                }
        
                                return response()->json(['datos' => $result,
                                                           'variable'=> $var->variable,
                                                            'varKey'=> $variableDB,
                                                            'banda1' => $banda1,
                                                            'banda2' => $banda2,
                                                            'miny' => $min, 
                                                            'maxy' => $max,
                                                            'ylabel'=> $ylabel,
                                                            'xlabel'=> $xlabel,
                                                            'datatable' => $datatable,
                                                            'celda1' =>$celda1,
                                                            'celda2' =>$celda2,
                                                        
                                                            'datosVar2' => $result2,
                                                             'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
        
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
        
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
        
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
        
                                    }
                                }
        
                                return response()->json(['datos' => $result,
                                                           'variable'=> $var->variable,
                                                            'varKey'=> $variableDB,
                                                            'banda1' => $banda1,
                                                            'banda2' => $banda2,
                                                            'miny' => $min, 
                                                            'maxy' => $max,
                                                            'ylabel'=> $ylabel,
                                                            'xlabel'=> $xlabel,
                                                            'datatable' => $datatable,
                                                            'celda1' =>$celda1,
                                                            'celda2' =>$celda2,
                                                        
                                                            'datosVar2' => $result2,
                                                             'variableVar2'=> $var2->variable,
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
                            ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as dato'))
                            ->get();
                            

                            $tabla = DB::connection('reduccionl5')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                            ->groupBy('dia')
                            ->having('dia', '>=', $fecha1)
                            ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                            ->get();
                            $datatable = Datatables::of($tabla)->make();
    
                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                            ->get();
    
                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
    
                                            $datatableVar2 = Datatables::of($tabla2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                            ->get();
                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($tabla2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                            ->get();
                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->groupBy('dia')
                                            ->having('dia', '>=', $fecha1)
                                            ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                            ->get();
                                            $datatableVar2 = Datatables::of($tabla2)->make();
    
                                }
                            }
    
                            return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                $datatable = Datatables::of($result)->make();

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                
                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
    
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
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
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
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
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 )
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
    
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as dato'))
                                ->get();
                                $datatable = Datatables::of($result)->make();

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->groupBy('dia')
                                ->having('dia', '>=', $fecha1)
                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB.'),4), ",","") as '.$variableDB))
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
    
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
    
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                    $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as dato'))
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->groupBy('dia')
                                                ->having('dia', '>=', $fecha1)
                                                ->select('dia', DB::raw('REPLACE(FORMAT(SUM('.$variableDB2.'),4), ",","") as '.$variableDB2))
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
    
                                    }
                                }
    
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('celda','dia',DB::raw(''.$variableDB.' as dato')) 
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($tabla)->make();

                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();

                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($result2)->make();

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();

                                    }
                                }

                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('celda','dia',DB::raw(''.$variableDB.' as dato')) 
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($tabla)->make();

                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();

                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();
                                                
                                                
                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();

                                    }
                                }

                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                            ->select('celda','dia',DB::raw(''.$variableDB.' as dato')) 
                            ->get();
                            

                            $tabla = DB::connection('reduccionl5')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->whereBetween($variableDB, [$rangoOp1,$rangoOp2]) 
                            ->select('celda','dia',$variableDB) 
                            ->get();
                            $datatable = Datatables::of($tabla)->make();

                            //segunda variable
                            if($variable2 != ''){
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                            ->get();

                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();

                                            $datatableVar2 = Datatables::of($tabla2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                             $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                            ->get();
                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();
                                            $datatableVar2 = Datatables::of($tabla2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                            $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                            ->get();
                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();
                                            $datatableVar2 = Datatables::of($tabla2)->make();

                                }
                            }

                            return response()->json(['datos' => $result,
                                                   'variable'=> $var->variable,
                                                    'varKey'=> $variableDB,
                                                    'banda1' => $banda1,
                                                    'banda2' => $banda2,
                                                    'miny' => $min, 
                                                    'maxy' => $max,
                                                    'ylabel'=> $ylabel,
                                                    'xlabel'=> $xlabel,
                                                    'datatable' => $datatable,
                                                    'celda1' =>$celda1,
                                                    'celda2' =>$celda2,
                                                        
                                                    'datosVar2' => $result2,
                                                     'variableVar2'=> $var2->variable,
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
                                ->select('celda','dia',DB::raw(''.$variableDB.' as dato')) 
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();

                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();

                                    }
                                }
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('celda','dia',DB::raw(''.$variableDB.' as dato'))
                                ->get();
                                
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato'))
                                                ->get();

                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();

                                    }
                                }
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('celda','dia',DB::raw(''.$variableDB.' as dato'))
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($variableDB, $operador1 , $rangoOp1 ) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
                                //segunda variable
                                if($variable2 != ''){
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato'))
                                                ->get();

                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                 $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato'))
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();

                                    }
                                }
                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('celda','dia',DB::raw(''.$variableDB.' as dato')) 
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();

                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->whereBetween($varFiltro, [$rangoVF1,$rangoVF2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();

                                    }
                                }

                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                                ->select('celda','dia',DB::raw(''.$variableDB.' as dato')) 
                                ->get();
                                

                                $tabla = DB::connection('reduccionl5')->table('diariocelda')
                                ->whereBetween('celda', [$celda1,$celda2])
                                ->whereBetween('dia', [$fecha1,$fecha2])
                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                ->select('celda','dia',$variableDB) 
                                ->get();
                                $datatable = Datatables::of($tabla)->make();
                                if($variable2 != ''){
                                    //segunda variable
                                    if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();

                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();

                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();
                                                
                                    }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                                $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                                ->get();
                                                

                                                $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                                ->whereBetween('celda', [$celda1,$celda2])
                                                ->whereBetween('dia', [$fecha1,$fecha2])
                                                ->where($varFiltro, $operadorVF , $rangoVF1 ) 
                                                ->select('celda','dia',$variableDB2) 
                                                ->get();
                                                $datatableVar2 = Datatables::of($tabla2)->make();

                                    }
                                }

                                return response()->json(['datos' => $result,
                                                       'variable'=> $var->variable,
                                                        'varKey'=> $variableDB,
                                                        'banda1' => $banda1,
                                                        'banda2' => $banda2,
                                                        'miny' => $min, 
                                                        'maxy' => $max,
                                                        'ylabel'=> $ylabel,
                                                        'xlabel'=> $xlabel,
                                                        'datatable' => $datatable,
                                                        'celda1' =>$celda1,
                                                        'celda2' =>$celda2,
                                                        
                                                        'datosVar2' => $result2,
                                                         'variableVar2'=> $var2->variable,
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
                            ->select('celda','dia',DB::raw(''.$variableDB.' as dato')) 
                            ->get();
                            

                            $tabla = DB::connection('reduccionl5')->table('diariocelda')
                            ->whereBetween('celda', [$celda1,$celda2])
                            ->whereBetween('dia', [$fecha1,$fecha2])
                            ->select('celda','dia',$variableDB) 
                            ->get();
                            $datatable = Datatables::of($tabla)->make();
                            if($variable2 != ''){
                                //segunda variable
                                if ($rangoOp1Var2 != '' AND $rangoOp2Var2 != '' AND $operador2 == '' ) {
                                             $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                            ->get();

                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->whereBetween($variableDB2, [$rangoOp1Var2,$rangoOp2Var2]) 
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();

                                            $datatableVar2 = Datatables::of($tabla2)->make();
                                            
                                }elseif ($rangoOp1Var2 != '' AND $rangoOp2Var2 == '' AND $operador2 != '' ){
                                              $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                            ->get();
                                            

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->where($variableDB2, $operador2 , $rangoOp1Var2 ) 
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();
                                            $datatableVar2 = Datatables::of($tabla2)->make();
                                            
                                }elseif (($rangoOp1Var2 == '' AND $rangoOp2Var2 == '' AND $operador2 == '' )) {
                                             $result2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->select('celda','dia',DB::raw(''.$variableDB2.' as dato')) 
                                            ->get();
                                            $datatableVar2 = Datatables::of($result2)->make();

                                            $tabla2 = DB::connection('reduccionl5')->table('diariocelda')
                                            ->whereBetween('celda', [$celda1,$celda2])
                                            ->whereBetween('dia', [$fecha1,$fecha2])
                                            ->select('celda','dia',$variableDB2) 
                                            ->get();
                                            $datatableVar2 = Datatables::of($tabla2)->make();

                                }
                            }

                            return response()->json(['datos' => $result,
                                                   'variable'=> $var->variable,
                                                    'varKey'=> $variableDB,
                                                    'banda1' => $banda1,
                                                    'banda2' => $banda2,
                                                    'miny' => $min, 
                                                    'maxy' => $max,
                                                    'ylabel'=> $ylabel,
                                                    'xlabel'=> $xlabel,
                                                    'datatable' => $datatable,
                                                    'celda1' =>$celda1,
                                                    'celda2' =>$celda2,
                                                        
                                                    'datosVar2' => $result2,
                                                     'variableVar2'=> $var2->variable,
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
            
                /* //segunda variable
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
                */
        }
    }
}
