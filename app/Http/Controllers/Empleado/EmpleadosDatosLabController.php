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
        $datoslaborales = $empleado->datosLaborales;
        if (count($datoslaborales) == 0)
            return redirect()->route('empleados.datoslaborales.create', ['empleado' => $empleado]);
        else {
            $subg = Empleado::find($datoslaborales->first()->subgerente);
            $datoslab = $empleado->datosLaborales()->orderBy('created_at', 'desc')->first();
            // dd($datoslab);
            return view('empleadodatoslab.index', [
                'empleado' => $empleado,
                'datoslaborales' => $datoslaborales,
                'datoslab' => $datoslab,
                'subgerente' => $subg,
            ]); 
        }
        
    }

    public function estados(Region $region) {
        if($region->id !=0)
            return view('empleadodatoslab.estados', ['region' => $region]);
    }

    public function oficinas(Estado $estado) {
        if($estado->id !=0)
            return view('empleadodatoslab.oficinas', ['estado' => $estado]);
    }

    public function grupos(Oficina $oficina) {
        // dd($oficina->datoslab->first()->grupos);
        if($oficina->id !=0)
            return view('empleadodatoslab.grupos', ['oficina' => $oficina]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        $datoslab = new EmpleadosDatosLab;
        $contratos = TipoContrato::get();
        $areas =   Area::get();
        $puestos = Puesto::get();
        $regiones = Region::get();
        return view('empleadodatoslab.create', ['empleado' => $empleado, 'contratos' => $contratos, 'datoslab' => $datoslab, 'areas' => $areas, 'puestos' => $puestos, 'regiones' => $regiones, 'edit' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Empleado $empleado)
    {
        $datoslab = new EmpleadosDatosLab;
        $request['fechaactualizacion'] = $request->fechacontratacion;
        $request['sal_actual'] = $request->sal_inicial;
        $request['puesto_orig'] = Puesto::find($request->puesto_id)->nombre;
        $datoslab->create($request->all());
        $datoslab = $empleado->datosLaborales()->orderBy('created_at', 'desc')->first();
        if($request->puesto_id == 7) {
            Vendedor::create(['vendedor_id' => $datoslab->id, 'grupo_id' => $request->grupo_id]);
        }
        Alert::success('Datos laborales creado', 'Siga agregando información al empleado');
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
       
         
     //    $datos = $empleado->datosLaborales()->where('id',$datoslaborale)->orderBy('created_at','desc')->first();

     // $area='';
     //  if($datos->area_id==null){
     //    $area='NO DEFINIDO';
     //  }else{
     //    $areas=Area::where('id',$datos->area_id)->first();
     //  $area=$areas->nombre;
     //  }
      
     //  $puesto='';
     //  if($datos->puesto_id==null){
     //    $puesto='NO DEFINIDO';
     //  }else{
     //    $puestos=Puesto::where('id',$datos->puesto_id)->first();
     //  $puesto=$areas->nombre;
     //  }
      
     
     //     return view('empleadodatoslab.view',[
     //            'empleado'=>$empleado,
     //            'datoslab'=>$datos,
     //            'area'=>$area,
     //            'puesto'=>$puesto
                
     //            ]);
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
        $areas =   Area::get();
        $puestos = Puesto::get();
        $regiones = Region::get();
        $contratos = TipoContrato::get();
        // dd($datoslab->id);
        return view('empleadodatoslab.edit', [
            'datoslab' => $datoslab,
            'contratos' => $contratos,
            'empleado' => $empleado,
            'areas' => $areas, 
            'puestos' => $puestos,
            'regiones' => $regiones
        ]);

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
        $datoslab = new EmpleadosDatosLab;
        $datoslab->create($request->all());
        $datoslab = $empleado->datosLaborales()->orderBy('created_at', 'desc')->first();
        if($request->puesto_id == 7) {
            Vendedor::create(['vendedor_id' => $datoslab->id, 'grupo_id' => $request->grupo_id]);
        } else {
            $datos = EmpleadosDatosLab::where('empleado_id', $empleado->id)->get();
            foreach ($datos as $dato) {
                $arr[] = $dato->id;
            }
            foreach ($arr as $val) {
                $vend = Vendedor::where('vendedor_id', $val)->first();
                if($vend != null) {
                    Vendedor::where('vendedor_id', $val)->delete();
                    break;
                }
            }
        }
        Alert::success('Datos laborales creado', 'Siga agregando información al empleado');
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
