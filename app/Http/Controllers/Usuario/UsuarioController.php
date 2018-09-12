<?php

namespace App\Http\Controllers\Usuario;

use App\User;
use App\Perfil;
use App\Puesto;
use App\Area;
use App\Empleado;
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
        $empleados = Empleado::get();
        return view('seguridad.usuario.create', ['perfiles' => $perfiles, 'empleados' => $empleados]);
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
                'empleado_id'=>'required|integer',
                'name'=>'required|alpha',
                'password' => 'required|string'
            ];
            $this->validate($request, $rules);
            $inputs = $request->all();
            $empleado = Empleado::where('id', $inputs['empleado_id'])->first();
            $usuario = User::create([
                'name' => $inputs['name'],
                'email' => $empleado->email,
                'password' => bcrypt($inputs['password']),
                'perfil_id' => $inputs['perfil_id'],
                'empleado_id' => $inputs['empleado_id']
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
            $empleados = Empleado::get();
            return view('seguridad.usuario.edit', ['usuario' => $usuario, 'perfiles' => $perfiles, 'empleados' => $empleados]);
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
                'perfil_id' => 'required|integer',
                'empleado_id' => 'required|integer',
                'name' => 'required',
                'email' => 'nullable|email',
                'password' => 'nullable|string'
            ];
            $this->validate($request, $rules);
            $empleado = Empleado::where('id', $request->input('empleado_id'))->first();
            $usuario->name = $request->input('name');
            if($request->input('email') != null) {
                $empleado->email = $request->input('email');
                $empleado->save();
                $empleado = $empleado->fresh();
                $usuario->email = $empleado->email;
            } else {
                $usuario->email = $empleado->email;
            }
            if($request->input('password') != null)
                $usuario->password = bcrypt($request->input('password'));
            $usuario->perfil_id = $request->input('perfil_id');
            $usuario->empleado_id = $request->input('empleado_id');
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
