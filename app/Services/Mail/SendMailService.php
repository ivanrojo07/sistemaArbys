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
        // dd($request->input());
        // GENERAR PDF PARA EL CORREO

        $mensaje = $request->input('mensaje');
        if ($cliente->vendedor != null) 
            $pdf = PDF::loadView('clientes.pdf_nuevo', ['cliente' => $cliente, 'producto' => $producto, "request"=>$request->all(), "empleado"=>$cliente->vendedor->empleado, 'mensaje'=>$mensaje]);
        else
            $pdf = PDF::loadView('clientes.pdf_nuevo', ['cliente' => $cliente, 'producto' => $producto, "request"=>$request->all(), "empleado"=>Auth::user()->empleado, 'mensaje'=>$mensaje]);
        
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
