<?php

namespace App\Services\Mail;

use Barryvdh\DomPDF\Facade as PDF;
use App\Transaction;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailCotizacion;

class SendMailService
{
    public function make($request, $cliente, $producto)
    {
        // GENERAR PDF PARA EL CORREO
        $mensaje = $request->input('mensaje_correo');
        $pdf = PDF::loadView('clientes.pdf', ['cliente' => $cliente, 'producto' => $producto, "request" => $request->all(), "empleado" => $cliente->vendedor->empleado, 'mensaje' => $mensaje]);
        
        // CREAR TRANSACCIÓN
        $transaction = Transaction::create([
            'cliente_id' => $request->cliente_id,
            'product_id' => $request->product_id,
            'status' => 'enviada'
        ]);
        
        // ENVIAR CORREO
        Mail::to($cliente->email)->send(new MailCotizacion($transaction,$pdf));
        
    }
}
