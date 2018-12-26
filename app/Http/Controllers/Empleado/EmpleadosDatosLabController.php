<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\Sucursal;
use App\EmpleadosDatosLab;
use App\Http\Controllers\Controller;
use App\TipoBaja;
use App\TipoContrato;
use App\Area;
use App\Puesto;
use App\Banco;
use App\Region;
use App\Estado;
use App\Oficina;
use App\Vendedor;
use App\Grupo;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;

class EmpleadosDatosLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        $laborales = $empleado->laborales;
        if (count($laborales) > 0) {
            $subg = Empleado::find($laborales->first()->subgerente);
            $datoslab = $empleado->laborales->last();
            return view('empleado.laborales.index', ['empleado' => $empleado, 'laborales' => $laborales, 'datoslab' => $datoslab, 'subgerente' => $subg]); 
        } else
            return redirect()->route('empleados.laborals.create', ['empleado' => $empleado]);
    }

    public function estados(Region $region) {
        if($region->id !=0)
            return view('empleado.laborales.estados', ['region' => $region]);
    }

    public function oficinas(Estado $estado) {
        if($estado->id !=0)
            return view('empleado.laborales.oficinas', ['estado' => $estado]);
    }

    public function grupos(Oficina $oficina) {
        if($oficina->id !=0)
            return view('empleado.laborales.grupos', ['oficina' => $oficina]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        $contratos = TipoContrato::get();
        $areas =   Area::get();
        $puestos = Puesto::get();
        $regiones = Region::get();
        return view('empleado.laborales.create', ['empleado' => $empleado, 'contratos' => $contratos, 'areas' => $areas, 'puestos' => $puestos, 'regiones' => $regiones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Empleado $empleado)
    {
        $request['actualizacion'] = $request->contratacion;
        $request['actual'] = $request->inicial;
        $request['original'] = Puesto::find($request->puesto_id)->nombre;
        $laborales = new EmpleadosDatosLab($request->all());
        $empleado->laborales()->save($laborales);
        if($request->puesto_id == 7) {
            Vendedor::create(['vendedor_id' => $empleado->id, 'grupo_id' => $request->grupo_id]);
        }
        return redirect()->route('empleados.laborals.index', ['empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado, EmpleadosDatosLab $laboral)
    {
        $contratos = TipoContrato::get();
        $areas =   Area::get();
        $puestos = Puesto::get();
        $regiones = Region::get();
        $contratos = TipoContrato::get();
        return view('empleado.laborales.edit', ['datoslab' => $laboral, 'contratos' => $contratos, 'empleado' => $empleado, 'areas' => $areas, 'puestos' => $puestos, 'regiones' => $regiones]);
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
        $laborales = new EmpleadosDatosLab($request->all());
        $empleado->laborales()->save($laborales);
        if($request->puesto_id == 7)
            Vendedor::create(['vendedor_id' => $empleado->id, 'grupo_id' => $request->grupo_id]);
        return redirect()->route('empleados.laborals.index', ['empleado' => $empleado]);
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
