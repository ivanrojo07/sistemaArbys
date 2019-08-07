<?php

namespace App\Http\Controllers\scripts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Pago;
use App\Transaction;
use App\Vendedor;
use App\Oficina;
use App\Gerente;
use App\ExcelProduct;
use App\Product;

class RellenarTransaccionesController extends Controller
{
    public function status()
    {
        $productos = new Product;
        $productos = $productos->categoria('camioneta');
        $productos = $productos->precioMinimo('275000.00');
        $productos = $productos->precioMaximo('520500.00');
        return $productos->get();
    }
}