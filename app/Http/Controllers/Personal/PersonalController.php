<?php

namespace App\Http\Controllers\Personal;

use App\Personal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personals = Personal::sortable()->paginate(10);
        return view('clientes.index', ['personals'=>$personals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
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
        $cliente = Personal::create($request->all());
        return redirect()->route('clientes.direccionfisica.create',['personal'=>$cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $cliente)
    {
        return view('clientes.view',['personal'=>$cliente]);
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
        return view('clientes.edit',['personal'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $cliente)
    {
        //
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $cliente)
    {
        //
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $clientes = Personal::sortable()->where('nombre','LIKE',"%$query%")
        ->orWhere('apellidopaterno','LIKE',"%$query%")
        ->orWhere('apellidomaterno','LIKE',"%$query%")
        ->orWhere('razonsocial','LIKE','%$query%')
        ->orWhere('rfc','LIKE',"%$query%")
        ->orWhere('alias','LIKE',"%$query%")
        ->orWhere('tipopersona','LIKE',"%$query%")
        ->paginate(10);
        return view('clientes.index',['personals'=>$clientes]);
    }
}
