<?php

namespace App\Http\Controllers\Producto;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "productos")
                        return $next($request);
            } else
                return redirect()->route('login');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::whereMonth('created_at', date('m'))->sortable()->paginate(10);
        return view('product.index', ['productos' => $productos]);
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        $producto = Product::find($product);
        // dd($producto);
        // dd($producto->all());
        // dd($producto['36']);
        return view('product.view',['producto'=>$producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function search(Request $request) {
        // dd($request);
        $query = $request->input('query');
        // dd($query);
        $wordsquery = explode(' ',$query);
        $productos = Product::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                $q->orWhere('clave', 'LIKE', "%$word%")
                    ->orWhere('marca', 'LIKE', "%$word%")
                    ->orWhere('descripcion', 'LIKE', "%$word%")
                    ->orWhere('precio_lista', 'LIKE', "%$word%")
                    ->orWhere('apertura', 'LIKE', "%$word%");
            }
        })->whereMonth('created_at', date("m"))->sortable()->paginate(10);  
        $productos->withPath('producto?query=' . $query);
        // dd($productos);
        return view('product.busqueda',['productos'=>$productos]);
    } 
}
