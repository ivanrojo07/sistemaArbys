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
        $min = $request->min;
        $max = $request->max;
        $desc = $request->kword;
        $tipo = $request->type;
        $productos = new Product();
        if(isset($desc)){
            $wordsquery = explode(' ',$desc);
            $productos = $productos->where(function($q) use($wordsquery) {
                foreach ($wordsquery as $word) {
                    $q->orWhere('clave', 'LIKE', "%$word%")
                        ->orWhere('marca', 'LIKE', "%$word%")
                        ->orWhere('descripcion', 'LIKE', "%$word%")
                        ->orWhere('apertura', 'LIKE', "%$word%");
                        //->orWhere('precio_lista', 'LIKE', "%$word%")
                }
            });//->whereMonth('created_at', date("m"));  Se usuara cuando se pida los registros por mes
        }
        if(isset($tipo))
            $productos = $productos->where('tipo', $tipo);//->whereMonth('created_at', date("m"));  Se usuara cuando se pida los registros por mes

        if(isset($min) && isset($max))
            $productos = $productos->whereBetween('precio_lista', [intval($min), intval($max)]);

        if(isset($min) && !isset($max))
            $productos = $productos->whereBetween('precio_lista', [intval($min), 10000000]);

        if(!isset($min) && isset($max)) 
            $productos = $productos->whereBetween('precio_lista', [0, intval($max)]);

        $productos = $productos->sortable()->paginate(10)->appends($request->all());
        return view('productos.index', ['cliente' => $cliente, 'productos' => $productos, 'request'=>$request]);
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
    public function show(Request $request, Cliente $cliente,Product $producto)
    {
        // return view('clientes.pdf', ['cliente' => $cliente, 'producto' => $producto, "request"=>$request->all()]);
        if($request->all()){
            // dd($cliente);
            $pdf = PDF::loadView('clientes.pdf', ['cliente' => $cliente, 'producto' => $producto, "request"=>$request->all(), "empleado"=>$cliente->vendedor->empleado]);
            return $pdf->download('cotizacion.pdf');
            
        }
        else{
            return back();
        }
        // return $pdf->stream();
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

    
    
}
