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

        $products = Product::get();

        foreach( $products as $product ){
            Product::updateOrCreate(
                ['clave' => $product['clave']],
                json_decode(json_encode($product), true)
            );
        }

        return $products;
    }
}