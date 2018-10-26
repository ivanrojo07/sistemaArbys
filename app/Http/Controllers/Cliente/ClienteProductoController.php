<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Cliente;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ClienteProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente, Request $request)
    {
        $productos = Product::sortable()->paginate(10);
        return view('productos.index', ['cliente' => $cliente, 'productos' => $productos]);
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
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente,Product $producto)
    {
        $pdf = PDF::loadView('clientes.pdf', ['cliente' => $cliente, 'producto' => $producto]);
        return $pdf->download('archivo.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function search(Request $request, $id) {
        $cliente = Cliente::find($id);
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $productos = Product::where(function($q) use($wordsquery) {
            foreach ($wordsquery as $word) {
                $q->orWhere('clave', 'LIKE', "%$word%")
                    ->orWhere('marca', 'LIKE', "%$word%")
                    ->orWhere('descripcion', 'LIKE', "%$word%")
                    ->orWhere('precio_lista', 'LIKE', "%$word%")
                    ->orWhere('apertura', 'LIKE', "%$word%");
            }
        })->whereMonth('created_at', date("m"))->sortable()->paginate(10);
        $productos->withPath('producto2?query=' . $query);
        return view('productos.busqueda', ['productos' => $productos, 'cliente' => $cliente]);
    }

    public function search2(Request $request, $id) {
        $cliente = Cliente::find($id);
        $min = $request->min;
        $max = $request->max;
        if(isset($min) && isset($max)) {
            $productos = Product::whereBetween('precio_lista', [$min, $max])->sortable()->paginate(10);
            $productos->withPath('producto3?min=' . $min . '&max=' . $max);
            // dd(1);
            // dd($productos);
        }
        else if(isset($min) && !isset($max)){
            $productos = Product::whereBetween('precio_lista', [$min, 10000000])->sortable()->paginate(10);
            $productos->withPath('producto3?min=' . $min);
            // dd(2);
            // dd($productos);
        }
        else if(!isset($min) && isset($max)) {
            $productos = Product::whereBetween('precio_lista', [0, $max])->sortable()->paginate(10);
            $productos->withPath('producto3?max=' . $max);
            // dd(3);
            // dd($productos);
        }
        else {
            $productos = Product::sortable()->paginate(10);
            $productos->withPath('producto3');
            // dd($productos);
            // dd(4);
            // dd($productos);
        }
        return view('productos.busqueda', ['productos' => $productos, 'cliente' => $cliente]);
    }

    public function search3(Request $request, $id) {
        $cliente = Cliente::find($id);
        // dd($cliente);
        $query = $request->input('query');
        // dd($query);
        // dd($query);
        $productos = Product::where('tipo', $query)->whereMonth('created_at', date("m"))->sortable()->paginate(10);
        // dd($productos);
        $productos->withPath('producto4?query=' . $query);
        return view('productos.busqueda', ['productos' => $productos, 'cliente' => $cliente]);
    }
    
}
