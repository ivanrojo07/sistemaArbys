<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Laboral;
use Illuminate\Http\Request;

class PruebasController extends Controller
{
    public function create()
    {
        $laborales = Laboral::where('empleado_id',3)->get();

        $laborales = $laborales->filter( function($laboral){
            return $laboral == Laboral::where('empleado_id',$laboral->empleado_id)->get()->last();
        } );

        return $laborales;
    }
}
