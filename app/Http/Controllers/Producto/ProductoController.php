<?php

namespace App\Http\Controllers\Producto;

use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Acabado;
use App\Calidad;
use App\Familia;
use App\Http\Controllers\Controller;
use App\Marca;
use App\Presentacion;
use App\Producto;
use App\Subtipo;
use App\Tipo;
use App\Unidad;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::sortable()->orderBy('created_at')->paginate(5);

        return view('productos.index',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $marcas = Marca::get();
        $familias = Familia::get();
        $tipos = Tipo::get();
        $subtipos = Subtipo::get();
        $unidades = Unidad::get();
        $presentaciones = Presentacion::get();
        $calidades = Calidad::get();
        $acabados = Acabado::get();
        return view('productos.create',['marcas'=>$marcas,'familias'=>$familias,'tipos'=>$tipos,'subtipos'=>$subtipos,'unidades'=>$unidades,'presentaciones'=>$presentaciones,'calidades'=>$calidades,'acabados'=>$acabados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $producto = Producto::where('identificador',$request->identificador)->get();
        // dd($producto);
        if (count($producto) != 0) {
            # code...
            return redirect()->back()->with('errors','El ID del Producto ya existe');
        } else {
        //     # code...
        

            $producto = new Producto();
            $producto->identificador = ($request->marca.strtoupper($request->clave));
            $producto->marca = $request->marca;
            $producto->clave = $request->clave;
            $familia = explode(',',$request->familia);
            $producto->familia = $familia[0];
            $producto->modelo = $request->modelo;
            $tipo = explode(',',$request->tipo);
            $producto->tipo = $tipo[0];
            $subtipo = explode(',',$request->subtipo);
            $producto->subtipo = $subtipo[0];
            $presentacion = explode(',',$request->presentacion);
            $producto->presentacion = $presentacion[0];
            $calidad = explode(',',$request->calidad);
            $producto->calidad = $calidad[0];
            $acabado = explode(',',$request->acabado);
            $producto->acabado = $acabado[0];
            $producto->medida1 = $request->medida1;
            $producto->unidad1 = $request->unidad1;
            $producto->medida2 = $request->medida2;
            $producto->unidad2 = $request->unidad2;
            $producto->medida3 = $request->medida3;
            $producto->unidad3 = $request->unidad3;
            $producto->descripcion_short = $request->descripcion_short;
            $producto->descripcion_large = $request->descripcion_large;
            $producto->save();


            // dd($producto);
            // Producto::create($request->all());
            Alert::success('Producto creado');
            return redirect()->route('productos.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
        return view('productos.view',['producto'=>$producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $marcas = Marca::get();
        $familias = Familia::get();
        $tipos = Tipo::get();
        $subtipos = Subtipo::get();
        $unidades = Unidad::get();
        $presentaciones = Presentacion::get();
        $calidades = Calidad::get();
        $acabados = Acabado::get();
        return view('productos.edit',['producto'=>$producto,'marcas'=>$marcas,'familias'=>$familias,'tipos'=>$tipos,'subtipos'=>$subtipos,'unidades'=>$unidades,'presentaciones'=>$presentaciones,'calidades'=>$calidades,'acabados'=>$acabados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->identificador = ($request->marca.strtoupper($request->clave));
        $producto->marca = $request->marca;
        $producto->clave = $request->clave;
        $familia = explode(',',$request->familia);
        $producto->familia = $familia[0];
        $producto->modelo = $request->modelo;
        $tipo = explode(',',$request->tipo);
        $producto->tipo = $tipo[0];
        $subtipo = explode(',',$request->subtipo);
        $producto->subtipo = $subtipo[0];
        $presentacion = explode(',',$request->presentacion);
        $producto->presentacion = $presentacion[0];
        $calidad = explode(',',$request->calidad);
        $producto->calidad = $calidad[0];
        $acabado = explode(',',$request->acabado);
        $producto->acabado = $acabado[0];
        $producto->medida1 = $request->medida1;
        $producto->unidad1 = $request->unidad1;
        $producto->medida2 = $request->medida2;
        $producto->unidad2 = $request->unidad2;
        $producto->medida3 = $request->medida3;
        $producto->unidad3 = $request->unidad3;
        $producto->descripcion_short = $request->descripcion_short;
        $producto->descripcion_large = $request->descripcion_large;
        $producto->save();
        // dd($producto);
        // $producto->update($request->all());
        Alert::success('Producto actualizado');
        return redirect()->route('productos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();
        return redirect()->route('producto.index');
    }

    public function buscar(Request $request){
        $query = $request->input('busqueda');
        $wordsquery = explode(' ',$query);
        $productos = Producto::where(function($q) use ($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('identificador','LIKE',"%$word%")
                    ->orWhere('marca','LIKE',"%$word%")
                    ->orWhere('clave','LIKE',"%$word%")
                    ->orWhere('descripcion_short','LIKE',"%$word%")
                    ->orWhere('familia','LIKE',"%$word%")
                    ->orWhere('tipo','LIKE',"%word%");
            }
        })->paginate(10);
        return view('productos.busqueda',['productos'=>$productos]);
    }
}
