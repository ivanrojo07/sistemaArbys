<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Cliente;
use App\Product;
use App\Services\Mail\SendMailService;
use App\Transaction;
use Illuminate\Http\Request;

use UxWeb\SweetAlert\SweetAlert as Alert;


class ClienteProductTransactionController extends Controller
{

    public function __construct( SendMailService $sendMailService )
    {
        $this->sendMailService = $sendMailService;
    }

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

    public function enviarCorreo(Request $request, Cliente $cliente,Product $producto){

        if(!$request->all()){
            return redirect()->route('clientes.producto.index', ['cliente' => $cliente]);
        }

        $this->sendMailService->make($request, $cliente, $producto);
        Alert::success('Se ha enviado un correo con la cotización correspondiente');
        return redirect()->route('clientes.producto.index', ['cliente' => $cliente]);
    }
    
}