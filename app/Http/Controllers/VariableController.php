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
        $variable->neumonico = $request->input('neumonico');
        $variable->unidad = $request->input('unidad');
        $variable->descripcion = $request->input('descripcion');
        $variable->calculo = $request->input('calculo');
        $variable->procedencia = $request->input('procedencia');
        $variable->procedencia_area = $request->input('procedencia_area');
        $variable->tabla_bd = $request->input('tabla_bd');
        $variable->comentario = $request->input('comentario');
        $variable->rango_ideal = $request->input('rango_ideal');
        $variable->rango_inferior = $request->input('rango_inferior');
        $variable->rango_superior = $request->input('rango_superior');
        $variable->save();
        
        return view('variables.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function show(Variable $variable)
    {
        return view('variables.show');
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
        $variable->neumonico = $request->input('neumonico');
        $variable->unidad = $request->input('unidad');
        $variable->descripcion = $request->input('descripcion');
        $variable->calculo = $request->input('calculo');
        $variable->procedencia = $request->input('procedencia');
        $variable->procedencia_area = $request->input('procedencia_area');
        $variable->tabla_bd = $request->input('tabla_bd');
        $variable->comentario = $request->input('comentario');
        $variable->rango_ideal = $request->input('rango_ideal');
        $variable->rango_inferior = $request->input('rango_inferior');
        $variable->rango_superior = $request->input('rango_superior');
        $variable->update();
        
        return view('variables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variable $variable)
    {
        //
    }
}
