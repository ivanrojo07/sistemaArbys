<?php

namespace App\Http\Controllers\Grupo;

use App\Grupo;
use App\Subgerente;
use App\Vendedor;
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
