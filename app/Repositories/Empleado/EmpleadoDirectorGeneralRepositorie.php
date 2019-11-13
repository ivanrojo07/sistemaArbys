<?php

namespace App\Repositories\Empleado;

use App\Cliente;
use App\Empleado;
use App\User;
use App\Vendedor;

class EmpleadoDirectorGeneralRepositorie
{

    public function getVendedores($empleado)
    {
        return Vendedor::get();
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
