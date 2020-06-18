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
        return view('home', ['celdas' => $celdas,
                              'produccion' => $produccion,
                              'normalizacion' => $normalizacion,
                              'coccion' => $coccion] );
    }
}
