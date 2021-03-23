<?php

namespace App\Http\Controllers;

use App\Info_line;
use Illuminate\Http\Request;

class InfoLineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('infoline.index');
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
     * @param  \App\Info_line  $info_line
     * @return \Illuminate\Http\Response
     */
    public function show(Info_line $info_line)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Info_line  $info_line
     * @return \Illuminate\Http\Response
     */
    public function edit(Info_line $info_line)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Info_line  $info_line
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info_line $info_line)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Info_line  $info_line
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info_line $info_line)
    {
        //
    }
}
