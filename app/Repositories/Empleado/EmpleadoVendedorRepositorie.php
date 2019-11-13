<?php

namespace App\Repositories\Empleado;

use App\Empleado;
use App\User;
use Illuminate\Support\Facades\Auth;

class EmpleadoVendedorRepositorie
{

    public function getVendedores($empleado)
    {
        return $empleado->vendedor()->with('clientes.crm')->get();
    }

    public function getUsers($empleado)
    {
        return User::where('empleado_id', Auth::user()->empleado->user->id)->get();
    }

    public function getEmpleados($empleado)
    {
        return Empleado::where('id', Auth::user()->empleado->id);
    }
}
