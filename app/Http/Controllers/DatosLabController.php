<?php

namespace App\Http\Controllers;

use App\Personal;
use App\DatosLab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class DatosLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $cliente = Personal::find($cliente);
        // dd($cliente);
        return view('datoslab.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DatosLab  $datosLab
     * @return \Illuminate\Http\Response
     */
    public function show(DatosLab $datosLab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DatosLab  $datosLab
     * @return \Illuminate\Http\Response
     */
    public function edit(DatosLab $datosLab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DatosLab  $datosLab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatosLab $datosLab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DatosLab  $datosLab
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatosLab $datosLab)
    {
        //
    }
}
