<?php

namespace App\Http\Controllers\Empleado;

use App\EmpleadosDatosLab;
use App\Empleado;
use App\Area;
use App\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class EmpleadoController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "rh")
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
        // if($this->hasComponent('indice empleados')) {
        $empleados = Empleado::whereNotIn('id', [1])->sortable()->paginate(10);
        return view('empleado.index', ['empleados' => $empleados]);
        // }
        // return redirect()->route('denegado');
    }

    public function create()
    {
        // if($this->hasComponent('crear empleado')) {
        return view('empleado.create');
        // }
        // return redirect()->route('denegado');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|alpha',
            'appaterno' => 'required|alpha',
            'apmaterno' => 'nullable|alpha',
            'nacimiento' => 'required',
            'rfc' => 'required|alpha_num',
            'homoclave' => 'required|alpha_num|size:3',
            'email' => 'required|email',
            'telefono' => 'nullable|numeric',
            'movil' => 'nullable|numeric',
            'nss' => 'nullable|alpha_num',
            'curp' => 'nullable|alpha_num',
            'infonavit' => 'nullable',
            'tipo_empleado' => 'required',
        ],[],[
            'appaterno' => 'apellido paterno',
            'apmaterno' => 'apellido materno',
            'rfc' => 'RFC',
            'email' => 'Correo',
            'curp' => 'CURP',
        ]);
        if ($validator->fails()) {
            return redirect('empleados/create')
                        ->withErrors($validator->errors())
                        ->withInput();
        }
        if(Empleado::where('rfc', $request->input('rfc'))->first())
            return redirect()->back()->with('errors','El RFC ya existe.');
        else if (Empleado::where('email', $request->input('email'))->first())
            return redirect()->back()->with('errors','El email ya existe.');
        else {
            $empleado = Empleado::create($request->all());
            return redirect()->route('empleados.show', ['empleado' => $empleado]);
        }
    }

    public function show(Empleado $empleado)
    {
        // if($this->hasComponent('ver empleado')) {
        return view('empleado.view', ['empleado' => $empleado]);
        // }
        // return redirect()->route('denegado');
    }

    public function edit(Empleado $empleado)
    {
        // if($this->hasComponent('editar empleado')) {
        return view('empleado.edit', ['empleado' => $empleado]);
        // }
        // return redirect()->route('denegado');
    }

    public function update(Request $request, Empleado $empleado)
    {
        // if($this->hasComponent('editar empleado')) {
        $empleado->update($request->all());
        if($empleado->user) {
            $empleado->user->email = $empleado->email;
            $empleado->user->save();
        }
        return redirect()->route('empleados.show', ['empleado' => $empleado]);
        // }
        // return redirect()->route('denegado');

    }
    
    public function consulta() {
        return view('empleado.consulta');
    } 

    public function buscar(Request $request) {
        $query = $request->input('busqueda');
        $wordsquery = explode(' ', $query);
        $empleados = Empleado::where(function($q) use($wordsquery) {
            foreach ($wordsquery as $word) {
                $q->orWhere('nombre', 'LIKE',"%$word%")
                  ->orWhere('appaterno', 'LIKE', "%$word%")
                  ->orWhere('apmaterno', 'LIKE', "%$word%")
                  ->orWhere('rfc', 'LIKE', "%$word%");
            }
        })->get();
        return view('empleado.busqueda', ['empleados' => $empleados]);
    }

}
