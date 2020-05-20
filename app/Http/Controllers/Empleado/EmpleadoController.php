<?php

namespace App\Http\Controllers\Empleado;

use App\EmpleadosDatosLab;
use App\Empleado;
use App\Area;
use App\Factories\Empleado\EmpleadoRepositorieFactory;
use App\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class EmpleadoController extends Controller
{

    public function __construct(EmpleadoRepositorieFactory $empleadoRepositorieFactory)
    {

        $this->empleadoRepositorieFactory = $empleadoRepositorieFactory;

        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if ($componente->modulo->nombre == "rh")
                        return $next($request);
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }

    private function hasComponent($nombre)
    {
        foreach (Auth::user()->perfil->componentes as $componente)
            if ($componente->nombre == $nombre)
                return true;
        return false;
    }

    public function index()
    {

        $empleado = Auth::user()->empleado;
        $puesto = $empleado->puesto;

        $empleados = $this->empleadoRepositorieFactory
            ->make($puesto)
            ->getEmpleados($empleado);

        return view('empleado.index', ['empleados' => $empleados]);
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
            'nombre' => 'required|string',
            'appaterno' => 'required|string',
            'apmaterno' => 'nullable|alpha',
            'nacimiento' => 'required',
            'rfc' => 'required|alpha_num',
            'homoclave' => 'nullable|alpha_num|size:3',
            'email' => 'required|email',
            'telefono' => 'nullable|numeric',
            'movil' => 'nullable|numeric|required',
            'nss' => 'nullable|alpha_num',
            'curp' => 'nullable|alpha_num',
            'infonavit' => 'nullable',
            'tipo_empleado' => 'required',
        ], [], [
            'appaterno' => 'apellido paterno',
            'apmaterno' => 'apellido materno',
            'rfc' => 'RFC',
            'email' => 'Correo',
            'curp' => 'CURP',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors()->all())
                ->withInput();
        }
        if (Empleado::where('rfc', $request->input('rfc'))->first()) {
            return redirect()->back()->withErrors(['error' => 'El RFC ya existe.']);
        }

        if (Empleado::where('email', $request->input('email'))->first()) {
            return redirect()->back()->withErrors(['error' => 'El email ya existe.']);
        }

        $empleado = Empleado::create($request->all());
        return redirect()->route('empleados.show', ['empleado' => $empleado]);
    }

    public function show(Empleado $empleado)
    {
        return view('empleado.view', ['empleado' => $empleado]);
    }

    public function edit(Empleado $empleado)
    {
        return view('empleado.edit', ['empleado' => $empleado]);
    }

    public function update(Request $request, Empleado $empleado)
    {
        $empleado->update($request->all());
        if ($empleado->user) {
            $empleado->user->email = $empleado->email;
            $empleado->user->save();
        }
        return redirect()->route('empleados.show', ['empleado' => $empleado]);
    }

    public function delete(Request $request)
    {
        $empleado_id = $request->input('empleado_id');
        $empleado = Empleado::find($empleado_id);
        !$empleado->user ?: $empleado->user->delete();
        $empleado->delete();
        return redirect()->back()->with('status', '¡Empleado eliminado exitosamente!');
    }

    public function recuperar($id)
    {
        $empleado = Empleado::withTrashed()->find($id);
        $empleado->restore();
        return redirect()->route('empleados.index')->with('status', '¡Empleado recuperado exitosamente!');
    }

    public function eliminados()
    {
        $empleados = Empleado::onlyTrashed()->get();
        // dd($empleados);
        return view('empleado.eliminados', compact('empleados'));
    }

    public function consulta()
    {
        return view('empleado.consulta');
    }

    public function buscar(Request $request)
    {
        $query = $request->input('busqueda');
        $wordsquery = explode(' ', $query);
        $empleados = Empleado::where(function ($q) use ($wordsquery) {
            foreach ($wordsquery as $word) {
                $q->orWhere('nombre', 'LIKE', "%$word%")
                    ->orWhere('appaterno', 'LIKE', "%$word%")
                    ->orWhere('apmaterno', 'LIKE', "%$word%")
                    ->orWhere('rfc', 'LIKE', "%$word%");
            }
        })->get();
        return view('empleado.busqueda', ['empleados' => $empleados]);
    }
}
