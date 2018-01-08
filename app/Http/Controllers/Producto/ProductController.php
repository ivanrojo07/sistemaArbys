<?php

namespace App\Http\Controllers\Producto;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Product::whereMonth('created_at', date("m"))->sortable()->paginate(10);
        return view('product.index',['productos'=>$productos]);
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
        //
        $producto = Product::findOrFail($product);
        // dd($producto);
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

    public function search(Request $request){
       // $query = $request->input('query');
        $query = $request->input('busqueda');
        $wordsquery = explode(' ',$query);

        $productos = Product::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('clave','LIKE',"%$word%")
                    ->orWhere('marca','LIKE',"%$word%")
                    ->orWhere('descripcion','LIKE',"%$word%")
                    ->orWhere('precio_lista','LIKE',"%$word%")
                    ->orWhere('apertura','LIKE',"%$word%")
                    ->orWhere('inicial','LIKE','%$word%');
                    
            }

        })->whereMonth('created_at', date("m"))->get();  
        return view('product.busqueda',['productos'=>$productos]);
    } 
}
