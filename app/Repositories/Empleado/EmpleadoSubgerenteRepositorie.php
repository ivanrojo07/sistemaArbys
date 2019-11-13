<?php

namespace App\Repositories\Empleado;

use App\User;

class EmpleadoSubgerenteRepositorie{
    
    public function getVendedores($empleado){
        $subgerente = $empleado->subgerente()->first();
        $grupos = $subgerente->grupos()->with('vendedores.clientes.crm')->get();
        $vendedores = $grupos->pluck('vendedores')->flatten();

        // dd($empleado->vendedor);

        $vendedores = $vendedores->push( $empleado->vendedor )->unique();

        return $vendedores;
    }

    public function getUsers($empleado){
        return User::get();
    }

}