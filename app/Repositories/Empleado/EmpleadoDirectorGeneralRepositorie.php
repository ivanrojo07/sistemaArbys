<?php

namespace App\Repositories\Empleado;

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
}
