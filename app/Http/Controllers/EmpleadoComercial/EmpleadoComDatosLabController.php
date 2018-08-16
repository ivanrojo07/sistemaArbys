<?php

namespace App\Http\Controllers\EmpleadoComercial;

use App\EmpleadoComercial;
use App\Sucursal;
use App\EmpleadoComDatosLab;
use App\TipoBaja;
use App\TipoContrato;
use App\Area;
use App\Puesto;
use App\Banco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpleadoComDatosLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $empleado = EmpleadoComercial::find($id);
        if(count($empleado->datosLaborales) == 0)
            return $this->create($id);
        else
            return $this->show($id);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $empleado = EmpleadoComercial::find($id);
        $datoslab = new EmpleadoComDatosLab;
        $contratos = TipoContrato::get();
        $bajas = TipoBaja::get();
        $areas = Area::get();
        $puestos = Puesto::get();
        $sucursales = Sucursal::get();
        $bancos = Banco::get();
        return view('empleadocomercial.laborales.create', [
            'empleado' => $empleado,
            'bajas' => $bajas,
            'contratos' => $contratos,
            'datoslab' => $datoslab, 
            'areas' => $areas, 
            'puestos' => $puestos,
            'sucursales' => $sucursales,
            'bancos' => $bancos
        ]);
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
        $datoslab = new EmpleadoComDatosLab;
        $datoslab->empleado_comercial_id = $request->empleado_comercial_id;

        $datoslab->fechacontratacion = $request->fechacontratacion;
        $datoslab->fechaactualizacion = date("Y-m-d");

        
      
        $datoslab->area_id = $request->area_id;
        $datoslab->puesto_id = $request->puesto_id;

        $datoslab->sucursal_id = $request->sucursal_id;
        
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
        $datoslab->contrato_id = $request->contrato_id ;
        $datoslab->save();

        $empleado = EmpleadoComercial::find($request->empleado_comercial_id);
        $areas =   Area::get();
        $puestos = Puesto::get();
        $sucursales =Sucursal::get();
        $bancos= Banco::get();
        $contratos=TipoContrato::get();
        $area=Area::where('id',$datoslab->area_id)->first();
        $puesto=Puesto::where('id',$datoslab->puesto_id)->first();
        $contrato=TipoContrato::where('id',$datoslab->contrato_id)->first();
        $sucursal=Sucursal::where('id',$datoslab->sucursal_id)->first();

        return view('empleadocomercial.laborales.view', [
                'empleado'=>$empleado,
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = EmpleadoComercial::find($id);
        $areas = Area::get();
        $puestos = Puesto::get();
        $sucursales = Sucursal::get();
        $bancos= Banco::get();
        $contratos = TipoContrato::get();

        $datoslab = $empleado->datosLaborales()->first();
        $area = $datoslab->areas;
        $puesto = $datoslab->puestos;
        $contrato = $datoslab->tipocontrato;
        $sucursal = $datoslab->sucursal;

        // $area = Area::where('id', $datoslab->area_id)->first();
        // $puesto = Puesto::where('id', $datoslab->puesto_id)->first();
        // $contrato = TipoContrato::where('id', $datoslab->contrato_id)->first();
        // $sucursal = Sucursal::where('id', $datoslab->sucursal_id)->first();

        return view('empleadocomercial.laborales.view',[
            'empleado' => $empleado,
            'areas' => $areas,
            'puestos' => $puestos,
            'sucursales' => $sucursales,
            'datoslab' => $datoslab,
            'area' => $area,
            'puesto' => $puesto,
            'contrato' => $contrato,
            'contratos' => $contratos,
            'sucursal' => $sucursal,
            'bancos' => $bancos
        ]); 
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
