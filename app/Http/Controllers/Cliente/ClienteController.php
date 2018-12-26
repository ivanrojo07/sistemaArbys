<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Solicitante;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use App\CanalVenta;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Barryvdh\DomPDF\Facade as PDF;

class ClienteController extends Controller {

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "clientes")
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
        $clientes = Cliente::doesntHave('solicitante')->get();   
        return view('clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canal_ventas = CanalVenta::get();
        return view('clientes.create', ['canal_ventas' => $canal_ventas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rfc = Cliente::where('rfc', $request->rfc)->get();
        if (count($rfc) > 0)
            return redirect()->back()->with('errors','El RFC ya está registrado.');
        $cliente = Cliente::create($request->all());
        return view('clientes.view', ['cliente' => $cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.view', ['cliente' => $cliente]); 
    }

    
    public function legacy(Cliente $cliente)
    {
        return view('clientes.legacy.view', ['cliente' => $cliente]); 
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $canal_ventas = CanalVenta::get();
        return view('clientes.edit', ['cliente' => $cliente, 'canal_ventas' => $canal_ventas]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->except('_method','_token'));
        return view('clientes.view', ['cliente' => $cliente]);
    }

    public function getSeleccion($cliente) {
        $cliente = Cliente::find($cliente);
        return view('clientes.productos.selected', ['cliente' => $cliente]);
    }

    public function buscar(Request $request) {
        $query = $request->input('query');
        $wordsquery = explode(' ', $query);
        $clientes = Cliente::where(function($q) use($wordsquery) {
            foreach ($wordsquery as $word) {
              $q->orWhere('nombre', 'LIKE', "%$word%")
                ->orWhere('apellidopaterno', 'LIKE', "%$word%")
                ->orWhere('apellidomaterno', 'LIKE', "%$word%")
                ->orWhere('razonsocial', 'LIKE', "%$word%")
                ->orWhere('rfc', 'LIKE', "%$word%")
                ->orWhere('identificador', 'LIKE', "%$word%");
            }
        })->get();
        return view('clientes.busqueda', ['clientes' => $clientes]);
    }

    public function pdf(Cliente $cliente) {
        $pdf = PDF::loadView('clientes.vista', ['cliente' => $cliente]);
        return $pdf->download('archivo.pdf');
    }
}
