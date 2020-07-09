<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
      $celdas = DB::connection('reduccion')->table('diariocelda')
      ->whereYear('dia','2020')
      ->whereMonth('dia','03')
      ->whereDay('dia', '26')
      ->where('enServicio', '=', 1)
      ->select('celda')
      ->get();

      $produccion = DB::connection('reduccion')->table('diariocelda')
      ->whereYear('dia','2020')
      ->whereMonth('dia','03')
      ->whereDay('dia', '26')
      ->where('estado', '=', 'ecProduccion')
      ->select('celda')
      ->get();

      $normalizacion = DB::connection('reduccion')->table('diariocelda')
      ->whereYear('dia','2020')
      ->whereMonth('dia','03')
      ->whereDay('dia', '26')
      ->where('estado', '=', 'ecNormalizacion')
      ->select('celda')
      ->get();
      
      $coccion = DB::connection('reduccion')->table('diariocelda')
      ->whereYear('dia','2020')
      ->whereMonth('dia','03')
      ->whereDay('dia', '26')
      ->where('estado', '=', 'ecCoccion')
      ->select('celda')
      ->get();

      $celdas = sizeof($celdas) ;
      $produccion = sizeof($produccion) ;
      $normalizacion = sizeof($normalizacion) ;
      $coccion = sizeof($coccion) ;
        return view('home', [ 'celdas' => $celdas,
                              'produccion' => $produccion,
                              'normalizacion' => $normalizacion,
                              'coccion' => $coccion,
                              
                              ] );
    }

    public function grapHome(){


      $fecha1='2018-03-01';
      $fecha2='2018-03-30';
      $celda1=901;
      $celda2= 1090;

      $hierro = DB::connection('reduccion')->table('diariocelda')
      ->whereBetween('celda', [$celda1,$celda2])
      ->whereBetween('dia', [$fecha1,$fecha2])
      ->groupBy('dia')
      ->having('dia', '>=', $fecha1)
      ->select('dia', DB::raw('REPLACE(FORMAT(AVG(fe),4), ",","") as fe'))
      ->get();

      $celdas = DB::connection('reduccion')->table('diariocelda')
      ->whereBetween('celda', [$celda1,$celda2])
      ->whereBetween('dia', [$fecha1,$fecha2])
      ->where('enServicio', '=', 1)
      ->groupBy('dia')
      ->having('dia', '>=', $fecha1)
      ->select('dia', DB::raw('count(*) as celdas_conectadas'))
      ->get();

      $prod = DB::connection('reduccion')->table('diariocelda')
      ->whereBetween('celda', [$celda1,$celda2])
      ->whereBetween('dia', [$fecha1,$fecha2])
      ->groupBy('dia')
      ->having('dia', '>=', $fecha1)
      ->select('dia', DB::raw('REPLACE(FORMAT(AVG(al),4), ",","") as prod'))
      ->get();

      return response()->json(
        [   'fecha1' => $fecha1,
            'fecha2' => $fecha2,
            'datosHierro' => $hierro,
            'datosCeldasCon' => $celdas,
            'datosProd' => $prod ,
            ]);

     /* $fecha1='2018-03-01';
      $fecha2='2018-03-30';
      $celda1=901;
      $celda2= 1090;

      $hierro = DB::connection('reduccion')->table('diariocelda')
            ->whereBetween('celda', [$celda1,$celda2])
            ->whereBetween('dia', [$fecha1,$fecha2])
            ->groupBy('celda')
            ->having('celda', '>=', $celda1)
            ->select('celda', DB::raw('REPLACE(FORMAT(AVG(fe),4), ",","") as fe'))
            ->get();
            return response()->json(
              [   'fecha1' => $fecha1,
                  'fecha2' => $fecha2,
                  'datosHierro' => $hierro
                  ]); */
    }
}
