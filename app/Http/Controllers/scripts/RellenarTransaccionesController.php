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
        $oficina = Oficina::where('id', 5)->first();

        if ($oficina) {
            $gerente = Gerente::where('empleado_id', 7)->first();

            if($gerente){
                $oficina->gerente_id = $gerente->id;
            }

        //     $oficina->save();
        }

        return $oficina;
    }
}