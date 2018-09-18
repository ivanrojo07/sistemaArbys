<?php

namespace App\Http\Controllers\Estado;

use App\Estado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstadoController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "oficinas")
                        return $next($request);
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }

    private function hasComponent($nombre) {
        foreach (Auth::user()->perfil->componentes as $componente)
            if($componente->nombre == $nombre)
                return true;
        return false;
    }

    public function index()
    {
        if($this->hasComponent('indice estados')) {
	        $estados = Estado::get();
	        return view('estado.index', ['estados' => $estados]);
        }
        return redirect()->route('denegado');
    }

    public function region(Estado $estado) {
        if($this->hasComponent('indice estados')) {
	        if($estado->id !=0)
	            return $estado->region->nombre;
        }
        return redirect()->route('denegado');
    }
}
