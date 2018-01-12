<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\EmpleadosDatosLab;
use App\Http\Controllers\Controller;
use App\TipoBaja;
use App\TipoContrato;
use App\Area;
use App\Puesto;
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
        $datoslaborales = $empleado->datosLaborales;
        $areas =   Area::get();
        $puestos = Puesto::get();
        
        //
        if (count($datoslaborales)==0) {

          

            return redirect()->route('empleados.datoslaborales.create',
                ['empleado'=>$empleado]);


        } else {
            # code...
            return view('empleadodatoslab.index',[
                'empleado'=>$empleado,
                'datoslaborales'=>$datoslaborales,
                'areas'=>$areas,
                'puestos'=>$puestos]); 
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
        $areas =   Area::get();
        $puestos = Puesto::get();
        $edit = false;
        return view('empleadodatoslab.create',[
            'empleado'=>$empleado,
            'bajas'=>$bajas,
            'contratos'=>$contratos,
            'datoslab'=>$datoslab, 
            'areas'=>$areas, 
            'puestos'=>$puestos,
            'edit'=>$edit]);
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
        $datoslab->fechaactualizacion = date("Y-m-d");

        $datoslab->area_id = $request->area_id;
        $datoslab->puesto_id = $request->puesto_id;
        
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
    public function show(Empleado $empleado,$datoslaborale)
    {
       
         
        $datos = $empleado->datosLaborales()->where('id',$datoslaborale)->first();

      
      $areas=Area::where('id',$datos->area_id)->first();
      $area=$areas->nombre;

      $puestos=Puesto::where('id',$datos->puesto_id)->first();
      $puesto=$puestos->nombre;
     
         return view('empleadodatoslab.view',[
                'empleado'=>$empleado,
                'datoslab'=>$datos,
                'area'=>$area,
                'puesto'=>$puesto
                
                ]);
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
        $datoslab = $empleado->datosLaborales()->where('id',$datoslaborale)->first();
        // dd($datoslab);
        $contratos = TipoContrato::get();
        $bajas = TipoBaja::get();
        $areas =   Area::get();
        $puestos = Puesto::get();
        $edit = true;
        // dd($datoslab->id);
        return view('empleadodatoslab.create',['datoslab'=>$datoslab,'bajas'=>$bajas,'contratos'=>$contratos,'empleado'=>$empleado,'areas'=>$areas, 
            'puestos'=>$puestos,'edit'=>$edit]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado, 
        $datoslaborale)
    {

       
       
$datos= 
$empleado->datosLaborales()->where('id',$datoslaborale)->first();

         $datoslab = new EmpleadosDatosLab;
         $datoslab->empleado_id = $datos->empleado_id;

        $datoslab->fechacontratacion = $datos->fechacontratacion;
        $datoslab->fechaactualizacion = date("Y-m-d");

        $datoslab->area_id = $request->area_id;
        $datoslab->puesto_id = $request->puesto_id;
        
        $datoslab->salarionom = $request->salarionom;
        $datoslab->salariodia = $request->salariodia ;
        
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
        ////////////////////////////////////////////////////////

        //$datoslab = EmpleadosDatosLab::findOrFail($datoslaborale);

        $datoslab->save($request->all());
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
