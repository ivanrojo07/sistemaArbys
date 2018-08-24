<?php

namespace App\Http\Controllers\Usuario;

use App\User;
use App\Perfil;
use App\Puesto;
use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    /**
     * Constante del id del perfil del admin
     *
     * @default 1
     */
    const PERFIL_ID_ADMIN = 1;

    /**
     * Usa un middleware para validar la sesión y el acceso al módulo de seguridad
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Verifica si un perfil contiene al módulo de seguridad
     *
     * @param App\Perfil $perfil
     * @return boolean
     */
    public function hasSecurity($perfil) {
        foreach ($perfil->modulos as $modulo)
            if($modulo->nombre == 'seguridad')
                return true;
        return false;
    }

    /**
     * Muestra un listado de los usuarios registrados
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::get();
        return view('seguridad.usuario.index', ['usuarios' => $usuarios]);
    }

    /**
     * Muestra el formulario de registro de usuarios
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
     * Almacena un nuevo usuario en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seguridad = $this->hasSecurity(Perfil::find($request->input('perfil_id')));

        if($request->input('perfil_id') == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
            return redirect()->route('denegado');
        else {
            $rules = [
                'perfil_id'=>'required|integer',
                'puesto_id'=>'required|integer',
                'area_id'=>'required|integer',
                'name'=>'required|alpha',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string',
                'nombre'=>'required|alpha',
                'appaterno'=>'required|alpha',
                'apmaterno'=>"nullable|alpha"
            ];
            $this->validate($request, $rules);
            $inputs = $request->all();
            $usuario = User::create([
                'name'=> $inputs['name'],
                'email'=>$inputs['email'],
                'password'=>bcrypt($inputs['password']),
                'nombre'=>$inputs['nombre'],
                'appaterno'=>$inputs['appaterno'],
                'apmaterno'=>$inputs['apmaterno'],
                'area_id'=>$inputs['area_id'],
                'perfil_id'=>$inputs['perfil_id'],
                'puesto_id'=>$inputs['puesto_id'],
            ]);
            return view('seguridad.usuario.view', ['usuario' => $usuario]);
        }
    }

    /**
     * Muestra a un usuario en concreto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        $seguridad = $this->hasSecurity($usuario->perfil);

        if($usuario->perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
            return redirect()->route('denegado');
        else {
            return view('seguridad.usuario.view', ['usuario' => $usuario]);
        }
    }

    /**
     * Muestra el formulario para editar a un usuario en concreto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $seguridad = $this->hasSecurity($usuario->perfil);

        if($usuario->perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
            return redirect()->route('denegado');
        else {
            $perfiles = Perfil::get();
            $puestos = Puesto::get();
            $areas = Area::get();
            return view('seguridad.usuario.edit', ['usuario' => $usuario, 'perfiles' => $perfiles, 'puestos' => $puestos, 'areas' => $areas]);
        }
    }

    /**
     * Actualiza los datos de un usuario en concreto en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);
        $seguridad = $this->hasSecurity($usuario->perfil);

        if($request->input('perfil_id') == self::PERFIL_ID_ADMIN || $usuario->perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
            return redirect()->route('denegado');
        else {
            $rules = [
                'perfil_id'=>'required|integer',
                'puesto_id'=>'required|integer',
                'area_id'=>'required|integer',
                'name'=>'required|',
                'email' => 'required|string|email',
                'password' => 'nullable|string',
                'nombre'=>'required|alpha',
                'appaterno'=>'required|alpha',
                'apmaterno'=>"nullable|alpha"
            ];
            $this->validate($request, $rules);
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            if($request->input('password') != null)
                $usuario->password = bcrypt($request->input('password'));
            $usuario->nombre = $request->input('nombre');
            $usuario->appaterno = $request->input('appaterno');
            $usuario->apmaterno = $request->input('apmaterno');
            $usuario->area_id = $request->input('area_id');
            $usuario->perfil_id = $request->input('perfil_id');
            $usuario->puesto_id = $request->input('puesto_id');
            $usuario->save();
            $usuario = $usuario->fresh();
            return view('seguridad.usuario.view', ['usuario' => $usuario]);
        }
    }

    /**
     * Elimina a un usuario en concreto de la base de datos
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $seguridad = $this->hasSecurity($usuario->perfil);

        if($usuario->perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
            return redirect()->route('denegado');
        else
            $usuario->delete();
            return $this->index();
    }
}
