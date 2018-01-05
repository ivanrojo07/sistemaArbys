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
        if ($estudios == null) {
            # code...
            return redirect()->route('empleados.estudios.create',['empleado'=>$empleado]);
        } else {
            # code...
            return view('empleadoestudios.view',['empleado'=>$empleado, 'estudios'=>$estudios]);
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
        // dd($request->all());
        $estudios = new EmpleadosEstudios;
        $estudios->empleado_id = $request->empleado_id;
        $estudios->escolaridad1 = $request->escolaridad1;
        $estudios->institucion1 = $request->institucion1;
        $estudios->cedula1 = $request->cedula1;
        $estudios->escolaridad2 = $request->escolaridad2;
        $estudios->institucion2 = $request->institucion2;
        $estudios->cedula2 = $request->cedula2;
        $estudios->idioma1 = $request->idioma1;
        $estudios->nivel1 = $request->nivel1;
        $estudios->idioma2 = $request->idioma2;
        $estudios->nivel2 = $request->nivel2;
        $estudios->idioma3 = $request->idioma3;
        $estudios->nivel3 = $request->nivel3;
        $estudios->curso1 = $request->curso1;
        if ($request->certificado1 == "on") {
            # code...
            $estudios->certificado1 = true;
        }
        else {
            $estudios->certificado1 = false;   
        }
        $estudios->curso2 = $request->curso2;
        if ($request->certificado2 == "on") {
            # code...
            $estudios->certificado2 = true;
        } else {
            # code...
            $estudios->certificado2 = false;
        }
        $estudios->curso3 = $request->curso3;
        if ($request->certificado3 == "on") {
            # code...
            $estudios->certificado3 = true;
        } else {
            # code...
            $estudios->certificado3 = false;
        }
        // dd($estudios);
        $estudios->save();
        return redirect()->route('empleados.estudios.index',['empleado'=>$empleado,'estudios'=>$estudios]);
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
        return view('empleadoestudios.create',['empleado'=>$empleado,'estudios'=>$estudios,'edit'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado, $estudio)
    {
        //
        $estudios = EmpleadosEstudios::findOrFail($estudio);
        $estudios->escolaridad1 = $request->escolaridad1;
        $estudios->institucion1 = $request->institucion1;
        $estudios->cedula1 = $request->cedula1;
        $estudios->escolaridad2 = $request->escolaridad2;
        $estudios->institucion2 = $request->institucion2;
        $estudios->cedula2 = $request->cedula2;
        $estudios->idioma1 = $request->idioma1;
        $estudios->nivel1 = $request->nivel1;
        $estudios->idioma2 = $request->idioma2;
        $estudios->nivel2 = $request->nivel2;
        $estudios->idioma3 = $request->idioma3;
        $estudios->nivel3 = $request->nivel3;
        $estudios->curso1 = $request->curso1;
        if ($request->certificado1 == "on") {
            # code...
            $estudios->certificado1 = true;
        }
        else {
            $estudios->certificado1 = false;   
        }
        $estudios->curso2 = $request->curso2;
        if ($request->certificado2 == "on") {
            # code...
            $estudios->certificado2 = true;
        } else {
            # code...
            $estudios->certificado2 = false;
        }
        $estudios->curso3 = $request->curso3;
        if ($request->certificado3 == "on") {
            # code...
            $estudios->certificado3 = true;
        } else {
            # code...
            $estudios->certificado3 = false;
        }
        // dd($estudios);
        $estudios->save();
        return redirect()->route('empleados.estudios.index',['empleado'=>$empleado,'estudios'=>$estudios]);
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
