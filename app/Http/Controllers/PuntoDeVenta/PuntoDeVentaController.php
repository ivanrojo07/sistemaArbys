<?php

namespace App\Http\Controllers\PuntoDeVenta;

use App\PuntoDeVenta;
use App\Oficina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PuntoDeVentaController extends Controller
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
        if($this->hasComponent('indice puntos')) {
            $puntos = PuntoDeVenta::get();
            return view('puntodeventa.index', ['puntos' => $puntos]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->hasComponent('crear punto')) {
            $oficinas = Oficina::get();
            return view('puntodeventa.create', ['oficinas' => $oficinas]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->hasComponent('crear punto')) {
            $punto = PuntoDeVenta::create($request->all());
            return view('puntodeventa.view', ['punto' => $punto]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->hasComponent('ver punto')) {
            $punto = PuntoDeVenta::find($id);
            return view('puntodeventa.view', ['punto' => $punto]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->hasComponent('editar punto')) {
            $punto = PuntoDeVenta::find($id);
            $oficinas = Oficina::get();
            return view('puntodeventa.edit', ['punto' => $punto, 'oficinas' => $oficinas]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($this->hasComponent('editar punto')) {
            $punto = PuntoDeVenta::find($id);
            $punto->update($request->except('_method', '_token'));
            return view('puntodeventa.view', ['punto' => $punto]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
