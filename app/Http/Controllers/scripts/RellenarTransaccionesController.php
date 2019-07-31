<?php

namespace App\Http\Controllers\scripts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Pago;
use App\Transaction;
use App\Vendedor;

class RellenarTransaccionesController extends Controller
{
    public function status()
    {

        $vendedor = Vendedor::find(6);

        return $vendedor->transactionsByLastMonth();
    }
}
