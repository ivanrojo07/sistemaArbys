<?php

namespace App\Http\Controllers\Empleado;
use App\EmpleadosDatosLab;
use App\Empleado;
use App\Area;
use App\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if($this->hasComponent('indice empleados')) {
            $empleados = Empleado::sortable()->paginate(10);
            return view('empleado.index', ['empleados' => $empleados]);
        }
        return redirect()->route('denegado');
    }

    public function create()
    {
        if($this->hasComponent('crear empleado')) {
            $empleado = new Empleado;
            $edit = false;
            return view('empleado.create',['empleado'=>$empleado,'edit'=>$edit]);
        }
        return redirect()->route('denegado');
    }

    public function store(Request $request)
    {
        if($this->hasComponent('crear empleado')) {
            if(Empleado::where('rfc', $request->input('rfc'))->first())
                return redirect()->back()->with('errors','El RFC ya existe.');
            else if (Empleado::where('email', $request->input('email'))->first())
                return redirect()->back()->with('errors','El email ya existe.');
            else {
                $empleado = Empleado::create($request->all());
                return redirect()->route('empleados.show', ['empleado' => $empleado])->with('success','Empleado Creado');
            }
        }
        return redirect()->route('denegado');
    }

    public function show(Empleado $empleado)
    {
        if($this->hasComponent('ver empleado')) {
            return view('empleado.view', ['empleado' => $empleado]);
        }
        return redirect()->route('denegado');
    }

    public function edit(Empleado $empleado)
    {
        if($this->hasComponent('editar empleado')) {
            return view('empleado.create', ['empleado' => $empleado, 'edit' => true]);
        }
        return redirect()->route('denegado');
    }

    public function update(Request $request, Empleado $empleado)
    {
        if($this->hasComponent('editar empleado')) {
            $empleado->update($request->all());
            if($empleado->user) {
                $empleado->user->email = $empleado->email;
                $empleado->user->save();
            }
            return redirect()->route('empleados.show', ['empleado' => $empleado])->with('success', 'Empleado Actualizado');
        }
        return redirect()->route('denegado');

    }

    public function destroy(Empleado $empleado) {}

    // Añadido : Iyari 05/Dic/2017
    public function consulta()
    {
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
        return view('empleado.busqueda', ['empleados'=>$empleados]);
    }

}
