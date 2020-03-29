<?php

namespace App\Http\Controllers;

use App\Bath;
use Illuminate\Http\Request;

class BathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bath.index');
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
     * @param  \App\Bath  $bath
     * @return \Illuminate\Http\Response
     */
    public function show(Bath $bath)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bath  $bath
     * @return \Illuminate\Http\Response
     */
    public function edit(Bath $bath)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bath  $bath
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bath $bath)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bath  $bath
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bath $bath)
    {
        //
    }
}
