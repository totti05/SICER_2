<?php

namespace App\Http\Controllers;

use App\Crucible;
use Illuminate\Http\Request;

class CrucibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('crucible.index');
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
     * @param  \App\Crucible  $crucible
     * @return \Illuminate\Http\Response
     */
    public function show(Crucible $crucible)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crucible  $crucible
     * @return \Illuminate\Http\Response
     */
    public function edit(Crucible $crucible)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crucible  $crucible
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crucible $crucible)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crucible  $crucible
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crucible $crucible)
    {
        //
    }
}
