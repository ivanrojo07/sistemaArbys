<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use App\Pago;
use App\Banco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Barryvdh\DomPDF\Facade as PDF;

class ClientePagoController extends Controller
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
       $bancos=Banco::orderBy('nombre')->get();
       
        return view('pagos.create',['cliente'=>$cliente,
                                    'bancos' =>$bancos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status=$request->status;
       
        $pago=Pago::create($request->all());
        $cliente=Cliente::where('id',$request->cliente_id)->first();

        switch ($status) {

            case 'Guardado':
                
                Alert::success('Pago registrado con éxito (No ha sido Aprobado aún)', 'Se redireccionará a sección del Cliente');
                return redirect()->route('clientes.show',['id'=>$request->cliente_id]);

                break;

            case 'Aprobado':
                
                 Alert::success('Pago Aprobado, se actualiza a Solicitante', 'Se redireccionará al registro de Solicitantes');
                 return redirect()->route('clientes.solicitantes.create',['cliente'=>$cliente]);

                break;

            case 'No Aprobado':
                dd($status);
                 Alert::warning('Pago No Aprobado', 'Se redireccionará a sección del Cliente');
                break;
            
            default:
                # code...
                break;
        }

       
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function store_dos(Cliente $cliente){

    }
}
