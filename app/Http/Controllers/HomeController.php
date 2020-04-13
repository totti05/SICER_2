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

      $celdas = sizeof($celdas) ;
        return view('home', ['celdas' => $celdas] );
    }
}
