<?php

namespace App\Repositories\Empleado;

class EmpleadoVendedorRepositorie
{

    public function getVendedores($empleado)
    {
        return $empleado->vendedor()->with('clientes.crm')->get();
    }
}
