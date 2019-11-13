<?php

namespace App\Repositories\Empleado;

use App\Gerente;
use App\Laboral;

class EmpleadoGerenteRepositorie
{

    public function getVendedores($empleado)
    {
        $gerente = Gerente::where('empleado_id', $empleado->id)->first();
        $oficina = $gerente->oficina()->first();

        $empleados = Laboral::where('oficina_id', $oficina->id)
            ->where('puesto_id', 7)
            ->with('empleado.vendedor')
            ->get()
            ->pluck('empleado')
            ->flatten()
            ->unique();

        $vendedores = $empleados->pluck('vendedor')->filter()->flatten();
        return $vendedores;
    }

    // public function getUsuarios($empleado){

    //     $gerente = Gerente::where('empleado_id',$empleado->id)->first();
    //     $oficina = $gerente->oficina;

    //     $empleados = Laboral::where('oficina_id', $oficina->id)
    //         ->with('empleado.')
        

    // }
}
