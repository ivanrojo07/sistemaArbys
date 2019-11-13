<?php

namespace App\Http\Controllers\Vendedor;

use App\Vendedor;
use App\Oficina;
use App\Cliente;
use App\Subgerente;
use App\Grupo;
use App\Region;
use App\Empleado;
use App\Factories\Empleado\EmpleadoRepositorieFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Laboral;
use App\Repositories\Oficina\OficinaRepositorie;
use Carbon\Carbon;


class VendedorController extends Controller
{

    public function __construct(EmpleadoRepositorieFactory $empleadoRepositorieFactory)
    {
        $this->empleadoRepositorieFactory = $empleadoRepositorieFactory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd(Auth::user()->empleado->laborales->last()->puesto->nombre);

        if(Auth::user()->id == 1){
            $vendedores = Vendedor::get();
        }else{
            $empleado = Auth::user()->empleado;
            $vendedores = $this->empleadoRepositorieFactory->make(Auth::user()->empleado->laborales->last()->puesto)->getVendedores($empleado);
        }
        
        // dd($vendedores);

        return view('vendedores.index', ['vendedores' => $vendedores]);
    }

    public function activar(Vendedor $vendedor)
    {
        $vendedor->status = 'Activo';
        $vendedor->save();
        return redirect()->route('vendedors.index');
    }

    public function bajar(Vendedor $vendedor)
    {
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
        if ($vendedor->status == 'Activo' || count($vendedor->clientes) > 0 || $vendedor->grupo) {
            dd('¡Error, vendedor no puede ser eliminado, todavía persisten relaciones!');
            return redirect()->route('vendedors.index');
        }
    }

    public function getVendedores()
    {
        $vendedores = Vendedor::whereNotIn('id', [1])->get();
        return view('vendedores.select', ['vendedores' => $vendedores]);
    }

    public function asignar()
    {
        // OBTENEMOS AL EMPLEADO EN SESIÓN
        $empleado = Auth::user()->empleado;

        // SI ES EL USUARIO ADMIN OBTENEMOS TODOS LOS VENDEDORES Y SUBGERENTES
        if ($empleado->id == 1) {
            $grupos = Grupo::get();
            $vendedores = Vendedor::whereNotIn('id', [1])->get();
            $subgerentes = Subgerente::get();
            $num_grupos = array();
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

            foreach ($arr as $emp) {
                if (isset($emp->vendedor))
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

    public function control()
    {

        $regiones = Region::get();
        $subgerentes = Subgerente::get();
        return view('vendedores.control.control', ['regiones' => $regiones, 'subgerentes']);
    }

    public function subgerentes(Oficina $oficina)
    {
        $subgerentes = OficinaRepositorie::getSubgerentes($oficina);
        $grupos = Grupo::get();
        return view('vendedores.control.subgerente', ['subgerentes' => $subgerentes, 'grupos' => $grupos]);
    }

    public function grupos(Oficina $oficina)
    {

        $grupos = OficinaRepositorie::getGrupos($oficina);

        
        if (empty($grupos)) {
            return "<br><div class='mr-5 alert alert-danger'>La oficina no cuenta con grupos</div>";
        }

        return view('vendedores.control.grupos', ['grupos' => $grupos]);
    }

    public function Vendedores(Oficina $oficina)
    {

        // OBTENEMOS LOS VENDEDORES DEL USUARIO AUTENTICADO
        $user = Auth::user();
        $empleado = $user->empleado()->first();
        $puesto = $empleado->puesto()->first();
        $vendedores = $this->empleadoRepositorieFactory
            ->make($puesto)
            ->getVendedores($empleado);

        $empleado_id =  $vendedores->pluck('empleado')
            ->flatten()
            ->pluck('id');

        // return $empleado_id;

        $laborales = Laboral::where('oficina_id', $oficina->id)
            ->whereIn('empleado_id', $empleado_id)
            ->with('empleado.vendedor')
            ->get();


        $laborales = $laborales->filter(function ($laboral) {
            return $laboral->id == Laboral::where('empleado_id', $laboral->empleado_id)->get()->last()->id;
        });

        $empleados = $laborales->pluck('empleado')->flatten();

        $vendedores =  $empleados->pluck('vendedor')->flatten();
        $vendedores = $vendedores->unique();

        if (empty($vendedores)) {
            return "<br><div class='alert alert-danger'>La oficina no cuenta con vendedores</div>";
        }

        return view('vendedores.control.vendedores', compact('vendedores'));
    }

    public function getHistorialVendedor(Request $request)
    {
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
        $oficina = Oficina::find($request->oficina);

        $gerente = null;

        $dir_estatal = $oficina->empleadoDirectorEstatal();
        $dir_regional = $oficina->empleadoDirectorRegional();

        if ($oficina->gerente()->first()) {
            $gerente = $oficina->gerente()->first()->empleado()->first();
        }

        return response()->json(['estatal' => $dir_estatal, 'regional' => $dir_regional, 'gerente' => $gerente], 200);
    }
}
