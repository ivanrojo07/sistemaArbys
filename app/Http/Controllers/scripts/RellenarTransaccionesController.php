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
use App\Subgerente;

class RellenarTransaccionesController extends Controller
{
    public function status()
    {
        $subgerentes = Subgerente::get();

        foreach($subgerentes as $subgerente){

            Vendedor::updateOrCreate(
                ['empleado_id' => $subgerente->empleado_id],
                [
                    'empleado_id' => $subgerente->empleado_id,
                    'status' => 'Activo',
                    'grupo_id' => null
                ]
            );

        }

        $subgerentes =  Subgerente::with('empleado.vendedor')->get();

        return $subgerentes->pluck('empleado')->flatten()->pluck('vendedor')->flatten();

    }
}