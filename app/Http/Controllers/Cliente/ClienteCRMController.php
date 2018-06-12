<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Cliente;
use App\ClienteCRM;
use Illuminate\Http\Request;

class ClienteCRMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           //
        
           $crms = ClienteCRM ::where('status','Pendiente')->orderBy('fecha_cont','desc')->get();
           // dd($crms);
           return view('crm.index',['crms'=>$crms]);


    }

    public function index2()
    {
        //
           //
        
           $crms = ClienteCRM ::where('status','Pendiente')->orderBy('fecha_cont','desc')->get();
           // dd($crms);
           return view('crm.index',['crms'=>$crms]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        
        $crms = $cliente->crm;
        // dd($crms);
        return view('crmclientes.index',['cliente'=>$cliente, 'crms'=>$crms]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cliente $cliente)
    {
        //
        // dd($request->all());
        $crm = ClienteCRM::create($request->all());
        return redirect()->route('clientes.crm.index',['cliente'=>$cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, $crm)
    {
        //
        $crm = ClienteCRM::findOrFail($crm);
        return view('crmclientes.view',['cliente'=>$cliente,'crm'=>$crm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        dd($cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function porFecha(Request $request){
        
    }
}
