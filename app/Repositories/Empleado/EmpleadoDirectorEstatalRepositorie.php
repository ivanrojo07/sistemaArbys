<?php

namespace App\Repositories\Empleado;

use App\Laboral;
use App\User;
use App\Vendedor;

class EmpleadoDirectorEstatalRepositorie
{

    public function getVendedores($empleado)
    {
        $estado = $empleado->estado()->first();
        $laborals = Laboral::where('estado_id', $estado->id)->get();
        $empleados_id = $laborals ? $laborals->pluck('empleado_id')->flatten() : null;
        $vendedores = $empleados_id ? Vendedor::whereIn('empleado_id', $empleados_id)->with('clientes.crm')->get() : null;
        return $vendedores;
    }

    public function getUsers($empleado){
        return User::get();
    }
}
