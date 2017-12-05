<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\EmpleadosVacaciones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpleadosVacacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        //
        $vacaciones = $empleado->vacaciones;
        return view('empleadovacaciones.view',['empleado'=>$empleado, 'vacaciones'=>$vacaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create(Empleado $empleado)
    {
        //
        $vacaciones = new EmpleadosVacaciones;
        // $edit = false;
        // return view('empleadosvacaciones.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Empleado $empleado)
    {
        //
        $vacacion = EmpleadosVacaciones::create($request->all());
        return redirect()->route('empleados.vacaciones.index',['empleado'=>$empleado]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
