<?php

namespace App\Http\Controllers\Usuario;

use App\Usuario;
use App\Perfil;
use App\Puesto;
use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::get();
        return view('seguridad.usuario.index', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfiles = Perfil::get();
        $puestos = Puesto::get();
        $areas = Area::get();
        return view('seguridad.usuario.create', ['perfiles' => $perfiles, 'puestos' => $puestos, 'areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = Usuario::create($request->all());
        return view('seguridad.usuario.view', ['usuario' => $usuario]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        return view('seguridad.usuario.view', ['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfiles = Perfil::get();
        $puestos = Puesto::get();
        $areas = Area::get();
        $usuario = Usuario::find($id);
        return view('seguridad.usuario.edit', ['usuario' => $usuario, 'perfiles' => $perfiles, 'puestos' => $puestos, 'areas' => $areas]);
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
        $usuario = Usuario::find($id);
        $usuario->update($request->all());
        return view('seguridad.usuario.view', ['usuario' => $usuario]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return $this->index();
    }
}
