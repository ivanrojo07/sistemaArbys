<?php

namespace App\Http\Controllers\Provedor;

use App\DireccionFisica;
use App\Http\Controllers\Controller;
use App\Provedor;
use Illuminate\Http\Request;

class ProvedorDireccionFisicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $cliente)
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
    public function create(Provedor $cliente)
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
    public function store(Request $request, Provedor $cliente)
    {
        //
        // dd($request->all());
        $direccion = DireccionFisica::create($request->all());
        return redirect()->route('clientes.contacto.index',['personal'=>$cliente]);
        // return view('d}ireccion.view',['direccion'=>$direccion,'personal'=>$cliente]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $cliente)
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
    public function edit(Provedor $cliente)
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
    public function update(Request $request, Provedor $cliente, DireccionFisica $direccionFisica )
    {
        //
        // dd($DireccionFiscal);
        $cliente->direccionFisica->update($request->all());
        return redirect()->route('clientes.direccionfisica.index',['personal'=>$cliente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provedor $personal)
    {
        //
    }
    public function prueba(){
        return view('direccion.view');
    }
}
