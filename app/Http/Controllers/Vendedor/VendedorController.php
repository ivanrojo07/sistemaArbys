<?php

namespace App\Http\Controllers\Vendedor;

use App\Vendedor;
use App\Oficina;
use App\Cliente;
use App\Subgerente;
use App\Grupo;
use App\Region;
use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedores = Vendedor::whereNotIn('id', [1])->get();
        $empleado = Auth::user()->empleado;
        $vendedores_vista = [];
        if ($empleado->id > 1 && isset($empleado->laborales)) {
            switch ($empleado->laborales->last()->puesto->nombre) {

                case 'Subgerente':
                    $subgerente = $empleado->subgerente;
                    foreach ($subgerente->grupos as $grupo) {
                        foreach ($grupo->vendedores as $vendedor) {
                            $vendedores_vista[] = $vendedor;
                        }
                    }
                    break;

                case 'Gerente':
                    $empleados_oficina = $empleado->laborales->last()->oficina->laborales;
                    /* la variable arreglo_lab va a contener los datos laborales de los empleados en la 
                    *  oficina dada sin repetir un empleado por los cambios en sus datos laborales.
                    */
                    $arreglo_lab = [];
                    foreach ($empleados_oficina as $empleados) {
                        $arreglo_lab[$empleados->empleado_id] = $empleados;
                    }
                    foreach ($arreglo_lab as $laboral) {
                            
                        if(isset($laboral->empleado->vendedor)){
                            $vendedores_vista[] = $laboral->empleado->vendedor;
                        }
                            
                    }

                    break;

                case 'Director Estatal':
                    $estado = $empleado->laborales->last()->estado;
                    $arreglo_lab = [];

                    foreach ($estado->oficinas as $oficinas) {
                        foreach ($oficinas->laborales as $laboral) {
                            $arreglo_lab[$laboral->empleado_id] = $laboral;
                        }
                    }

                    foreach ($arreglo_lab as $laboral) {
                            
                        if(isset($laboral->empleado->vendedor))
                            $vendedores_vista[] = $laboral->empleado->vendedor;
                            
                    }


                    break;

                case 'Director Regional':
                    $region = $empleado->laborales->last()->region;
                    $arreglo_lab = [];

                    foreach ($region->datosLab as $laboral) {
                        $arreglo_lab[$laboral->empleado_id] = $laboral;
                    }

                    foreach ($arreglo_lab as $laboral) {
                            
                        if(isset($laboral->empleado->vendedor))
                            $vendedores_vista[] = $laboral->empleado->vendedor;
                    }
                    break;
                
                default:
                    return view('vendedores.index', ['vendedores' => $vendedores]);
                    break;
            }
            return view('vendedores.index', ['vendedores' => $vendedores_vista]);
        }
        return view('vendedores.index', ['vendedores' => $vendedores]);
    }

    public function activar(Vendedor $vendedor) {
        $vendedor->status = 'Activo';
        $vendedor->save();
        return redirect()->route('vendedors.index');
    }

    public function bajar(Vendedor $vendedor) {
        $vendedor->status = 'Baja';
        $vendedor->save();
        return redirect()->route('vendedors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendedor $vendedor)
    {
        if($vendedor->status == 'Activo' || count($vendedor->clientes) > 0 || $vendedor->grupo) {
            dd('¡Error, vendedor no puede ser eliminado, todavía persisten relaciones!');
            return redirect()->route('vendedors.index');
        }
    }

    public function getVendedores(){
        $vendedores = Vendedor::whereNotIn('id', [1])->get();
        return view('vendedores.select',['vendedores'=>$vendedores]);
    }

    public function asignar()
    {
        $empleado = Auth::user()->empleado;
        if($empleado->id == 1) {
            $grupos = Grupo::get();
            $vendedores = Vendedor::whereNotIn('id', [1])->get();
            $subgerentes = Subgerente::get();
            $num_grupos = Array();
            $grupos_vista = [];
            foreach ($subgerentes as $sub) {
                $num_grupos[$sub->id] = count(Grupo::where('subgerente_id', $sub->id)->get());
            }
        } else {
            $laborales = $empleado->laborales->last()->oficina->laborales;
            $arr = [];

            foreach ($laborales as $laboral)
                $arr[$laboral->empleado_id] = $laboral->empleado;
            $vendedores = [];

            foreach ($arr as $emp){
                if(isset($emp->vendedor))
                    $vendedores[] = $emp->vendedor;
            }
            $num_grupos = [];
            $subgerentes = Subgerente::get();
            foreach ($subgerentes as $sub) {
                $num_grupos[$sub->id] = count(Grupo::where('subgerente_id', $sub->id)->get());
                foreach ($sub->grupos as $grupo) {
                    $grupos_vista[] = $grupo;
                }
            }
            return view('vendedores.asignar', ['grupos' => $grupos_vista, 'vendedores' => $vendedores, 'num_grupos' => $num_grupos]);
        }
        return view('vendedores.asignar', ['grupos' => $grupos, 'vendedores' => $vendedores, 'num_grupos' => $num_grupos]);
    }

    public function unir(Request $request)
    {
        $vendedor = Vendedor::find($request->vendedor_id);
        $vendedor->grupo_id = $request->grupo_id;
        $vendedor->save();
        return redirect()->route('vendedor.asignar');
    }

    public function control(){
        $regiones=Region::get();
        $subgerentes=Subgerente::get();
        return view('vendedores.control.control',['regiones'=>$regiones, 'subgerentes']);
    }

    public function subgerentes(Oficina $oficina){
        $oficina=Oficina::find($oficina);
        $subgerentes=Subgerente::where('empleado_id', '!=', '1')->get();
        $grupos=Grupo::get();
        return view('vendedores.control.subgerente',['subgerentes'=>$subgerentes,'grupos'=>$grupos]);
    }

    public function grupos(Oficina $oficina){
        //$grupos=Grupo::get();
        $grupos = [];

        //obtener todos los grupos de la oficina
        foreach ($oficina->laborales as $laboral) {
            if ($laboral->puesto->nombre == "Subgerente" || isset($laboral->empleado->subgerente)) 
                foreach ($laboral->empleado->subgerente->grupos as $grupo) {
                    $grupos[$grupo->id] = $grupo;
                }
        }
        return view('vendedores.control.grupos',['grupos'=>$grupos]);
    }

    public function Vendedores(Oficina $oficina){
        $vendedores = Vendedor::whereNotIn('id', [1])->get();
        return view('vendedores.control.vendedores',['vendedores'=>$vendedores]);
    }

    public function getHistorialVendedor(Request $request){
        $date = Carbon::now();
        $endDate = Carbon::now();
        $inicioDate = $date->subMonth(24);
        $vendedor = Vendedor::find($request->vendedor);
        $historial = $vendedor->contador->where('fecha_inicio', '>=',  $inicioDate->format('Y-m-d'));
        $objetivos = $vendedor->objetivo->where('fecha', '>=',  $inicioDate->format('Y-m-d'));
        $array_objetivos = [];

        foreach ($objetivos as $objetivo) 
            $array_objetivos[substr($objetivo->fecha, 0, 7)] = $objetivo;

        //return dd($array_objetivos);
        return view('vendedores.control.historial_vendedor', ['historiales' => $historial, 'objetivos' => $array_objetivos]);
        
    }

    public function getDirectores(Request $request)
    {
        $datos = $request->region;
        $empleados = Empleado::get();
        $dir_estatal = null;
        $dir_regional = null;
        $oficina = Oficina::find($request->oficina);
        /*foreach ($empleados as $empleado) {
            if ($empleado->laborales->last()->estado->id == $request->estado && $empleado->laborales->last()->puesto->nombre == "Director Estatal") {
                $dir_estatal = $empleado;
            }
            if ($empleado->laborales->last()->region->id == $request->region && $empleado->laborales->last()->puesto->nombre == "Director Regional") {
                $dir_regional = $empleado;
            }
        }*/
        foreach ($empleados as $empleado) {
            if ($oficina->estado->id == $request->estado ) {
                if ($empleado->laborales->last() != null && $empleado->laborales->last()->puesto->nombre == "Director Estatal") {
                    # code...
                    $dir_estatal = $empleado;
                }
            }
            if ($oficina->estado->region->id == $request->region ) {
                if ($empleado->laborales->last() != null && $empleado->laborales->last()->puesto->nombre == "Director Regional") {
                    # code...
                    $dir_regional = $empleado;
                }
            }
        }
        
        return response()->json(['estatal' => $dir_estatal, 'regional' => $dir_regional, 'oficina'=> $oficina], 200);
        
    }
}
