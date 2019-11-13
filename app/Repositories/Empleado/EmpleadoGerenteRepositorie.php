<?php

namespace App\Repositories\Empleado;

use App\Cliente;
use App\Empleado;
use App\Gerente;
use App\Laboral;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

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

    public function getUsers($empleado)
    {

        $gerente = Gerente::where('empleado_id', $empleado->id)->first();
        $oficina = $gerente->oficina;


        // dd(Auth::user()->empleado()->with('puesto')->get());

        $users = Laboral::where('oficina_id', $oficina->id)
            ->whereHas('empleado')
            ->with('empleado.user')
            ->get()
            ->pluck('empleado')
            ->unique()
            ->pluck('user')
            ->filter()
            ->unique();

        return $users;
    }

    public function getEmpleados($empleado){

        $gerente = Gerente::where('empleado_id', $empleado->id)->first();
        $oficina = $gerente->oficina;

        $empleados = Laboral::where('oficina_id', $oficina->id)
            ->whereHas('empleado')
            ->get()
            ->pluck('empleado')
            ->unique();

        return $empleados;

    }

    public function getClientes($empleado){
        return Cliente::get();
    }
}
