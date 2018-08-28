<?php

namespace App\Http\Controllers\Perfil;

use App\Perfil;
use App\Modulo;
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
                $modulos = $user->perfil->modulos;
                foreach ($modulos as $modulo) {
                    if($modulo->nombre == "seguridad")
                        return $next($request);
                }
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }

    public function hasSecurity($perfil) {
        foreach ($perfil->modulos as $modulo)
            if($modulo->nombre == 'seguridad')
                return true;
        return false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfiles = Perfil::get();
        return view('seguridad.perfil.index', ['perfiles' => $perfiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modulos = Modulo::get();
        return view('seguridad.perfil.create', ['modulos' => $modulos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seguridad = false;
        if($request->input('modulo_id') != null)
            foreach ($request->input('modulo_id') as $id)
                if(Modulo::find($id)->nombre == 'seguridad')
                    $seguridad = true;

        if(Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad)
            return redirect()->route('denegado');
        else {
            $rules = [
                'nombre'=>'required|string|unique:perfils',
                'modulo_id'=>'nullable|array'
            ];
            $this->validate($request, $rules);
            $perfil = Perfil::create($request->all());
            $modulos = Modulo::find($request->input('modulo_id'));
            $perfil->modulos()->attach($modulos);
            $modulos = Modulo::get();
            return view('seguridad.perfil.view', ['perfil' => $perfil, 'modulos' => $modulos]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perfil = Perfil::find($id);
        $seguridad = $this->hasSecurity($perfil);

        if($perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
            return redirect()->route('denegado');
        else {
            $modulos = Modulo::get();
            return view('seguridad.perfil.view', ['perfil' => $perfil, 'modulos' => $modulos]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil = Perfil::find($id);
        $seguridad = $this->hasSecurity($perfil);

        if($perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
            return redirect()->route('denegado');
        else {
            $modulos = Modulo::get();
            return view('seguridad.perfil.edit', ['perfil' => $perfil, 'modulos' => $modulos]);
        }
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
        $perfil = Perfil::find($id);
        $seguridad = false;
        if($request->input('modulo_id') != null)
            foreach ($request->input('modulo_id') as $id)
                if(Modulo::find($id)->nombre == 'seguridad')
                    $seguridad = true;

        if($perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
            return redirect()->route('denegado');
        else {
            $rules = [
                'nombre'=>'required|string',
                'modulo_id'=>'nullable|array'
            ];
            $this->validate($request, $rules);
            $perfil->nombre = $request->input('nombre');
            $modulos = Modulo::get();
            $mods = Modulo::find($request->input('modulo_id'));
            $perfil->modulos()->detach();
            $perfil->modulos()->attach($mods);
            $perfil->save();
            $perfil = $perfil->fresh();
            return view('seguridad.perfil.view', ['perfil' => $perfil, 'modulos' => $modulos]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perfil = Perfil::find($id);
        $seguridad = $this->hasSecurity($perfil);

        if($perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
            return redirect()->route('denegado');
        else {
            $perfil->modulos()->detach();
            $perfil->delete();
            $perfiles = Perfil::get();
            return view('seguridad.perfil.index', ['perfiles' => $perfiles]);
        }
    }
}
