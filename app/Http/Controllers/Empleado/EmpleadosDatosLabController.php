<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\EmpleadosDatosLab;
use App\Http\Controllers\Controller;
use App\TipoBaja;
use App\TipoContrato;
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
        // dd($datoslab);
        if ($datoslab == null) {
            # code...
            return redirect()->route('empleados.datoslaborales.create',['empleado'=>$empleado]);
        } else {
            # code...
            return view('empleadodatoslab.view',['empleado'=>$empleado,'datoslab'=>$datoslab]); 
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
        $datoslab = new EmpleadosDatosLab;
        $contratos = TipoContrato::get();
        $bajas = TipoBaja::get();
        $edit = false;
        return view('empleadodatoslab.create',['empleado'=>$empleado,'bajas'=>$bajas,'contratos'=>$contratos,'datoslab'=>$datoslab,'edit'=>$edit]);
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
        $datoslab = new EmpleadosDatosLab;
        $datoslab->empleado_id = $request->empleado_id;
        $datoslab->fechacontratacion = $request->fechacontratacion;
        $datoslab->area = $request->area;
        $datoslab->puesto = $request->puesto;
        $datoslab->salarionom = $request->salarionom;
        $datoslab->salariodia = $request->salariodia ;
        $datoslab->puesto_inicio = $request->puesto_inicio ;
        $datoslab->periodopaga = $request->periodopaga ;
        $datoslab->prestaciones = $request->prestaciones ;
        $datoslab->regimen = $request->regimen ;
        $datoslab->hentrada = $request->hentrada ;
        $datoslab->hsalida = $request->hsalida ;
        $datoslab->hcomida = $request->hcomida ;
        $datoslab->lugartrabajo = $request->lugartrabajo ;
        $datoslab->banco = $request->banco ;
        $datoslab->cuenta = $request->cuenta ;
        $datoslab->clabe = $request->clabe ;
        $datoslab->fechabaja = $request->fechabaja ;
        $datoslab->tipobaja_id = $request->tipobaja_id ;
        $datoslab->comentariobaja = $request->comentariobaja ;
        $datoslab->contrato_id = $request->contrato_id ;
        if ($request->bonopuntualidad == 'on') {
            # code...
            $datoslab->bonopuntualidad = true;
            // dd($request->all());
        } else {
            # code...
            $datoslab->bonopuntualidad = false;
        }
        $datoslab->save();
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
        $contratos = TipoContrato::get();
        $bajas = TipoBaja::get();
        $edit = true;
        return view('empleadodatoslab.create',['datoslab'=>$datoslab,'bajas'=>$bajas,'contratos'=>$contratos,'empleado'=>$empleado,'edit'=>$edit]);

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
