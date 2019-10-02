<?php

namespace App\Repositories\Empleado;

use App\Vendedor;

class EmpleadoDirectorGeneralRepositorie
{

    public function getVendedores($empleado)
    {
        return Vendedor::get();
    }
}
