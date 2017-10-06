<?php

namespace App\Http\Controllers;

use App\ProdUsuario;
use Illuminate\Http\Request;

class ProdUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('produsuario.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('produsuario.create');
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
     * @param  \App\ProdUsuario  $prodUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(ProdUsuario $prodUsuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProdUsuario  $prodUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdUsuario $prodUsuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProdUsuario  $prodUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdUsuario $prodUsuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProdUsuario  $prodUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdUsuario $prodUsuario)
    {
        //
    }
}
