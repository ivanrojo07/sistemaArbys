<?php

namespace App\Responses\Pago;

use App\Cliente;
use Illuminate\Contracts\Support\Responsable;

class StorePagoResponse implements Responsable
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function toResponse($request)
    {
        return redirect()->route('clientes.show', ['cliente' => $this->cliente]);
    }
}
