<?php

namespace App\Http\Controllers\EmpleadoComercial;

use App\EmpleadoComercial;
use App\Oficina;
use App\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class EmpleadoComercialController extends Controller
{
    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                $user = Auth::user();
                $modulos = $user->perfil->modulos;
                foreach ($modulos as $modulo) {
                    if($modulo->nombre == "rh")
                        return $next($request);
                }
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = EmpleadoComercial::get();
        return view('empleadocomercial.index', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oficinas = Oficina::get();
        $estados = Estado::get();
        return view('empleadocomercial.create', ['oficinas' => $oficinas, 'estados' => $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oficina = Oficina::find($request->input('oficina_id'));
        $identificador = $oficina->abreviatura . $request->input('appaterno')[0];
        $request->merge(['identificador' => $identificador]);
        $empleado = EmpleadoComercial::create($request->all());
        return view('empleadocomercial.view', ['empleado' => $empleado]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = EmpleadoComercial::find($id);
        return view('empleadocomercial.view', ['empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = EmpleadoComercial::find($id);
        $oficinas = Oficina::get();
        return view('empleadocomercial.edit', ['empleado' => $empleado, 'oficinas' => $oficinas]);
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
        $oficina = Oficina::find($request->input('oficina_id'));
        $identificador = $oficina->abreviatura . $request->input('appaterno')[0];
        $request->merge(['identificador' => $identificador]);
        $empleado = EmpleadoComercial::find($id)->update($request->all());
        $empleado = EmpleadoComercial::find($id);
        return view('empleadocomercial.view', ['empleado' => $empleado]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
