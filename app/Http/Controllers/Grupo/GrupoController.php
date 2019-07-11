<?php

namespace App\Http\Controllers\Grupo;

use App\Grupo;
use App\Subgerente;
use App\Vendedor;
use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class GrupoController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                if(Auth::user()->empleado->gerente)
                    return $next($request);
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
        $grupos = Grupo::get();
        $empleado = Auth::user()->empleado;
        $grupos_vista = [];
        if ($empleado->id > 1 && isset($empleado->laborales)) {
            switch ($empleado->laborales->last()->puesto->nombre) {

                case 'Subgerente':
                    $subgerente = $empleado->subgerente;
                    foreach ($subgerente->grupos as $grupo) {
                        $grupos_vista[] = $grupo;
                    }
                    break;

                case 'Gerente':
                    $empleados_oficina = $empleado->laborales->last()->oficina->laborales;
                    /* la variable arreglo_lab va a contener los datos laborales de los empleados en la 
                    *  oficina dada sin repetir un empleado por los cambios en sus datos laborales.
                    */
                    $arreglo_lab = [];
                    foreach ($empleados_oficina as $empleados) {
                        $arreglo_lab[$empleados->empleado_id] = $empleados;
                    }
                    foreach ($arreglo_lab as $laboral) {
                            
                        if(isset($laboral->empleado->subgerente)){
                            foreach ($laboral->empleado->subgerente->grupos as $grupo) {
                                $grupos_vista[] = $grupo;
                            }
                        }
                            
                    }

                    break;

                case 'Director Estatal':
                    $estado = $empleado->laborales->last()->estado;
                    $arreglo_lab = [];

                    foreach ($estado->oficinas as $oficinas) {
                        foreach ($oficinas->laborales as $laboral) {
                            $arreglo_lab[$laboral->empleado_id] = $laboral;
                        }
                    }

                    foreach ($arreglo_lab as $laboral) {
                            
                        if(isset($laboral->empleado->subgerente)){
                            foreach ($laboral->empleado->subgerente->grupos as $grupo) {
                                $grupos_vista[] = $grupo;
                            }
                        }
                            
                    }

                    break;

                case 'Director Regional':
                    $region = $empleado->laborales->last()->region;
                    $arreglo_lab = [];

                    foreach ($region->datosLab as $laboral) {
                        $arreglo_lab[$laboral->empleado_id] = $laboral;
                    }

                    foreach ($arreglo_lab as $laboral) {
                            
                        if(isset($laboral->empleado->subgerente)){
                            foreach ($laboral->empleado->subgerente->grupos as $grupo) {
                                $grupos_vista[] = $grupo;
                            }
                        }
                    }
                    break;
                
                default:
                    return view('grupos.index', ['grupos' => $grupos_vista]);
                    break;
            }
            return view('grupos.index', ['grupos' => $grupos_vista]);
        }
        return view('grupos.index', ['grupos' => $grupos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = Auth::user()->empleado;
        if($empleado->id == 1) {
            $subgerentes = Subgerente::get();
        } else {
            $laborales = $empleado->laborales->last()->oficina->laborales;
            $arr = [];
            foreach ($laborales as $laboral) {
                $arr[] = $laboral->empleado;
            }
            $arr = array_unique($arr);
            $subgerentes = [];
            foreach ($arr as $emp) {
                $subgerentes[] = $emp->subgerente;
            }
            $subgerentes = array_filter($subgerentes);
        }
        return view('grupos.create', ['subgerentes' => $subgerentes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = Grupo::create($request->all());
        return redirect()->route('grupos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        return view('grupos.view', ['grupo' => $grupo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        $empleado = Auth::user()->empleado;
        if ($empleado->id != "1") {
            $laborales = $empleado->laborales->last()->oficina->laborales;
            $arr = [];
            foreach ($laborales as $laboral) {
                $arr[] = $laboral->empleado;
            }
            $arr = array_unique($arr);
            $subgerentes = [];
            foreach ($arr as $emp) {
                $subgerentes[] = $emp->subgerente;
            }
            $subgerentes = array_filter($subgerentes);
        }
        else{
            $empleados = Empleado::get();
            $subgerentes = [];
            foreach ($empleados as $empleado) {
                if ($empleado->subgerente != null) {
                    $subgerentes[] = $empleado->subgerente;
                }
            }
        }
        
        return view('grupos.edit', ['grupo' => $grupo, 'subgerentes' => $subgerentes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        $grupo->update($request->all());
        return view('grupos.view', ['grupo' => $grupo]);
    }

    public function vendedores(Grupo $grupo) {
        $empleado = Auth::user()->empleado;
        //return dd($empleado->laborales->last());

        $laborales = $empleado->laborales->last()->oficina->laborales;
        $arr = [];
        foreach ($laborales as $laboral) {
            $arr[] = $laboral->empleado;
        }
        $arr = array_unique($arr);
        $vendedores = [];
        foreach ($arr as $emp) {
            if(isset($emp->vendedor) and !$emp->vendedor->grupo)
                $vendedores[] = $emp->vendedor;
        }
        return view('grupos.vendedores', ['grupo' => $grupo, 'vendedores' => $vendedores]);
    }

    public function bind(Request $request, Grupo $grupo) {
        $vendedor = Vendedor::find($request->vendedor_id);
        $vendedor->grupo_id = $grupo->id;
        $vendedor->save();
        return redirect()->route('grupos.show', ['grupo' => $grupo]);
    }

    public function unbind(Request $request, Grupo $grupo) {
        $vendedor = Vendedor::find($request->vendedor_id);
        $vendedor->grupo_id = null;
        $vendedor->save();
        return redirect()->route('grupos.show', ['grupo' => $grupo]);
    }


    public function destroy(Grupo $grupo){
        foreach($grupo->vendedores as $vendedor){
            $vendedor->grupo_id = null;
            $vendedor->save();
        }
        
        $grupo->delete();
        return redirect()->route('grupos.index');
    }


}
