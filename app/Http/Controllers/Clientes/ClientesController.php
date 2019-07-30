<?php

namespace App\Http\Controllers\Clientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oficina;
use App\Subgerente;
use App\Grupo;

class ClientesController extends Controller
{
    public function getClientesByOffice( Oficina $oficina ){

        $clientes = [];

        $subgerentes = Subgerente::where('oficina_id',$oficina->id)->get();

        foreach( $subgerentes as $subgerente ){
            foreach( $subgerente->grupos()->get() as $grupo ){
                foreach( $grupo->vendedores()->get() as $vendedor ){
                    foreach( $vendedor->clientes()->get() as $cliente ){
                        $clientes[] = $cliente;
                    }
                }
            }
        }

        // foreach( $clientes as $cliente ){
        //     echo $cliente->nombre . "<br>";
        // }

        return $clientes;
    }
}
