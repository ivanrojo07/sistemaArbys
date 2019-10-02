<?php

namespace App\Repositories\Empleado;

class EmpleadoSubgerenteRepositorie{
    
    public function getVendedores($empleado){
        $subgerente = $empleado->subgerente()->first();
        $grupos = $subgerente->grupos()->with('vendedores.clientes.crm')->get();
        $vendedores = $grupos->pluck('vendedores')->flatten();
        return $vendedores;
    }

}