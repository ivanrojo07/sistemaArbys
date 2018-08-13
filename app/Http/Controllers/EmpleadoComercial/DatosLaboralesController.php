<?php

namespace App\Http\Controllers\EmpleadoComercial;

use App\EmpleadoComercial;
use App\Sucursal;
use App\EmpleadosDatosLab;
use App\Http\Controllers\Controller;
use App\TipoBaja;
use App\TipoContrato;
use App\Area;
use App\Puesto;
use App\Banco;
use Illuminate\Http\Request;
class DatosLaboralesController extends Controller
{
    public function index($id)
    {
        $empleado = EmpleadoComercial::find($id);
        return view('empleadocomercial.laborales.create', ['empleado' => $empleado]);
        /*
        $datoslaborales = $empleado->datosLaborales;
        $areas = Area::get();
        $puestos = Puesto::get();
        $sucursales = Sucursal::get();
        $bancos = Banco::get();
        $contratos = TipoContrato::get();
        
        if(count($datoslaborales) == 0)
            return redirect()->route('empleados.datoslaborales.create', ['empleado' => $empleado]);
        else {
            $datoslab = $empleado->datosLaborales()->orderBy('created_at', 'desc')->first();
            $area=Area::where('id', $datoslab->area_id)->first();
            $puesto=Puesto::where('id', $datoslab->puesto_id)->first();
            $contrato=TipoContrato::where('id', $datoslab->contrato_id)->first();
            $sucursal=Sucursal::where('id', $datoslab->sucursal_id)->first();

            return view('empleadodatoslab.index', [
                'empleado'=>$empleado,
                'datoslaborales'=>$datoslaborales,
                'areas'=>$areas,
                'puestos'=>$puestos,
                'sucursales'=>$sucursales,
                'datoslab'=>$datoslab,
                'area'=>$area,
                'puesto'=>$puesto,
                'contrato'=>$contrato,
                'contratos'=>$contratos,
                'sucursal'=>$sucursal,
                'bancos'=>$bancos
            ]); 
        }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
