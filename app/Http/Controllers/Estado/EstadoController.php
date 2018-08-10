<?php

namespace App\Http\Controllers\Estado;

use App\Estado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstadoController extends Controller
{
    public function index()
    {
        $estados = Estado::get();
        return view('estado.index', ['estados' => $estados]);
    }

    public function region(Estado $estado) {
        if($estado->id !=0)
            return $estado->region->nombre;
    }
}
