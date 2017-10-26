<?php

namespace App\Http\Controllers\Personal;

use App\Contacto;
use App\Http\Controllers\Controller;
use App\Personal;
use Illuminate\Http\Request;

class PersonalContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Personal $cliente)
    {
        //
        $contactos = $cliente->contactos;
        // dd($contactos);
        return view('contacto.index', ['personal'=>$cliente, 'contactos'=>$contactos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Personal $cliente)
    {
        //
        return view('contacto.create',['personal'=>$cliente]);
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
        $contacto = Contacto::create($request->all());

        return redirect()->route('clientes.contacto.index', ['personal'=>$cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $cliente,$contacto)
    {
        //
        $contacto = Contacto::findOrFail($contacto);
        return view('contacto.view',['personal'=>$cliente, 'contacto'=>$contacto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $cliente, $contacto)
    {
        //
        $contacto = Contacto::findOrFail($contacto);
        return view('contacto.edit',['personal'=>$cliente, 'contacto'=>$contacto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $cliente, $contacto)
    {
        //
        $contacto = Contacto::findOrFail($contacto);
        $contacto->update($request->all());
        return redirect()->route('clientes.contacto.index',['personal'=>$cliente]);
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
