<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Integrante;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Illuminate\Support\Facades\Storage;

class ClienteIntegranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aprobados = Array();
        foreach ($cliente->transactions as $transaction) {
            foreach ($transaction->pagos as $pago) {
                if ($pago->status == "Aprobado") {
                    $aprobados[] = $pago;
                }
            }
        }
        return dd($aprobados[0]->transaction);
        return dd($aprobados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        return view('clientes.integrantes.create', ['cliente' => $cliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $integrante = new Integrante();
        $integrante->cliente_id = $request->cliente_id;
        $integrante->archivo_identificacion = Storage::disk('local')->put('foto1', $request->archivo_identificacion);
        $integrante->archivo_comprobante = Storage::disk('local')->put('foto2', $request->archivo_comprobante);
        $integrante->archivo_solicitud = Storage::disk('local')->put('foto3', $request->archivo_solicitud);
        $integrante->archivo_pago = Storage::disk('local')->put('foto4', $request->archivo_pago);
        $integrante->identificacion = $request->identificacion;
        $integrante->num_identificacion = $request->num_identificacion;
        $integrante->comprobante_domicilio = $request->comprobante_domicilio;
        $integrante->nombre_comp_domc = $request->nombre_comp_domc;
        $integrante->direccion = $request->direccion;
        $integrante->direccion = $request->direccion;
        $integrante->save();

        // return "kk";
        // $integrante = Integrante::create($request->all());
        // $cliente = Cliente::find(json_decode($request->cliente)->id);
        // Alert::success('Se han guardado correctamente los datos');
        // return view('clientes.integrantes.create', ['cliente' => $cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkList(Cliente $cliente)
    {
        return view('clientes.integrantes.checkList', ['cliente' => $cliente]);
    }
}