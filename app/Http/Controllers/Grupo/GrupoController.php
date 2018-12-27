<?php

namespace App\Http\Controllers\Grupo;

use App\Grupo;
use App\Subgerente;
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
        $laborales = $empleado->laborales->last()->oficina->laborales;
        // dd($laborales);
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
    public function show($id)
    {
        $grupo = Grupo::find($id);
        // dd($grupo->vendedores->last());
        return view('grupos.view', ['grupo' => $grupo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = Grupo::find($id);
        $subgerentes = Subgerente::where('puesto_id', 6)->get();
        return view('grupos.edit', ['grupo' => $grupo, 'subgerentes' => $subgerentes]);
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
        $grupo = Grupo::find($id);
        $grupo->update($request->all());
        return view('grupos.view', ['grupo' => $grupo]);
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
