<?php

namespace App\Http\Controllers;

use App\Variable;
use Illuminate\Http\Request;

class VariableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function index()
    {   
        $variables = Variable::all(); 
        return view('variables.index', ['variables' => $variables]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('variables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $variable = new Variable;
        $variable->variable = $request->input('variable');
        $variable->nombre_var_bd = $request->input('nombre_var_bd');
        $variable->neumonico = $request->input('neumonico');
        $variable->unidad = $request->input('unidad');
        $variable->descripcion = $request->input('descripcion');
        $variable->calculo_variable = $request->input('calculo_variable');
        $variable->calculo_rango_ref = $request->input('calculo_rango_ref');
        $variable->referencia_superior = $request->input('referencia_superior');
        $variable->referencia_inferior = $request->input('referencia_inferior');
        $variable->referencia_operativa = $request->input('referencia_operativa');
        $variable->rango_ideal = $request->input('rango_ideal');
        $variable->max_grafica = $request->input('max_grafica');
        $variable->min_grafica = $request->input('min_grafica');
        $variable->tabla_bd = $request->input('tabla_bd');
        $variable->comentario = $request->input('comentario');
        $variable->save();
        
        return redirect(route('variables.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function show(Variable $variable)
    {
        return view('variables.show', ['variable' => $variable]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function edit(Variable $variable)
    {
        return view('variables.edit', ['variable' => $variable]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variable $variable)
    {
        $variable->variable = $request->input('variable');
        $variable->nombre_var_bd = $request->input('nombre_var_bd');
        $variable->neumonico = $request->input('neumonico');
        $variable->unidad = $request->input('unidad');
        $variable->descripcion = $request->input('descripcion');
        $variable->calculo_variable = $request->input('calculo_variable');
        $variable->calculo_rango_ref = $request->input('calculo_rango_ref');
        $variable->referencia_superior = $request->input('referencia_superior');
        $variable->referencia_inferior = $request->input('referencia_inferior');
        $variable->referencia_operativa = $request->input('referencia_operativa');
        $variable->rango_ideal = $request->input('rango_ideal');
        $variable->max_grafica = $request->input('max_grafica');
        $variable->min_grafica = $request->input('min_grafica');
        $variable->tabla_bd = $request->input('tabla_bd');
        $variable->comentario = $request->input('comentario');
        $variable->update();
        
        return redirect(route('variables.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variable $variable)
    {
        $variable->delete();
        return redirect(route('variables.index'));

    }
}
