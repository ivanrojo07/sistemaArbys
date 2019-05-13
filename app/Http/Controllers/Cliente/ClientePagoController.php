<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use App\Pago;
use App\Product;
use App\Transaction;
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
        $bancos = Banco::get();
        return view('clientes.pagos.create', ['cliente' => $cliente, 'bancos' => $bancos]);
    }

    public function follow(Cliente $cliente, Pago $pago) {
        $bancos = Banco::get();
        return view('clientes.pagos.follow', ['cliente' => $cliente, 'bancos' => $bancos, 'pago' => $pago]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cliente $cliente)
    {
        $transaction = Transaction::where(['cliente_id' => $cliente->id, 'product_id' => $request->product_id])->first();
        $request['transaction_id'] = "" . $transaction->id;
        if($request->restante == null)
            $request['restante'] = ($request->total - $request->monto) . "";
        else
            $request['restante'] = ($request->restante - $request->monto) . "";
        $pago = new Pago($request->all());
        $transaction->pagos()->save($pago);

        return redirect()->route('clientes.show', ['cliente' => $cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, Pago $pago)
    {
        return view('clientes.pagos.view', ['cliente' => $cliente, 'pago' => $pago]);
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

    public function create_pago(Cliente $cliente, $producto)
    {
        $producto = Product::where('clave', $producto)->first();
        $bancos = Banco::get();
        return view('clientes.pagos.elegido_create', ['cliente' => $cliente, 'bancos' => $bancos, 'producto' => $producto]);
    }

}
