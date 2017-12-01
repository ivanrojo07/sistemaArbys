<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\EmpleadosDatosLab;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpleadosDatosLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        //
        $datoslab = $empleado->datosLab;
        return view('empleadodatoslab.view',['empleado'=>$empleado,'datoslab'=>$datoslab]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        //
        $datoslab = new EmpleadosDatosLab;
        $edit = false;
        return view('empleadodatoslab.create',['empleado'=>$empleado,'datoslab'=>$datoslab,'edit'=>$edit]);
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
        $datoslab = EmpleadosDatosLab::create($request->all());
        return redirect()->route('empleados.datoslaborales.index',['empleado'=>$empleado,'datoslab'=>$datoslab]);
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
    public function edit(Empleado $empleado,$datoslaborale)
    {
        //
        $datoslab = $empleado->datosLab;
        $edit = true;
        return view('empleadodatoslab.create',['datoslab'=>$datoslab,'empleado'=>$empleado,'edit'=>$edit]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado, $datoslaborale)
    {
        //
        $datoslab = EmpleadosDatosLab::findOrFail($datoslaborale);
        $datoslab->update($request->all());
        return redirect()->route('empleados.datoslaborales.index',['empleado'=>$empleado,'datoslab'=>$datoslab]);
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
