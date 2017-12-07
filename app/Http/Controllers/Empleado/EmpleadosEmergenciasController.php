<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\EmpleadosEmergencias;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpleadosEmergenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        //
        $emergencias = $empleado->emergencias;
        if ($emergencias == null) {
            # code...
            return redirect()->route('empleados.emergencias.create',['empleado'=>$empleado]);
        }
        else {

            return view('empleadoemergencia.view',['empleado'=>$empleado, 'emergencias'=>$emergencias]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        //
        $emergencias = new EmpleadosEmergencias;
        $edit = false;
        return view('empleadoemergencia.create',['empleado'=>$empleado,'emergencias'=>$emergencias,'edit'=>$edit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Empleado $empleado)
    {
        //
        $emergencias = EmpleadosEmergencias::create($request->all());
        return redirect()->route('empleados.emergencias.index',['empleado'=>$empleado,'emergencias'=>$emergencias]);

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
    public function edit(Empleado $empleado, $emergencia)
    {
        //
        $emergencias = $empleado->emergencias;
        $edit = true;
        return view('empleadoemergencia.create',['empleado'=>$empleado, 'emergencias'=>$emergencias,'edit'=>$edit]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado, $emergencia)
    {
        //
        $emergencias = EmpleadosEmergencias::findOrFail($emergencia);
        $emergencias->update($request->all());
        return redirect()->route('empleados.emergencias.index',['empleado'=>$empleado,'emergencias'=>$emergencias]);
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
