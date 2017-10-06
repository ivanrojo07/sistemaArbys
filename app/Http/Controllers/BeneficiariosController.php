<?php

namespace App\Http\Controllers;

use App\Beneficiarios;
use Illuminate\Http\Request;

class BeneficiariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('benef.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('benef.create');
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
     * @param  \App\Beneficiarios  $beneficiarios
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiarios $beneficiarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Beneficiarios  $beneficiarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Beneficiarios $beneficiarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Beneficiarios  $beneficiarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beneficiarios $beneficiarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Beneficiarios  $beneficiarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiarios $beneficiarios)
    {
        //
    }
}
