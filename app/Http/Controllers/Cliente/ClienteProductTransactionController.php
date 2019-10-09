<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Cliente;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use UxWeb\SweetAlert\SweetAlert as Alert;


class ClienteProductTransactionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cliente $cliente, Product $product)
    {
        // $product->noestaDisponible;
        //$transaction = Transaction::create($request->all());
        $transaction = new Transaction;
        $transaction->cliente_id = $request->cliente_id;
        $transaction->product_id = $request->product_id;
        $transaction->save();
        alert()->success('Success Message', 'Optional Title'); 
        return redirect()->back()->with('success', 'Producto añadido con exito');
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

    public function enviarCorreo(Request $request, Cliente $cliente,Product $producto){
        //anie@maiasdas.com
        $mensaje = $request->input('mensaje_correo');
        if($request->all()){
            $pdf = PDF::loadView('clientes.pdf', ['cliente' => $cliente, 'producto' => $producto, "request"=>$request->all(), "empleado"=>$cliente->vendedor->empleado, 'mensaje'=>$mensaje]);
            $transaction = new Transaction;
            $transaction->cliente_id = $request->cliente_id;
            $transaction->product_id = $request->product_id;
            $transaction->status = 'enviada';
            $transaction->enviarTransaccion($cliente->email, $pdf);
            $transaction->save();
            Alert::success('Se ha enviado un correo con la cotización correspondiente ');
            return redirect()->route('clientes.producto.index', ['cliente' => $cliente]);
            
        }
        else{

            return redirect()->route('clientes.producto.index', ['cliente' => $cliente]);
        }
    }
    
}