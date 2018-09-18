<?php

namespace App\Http\Controllers\Region;

use App\Region;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
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
        if($this->hasComponent('indice regiones')) {
        	$regiones = Region::get();
        	return view('region.index', ['regiones' => $regiones]);
        }
        return redirect()->route('denegado');
    }

    public function estados(Region $region) {
        if($this->hasComponent('indice regiones')) {
	        if($region->id !=0)
	            return view('region.estados',['region' => $region]);
	    }
        return redirect()->route('denegado');
    }
}
