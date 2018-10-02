<?php

namespace App\Http\Controllers\Usuario;

use App\User;
use App\Perfil;
use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{

    const PERFIL_ID_ADMIN = 1;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "seguridad")
                        return $next($request);
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
        if($this->hasComponent('indice usuarios')) {
            $usuarios = User::get();
            return view('seguridad.usuario.index', ['usuarios' => $usuarios]);
        }
        return redirect()->route('denegado');
    }

    public function create()
    {
        if($this->hasComponent('crear usuario')) {
            $perfiles = Perfil::get();
            $empleados = Empleado::get();
            return view('seguridad.usuario.create', ['perfiles' => $perfiles, 'empleados' => $empleados]);
        }
        return redirect()->route('denegado');
    }

    public function store(Request $request)
    {
        if($this->hasComponent('crear usuario')) {
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
        return redirect()->route('denegado');
    }

    public function show($id)
    {
        if($this->hasComponent('ver usuario')) {
            $usuario = User::find($id);
            $seguridad = $this->hasSecurity($usuario->perfil);

            if($usuario->perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
                return redirect()->route('denegado');
            else {
                return view('seguridad.usuario.view', ['usuario' => $usuario]);
            }
        }
        return redirect()->route('denegado');
    }

    public function edit($id)
    {
        if($this->hasComponent('editar usuario')) {
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
        return redirect()->route('denegado');
    }

    public function update(Request $request, $id)
    {
        if($this->hasComponent('editar usuario')) {
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
        return redirect()->route('denegado');
    }

    public function destroy($id)
    {
        if($this->hasComponent('eliminar usuario')) {
            $usuario = User::find($id);
            $seguridad = $this->hasSecurity($usuario->perfil);

            if($usuario->perfil->id == self::PERFIL_ID_ADMIN || (Auth::user()->perfil->id != self::PERFIL_ID_ADMIN && $seguridad))
                return redirect()->route('denegado');
            else
                $usuario->delete();
                return $this->index();
        }
        return redirect()->route('denegado');
    }

}
