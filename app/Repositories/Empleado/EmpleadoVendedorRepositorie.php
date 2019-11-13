<?php

namespace App\Repositories\Empleado;

use App\User;

class EmpleadoVendedorRepositorie
{

    public function getVendedores($empleado)
    {
        return $empleado->vendedor()->with('clientes.crm')->get();
    }

    public function getUsers($empleado)
    {
        return User::where('empleado_id', $empleado->user->id)->get();
    }
}
