<?php

namespace App\Http\Controllers\Perfil;

use App\Perfil;
use App\Modulo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerfilController extends Controller
{
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
        $perfil = Perfil::create($request->all());
        $modulos = Modulo::find($request->input('modulo_id'));
        $perfil->modulos()->attach($modulos);
        $modulos = Modulo::get();
        return view('seguridad.perfil.view', ['perfil' => $perfil, 'modulos' => $modulos]);
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
        $modulos = Modulo::get();
        return view('seguridad.perfil.view', ['perfil' => $perfil, 'modulos' => $modulos]);
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
        $modulos = Modulo::get();
        return view('seguridad.perfil.edit', ['perfil' => $perfil, 'modulos' => $modulos]);
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
        $perfil->update($request->all());
        $modulos = Modulo::get();
        $mods = Modulo::find($request->input('modulo_id'));
        $perfil->modulos()->detach();
        $perfil->modulos()->attach($mods);
        return view('seguridad.perfil.view', ['perfil' => $perfil, 'modulos' => $modulos]);
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
        $perfil->modulos()->detach();
        $perfil->delete();
        $perfiles = Perfil::get();
        return view('seguridad.perfil.index', ['perfiles' => $perfiles]);
    }
}
