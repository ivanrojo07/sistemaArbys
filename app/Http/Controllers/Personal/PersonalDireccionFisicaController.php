<?php

namespace App\Http\Controllers\Personal;

use App\DireccionFisica;
use App\Http\Controllers\Controller;
use App\Personal;
use Illuminate\Http\Request;

class PersonalDireccionFisicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Personal $cliente)
    {
        //
        $direccion = $cliente->direccionFisica;
        if ($direccion ==null) {
            # code...
            return redirect()->route('clientes.direccionfisica.create',['personal'=>$cliente]);
        }
        else{
            return view('direccion.view',['direccion'=>$direccion,'personal'=>$cliente]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Personal $cliente)
    {
        //
        return view('direccion.create',['personal'=>$cliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Personal $cliente)
    {
        //
        // dd($request->all());
        $direccion = DireccionFisica::create($request->all());
        return redirect()->route('clientes.contacto.index',['personal'=>$cliente]);
        // return view('direccion.view',['direccion'=>$direccion,'personal'=>$cliente]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $cliente)
    {
        //
        $direccion = $cliente->direccionFisica;
        return view('direccion.view',['direccion'=>$direccion,'personal'=>$cliente]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $cliente)
    {
        //
        $direccion = $cliente->direccionFisica;
        return view('direccion.edit',['personal'=>$cliente, 'direccion'=>$direccion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $cliente, DireccionFisica $direccionfisica )
    {
        //
        // dd($direccionfisica);
        $direccionfisica->update($request->all());
       return view('direccion.view',['direccion'=>$direccionfisica,'personal'=>$cliente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        //
    }
}
