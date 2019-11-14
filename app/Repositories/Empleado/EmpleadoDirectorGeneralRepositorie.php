<?php

namespace App\Repositories\Empleado;

use App\Cliente;
use App\Empleado;
use App\Laboral;
use App\User;
use App\Vendedor;

class EmpleadoDirectorGeneralRepositorie
{

    public function getVendedores($empleado)
    {

        $empleados = Laboral::where('puesto_id', 7)
            ->with('empleado.vendedor')
            ->get()
            ->pluck('empleado')
            ->flatten()
            ->unique();

        $vendedores = $empleados->pluck('vendedor')->filter()->flatten();

        return $vendedores;
    }

    public function getUsers($empleado){
        return User::whereNotIn('id', [1])->get();
    }

    public function getEmpleados($empleado){
        return Empleado::whereNotIn('id',[1])->get();
    }

    public function getClientes($empleado){
        return Cliente::get();
    }
}
