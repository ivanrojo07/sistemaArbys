<?php

namespace App\Http\Controllers\Provedor;

use App\Http\Controllers\Controller;
use App\Provedor;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvedorProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $provedore, Request $request)
    {
        // dd(Request::only($request));
        // dd($personal->transactions()->with('product')->get()->pluck('product'));
        $marcas = DB::select('select distinct marca from products');
        $tipos = DB::select('select distinct tipo from products');
        // dd($marcas[0]);
        if (count($request->all()) == 0) {
            # code...
            //
            // if ($personal->tipo == 'Cliente') {
            //     # code...
            $productos = Product::where('status','=','disponible')->sortable()->paginate(10);
            return view('productos.index',['provedore'=>$provedore,'productos'=>$productos,'marcas'=>$marcas, 'tipos'=>$tipos,'request'=>$request]);
            // } else {
            //     # code...
            //     return redirect('provedores');
            // }
        } else {
            # code...
            // dd($request->all());
            $precio1 = (int)$request->costo1;
            $precio2 = (int)$request->costo2;
            $mensual1 = $request->mensualidad1;
            $mensual2 = $request->mensualidad2;
            $marca = $request->marca;
            $tipo = $request->tipo;
            $productos = Product::sortable()->where('status','=','disponible')
            ->where(function($busqueda) use($precio1, $precio2){
                if ($precio1 != null || $precio1 != 0) {
                    # code...
                    // dd($precio2);
                    if ($precio2 == 0 || $precio2 == null) {
                        # code...
                        // dd($busqueda);
                        $busqueda->where('precio_lista','>=',$precio1);
                    }
                    elseif ($precio2 != null || $precio2 <$precio1 || $precio2 != 0) {
                        # code...
                        $busqueda->whereBetween('precio_lista',[$precio1,$precio2]);
                    } 
                    // dd($precio1);
                    
                    
                } 
                elseif ($precio1 == null || $precio1 == 0) {
                    # code...
                    if ($precio2 != 0 || $precio2 != null) {
                        # code...
                        $busqueda->where('precio_lista','<=',$precio2);

                    }

                }
                
            })->where(function($busqueda) use($mensual1, $mensual2){
                if ($mensual1 != null || $mensual1 != 0) {
                    # code...
                    
                    if ($mensual2 == 0 || $mensual2 == null) {
                        # code...
                        // dd($busqueda);
                        $busqueda->where('mensualidad_p_fisica','>=',$mensual1);
                    }
                    elseif ($mensual2 != null || $mensual2 <$mensual1 || $mensual2 != 0) {
                        # code...
                        $busqueda->whereBetween('mensualidad_p_fisica',[$mensual1,$mensual2]);
                    } 
                    // dd($mensual1);
                    
                    
                } 
                elseif ($mensual1 == null || $mensual1 == 0) {
                    # code...
                    if ($mensual2 != 0 || $mensual2 != null) {
                        # code...
                        $busqueda->where('mensualidad_p_fisica','<=',$mensual2);

                    }

                }
            })->where(function($busqueda) use($marca){
                if ($marca != null || $marca != 0) {
                    # code...
                    $busqueda->where('marca','=',$marca);
                }
            })->where(function($busqueda) use($tipo){
                if ($tipo != null || $tipo !=0) {
                    # code...
                    $busqueda->where('tipo','=',$tipo);
                }
            })->paginate(10);
            return view('productos.index',['provedore'=>$provedore,'productos'=>$productos,'marcas'=>$marcas, 'tipos'=>$tipos, 'request'=>$request]);
            // $productos = Product::sortable()->where(
            //     function($query) use())->get();

        }
        
        
        
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
     * @param  \App\provedore  $provedore
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $provedore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\provedore  $provedore
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $provedore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\provedore  $provedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\provedore  $provedore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provedor $provedore)
    {
        //
    }
}
