<?php

namespace App\Http\Controllers\Perfil;

use App\Perfil;
use App\Modulo;
use App\Componente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerfilController extends Controller
{
    const PERFIL_ID_ADMIN = 1;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                $user = Auth::user();
                $componentes = $user->perfil->componentes;
                foreach ($componentes as $componente) {
                    if($componente->modulo->nombre == "seguridad")
                        return $next($request);
                }
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }

    private function hasSecurity($perfil) {
        foreach ($perfil->componentes as $componente)
            if($componente->modulo->nombre == 'seguridad')
                return true;
        return false;
    }

    private function hasComponent($nombre) {
        foreach (Auth::user()->perfil->componentes as $componente)
            if($componente->nombre == $nombre)
                return true;
        return false;
    }
    
    public function index()
    {
        if($this->hasComponent('indice perfiles')) {
            $perfiles = Perfil::whereNotIn('id', [1])->get();
            return view('seguridad.perfil.index', ['perfiles' => $perfiles]);
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
        if($this->hasComponent('crear perfil')) {
            $modulos = Modulo::get();
            return view('seguridad.perfil.create', ['modulos' => $modulos]);
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
        if($this->hasComponent('crear perfil')) {
            $seguridad = false;
            if($request->input('componente_id') != null)
                foreach ($request->input('componente_id') as $id)
                    if(Componente::find($id)->modulo->nombre == 'seguridad')
                        $seguridad = true;

            if(Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad)
                return redirect()->route('denegado');
            $rules = [
                'nombre'=>'required|string|unique:perfils',
                'componente_id'=>'nullable|array'
            ];
            $this->validate($request, $rules);
            $perfil = Perfil::create($request->all());
            $componentes = Componente::find($request->input('componente_id'));
            $perfil->componentes()->attach($componentes);
            return redirect()->route('perfils.show', ['perfil' => $perfil]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        if($this->hasComponent('ver perfil')) {
            $seguridad = $this->hasSecurity($perfil);
            if($perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
                return redirect()->route('denegado');
            $modulos = Modulo::get();
            return view('seguridad.perfil.view', ['perfil' => $perfil, 'modulos' => $modulos]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        if($this->hasComponent('editar perfil')) {
            $seguridad = $this->hasSecurity($perfil);
            if($perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
                return redirect()->route('denegado');
            $modulos = Modulo::get();
            return view('seguridad.perfil.edit', ['perfil' => $perfil, 'modulos' => $modulos]);
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
    public function update(Request $request, Perfil $perfil)
    {
        if($this->hasComponent('editar perfil')) {
            $seguridad = false;
            if($request->input('componente_id') != null)
                foreach ($request->input('componente_id') as $id)
                    if(Componente::find($id)->modulo->nombre == 'seguridad')
                        $seguridad = true;
            if($perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
                return redirect()->route('denegado');
            $rules = [
                'nombre'=>'required|string',
                'componente_id'=>'nullable|array'
            ];
            $this->validate($request, $rules);
            $perfil->nombre = $request->input('nombre');
            $componentes = Componente::get();
            $cmps = Componente::find($request->input('componente_id'));
            $perfil->componentes()->detach();
            $perfil->componentes()->attach($cmps);
            $perfil->save();
            $perfil = $perfil->fresh();
            return redirect()->route('perfils.show', ['perfil' => $perfil]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        if($this->hasComponent('eliminar perfil')) {
            $seguridad = $this->hasSecurity($perfil);
            if($perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
                return redirect()->route('denegado');
            $perfil->componentes()->detach();
            $perfil->delete();
            return redirect()->route('perfils.index');
        }
        return redirect()->route('denegado');
    }
}
