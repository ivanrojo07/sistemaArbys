<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\EmpleadosEstudios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpleadosEstudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        //
        $estudios = $empleado->estudios;
        return view('empleadoestudios.view',['empleado'=>$empleado, 'estudios'=>$estudios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        //
        $estudios = new EmpleadosEstudios;
        $edit = false;
        return view('empleadoestudios.create',['empleado'=>$empleado,'estudios'=>$estudios,'edit'=>$edit]);
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
        $estudios = EmpleadosEstudios::create($request->all());
        return redirect()->route('empleadoestudios.view',['empleado'=>$empleado,'estudios'=>$estudios]);
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
    public function edit(Empleado $empleado,$estudio)
    {
        //
        $estudios = $empleado->estudios;
        $edit = true;
        return vew('empleadoestudios.create',['empleado'=>$empleado,'estudios'=>$estudios,'edit'=>$edit]);
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
        $estudios = EmpleadosEstudios::findOrFail($estudio);
        $estudios->update($request->all());
        return redirect()->route('empleadoestudios.view',['empleado'=>$empleado,'estudios'=>$estudios]);
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
