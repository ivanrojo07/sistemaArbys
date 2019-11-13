<?php

namespace App\Http\Controllers;

use App\Componente;
use App\Empleado;
use App\ExcelProduct;
use App\Laboral;
use Illuminate\Http\Request;

class PruebasController extends Controller
{
    public function create()
    {
        Componente::firstOrCreate([
            'modulo_id' => 3,
            'nombre' => 'asignar cliente'
        ],[
            'modulo_id' => 3,
            'nombre' => 'asignar cliente'
        ]);
        Componente::firstOrCreate([
            'modulo_id' => 2,
            'nombre' => 'eliminar empleado'
        ],[
            'modulo_id' => 2,
            'nombre' => 'eliminar empleado'
        ]);
    }
}
