<?php

namespace App\Http\Controllers\Vendedor;

use App\Vendedor;
use Illuminate\Http\Request;
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
}
