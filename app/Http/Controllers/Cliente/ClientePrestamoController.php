<?php

namespace App\Http\Controllers\Cliente;

use App\Prestamo;
use App\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class ClientePrestamoController extends Controller
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
    public function create(Cliente $cliente)
    {
        return view('clientes.prestamos.create', ['cliente' => $cliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cliente $cliente)
    {
        $prestamo = new Prestamo($request->all());
        $cliente->prestamos()->save($prestamo);
        return redirect()->route('clientes.prestamos.show', ['cliente' => $cliente, 'prestamo' => $prestamo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, Prestamo $prestamo)
    {
        return view('clientes.prestamos.view', ['cliente' => $cliente, 'prestamo' => $prestamo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    public function pdf(Cliente $cliente, Prestamo $prestamo, Request $request)
    {
        // dd($cliente);
         $pdf = PDF::loadView('clientes.prestamos.pdf', ['cliente' => $cliente, 'prestamo' => $prestamo, "empleado"=>$request->user()->empleado]);
            return $pdf->download('cotización.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
