<?php

namespace App\Http\Controllers\Vendedor;

use App\Vendedor;
use App\Cliente;
use App\Subgerente;
use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
            foreach ($subgerentes as $sub) {
                $num_grupos[$sub->id] = count(Grupo::where('subgerente_id', $sub->id)->get());
            }
        } else {
            $laborales = $empleado->laborales->last()->oficina->laborales;
            $arr = [];
            foreach ($laborales as $laboral)
                $arr[] = $laboral->empleado;
            $arr = array_unique($arr);
            $vendedores = [];
            foreach ($arr as $emp)
                if(isset($emp->vendedor))
                    $vendedores[] = $emp->vendedor;
            $arr = [];
            foreach ($vendedores as $vendedor)
                $arr[] = $vendedor->id;
            $grupos = Cliente::whereIn('vendedor_id', $arr)->get();
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
}
