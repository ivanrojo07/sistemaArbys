<?php

namespace App\Http\Controllers\scripts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Pago;
use App\Transaction;
use App\Vendedor;
use App\Oficina;
use App\Gerente;

class RellenarTransaccionesController extends Controller
{
    public function status()
    {
        return phpversion();
    }
}