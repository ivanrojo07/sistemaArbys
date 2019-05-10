<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Solicitante;
use App\Transaction;
use App\Vendedor;
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
        $clientes = Cliente::get();   
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
        $request['rfc'] = $request->rfc . $request->homoclave;
        $rfc = Cliente::where('rfc', $request->rfc)->get();
        if (count($rfc) > 0)
            return redirect()->back()->with('errors','El RFC ya está registrado.');
        $request['identificador'] = str_replace(' ', '', mb_strtoupper(mb_substr($request->razon, 0, 8)) . mb_substr($request->nombre, 0, 2) . mb_substr($request->appaterno, 0, 2) . mb_substr($request->apmaterno, 0, 2) . $request->nacimiento);
        $cliente = Cliente::create($request->all());
        return redirect()->route('clientes.show', ['cliente' => $cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $aprobado = false;
        foreach ($cliente->transactions as $transaction) {
            foreach ($transaction->pagos as $pago) {
                if ($pago->status == "Aprobado") {
                    $aprobado = true;
                }
            }
        }
        return view('clientes.view', ['cliente' => $cliente, 'aprobado' => $aprobado]); 
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
        $vendedores = Vendedor::get();
        $canal_ventas = CanalVenta::get();
        return view('clientes.edit', ['cliente' => $cliente, 'canal_ventas' => $canal_ventas, 'vendedores'=>$vendedores]); 
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
        //$request['vendedor_id'] = Auth::user()->empleado->vendedor->id;
        $request['identificador'] = str_replace(' ', '', mb_strtoupper(mb_substr($request->razon, 0, 8)) . mb_substr($request->nombre, 0, 2) . mb_substr($request->appaterno, 0, 2) . mb_substr($request->apmaterno, 0, 2) . $request->nacimiento);
        $cliente->update($request->except('_method','_token'));
        return redirect()->route('clientes.show', ['cliente' => $cliente]);
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

    // public function pdf(Request $request, Cliente $cliente) {
    //     dd($cliente);
    //     $pdf = PDF::loadView('clientes.vista', ['cliente' => $cliente]);
    //     return $pdf->download('archivo.pdf');
    // }


    public function asignar() {
        $empleado = Auth::user()->empleado;
        if($empleado->id == 1) {
            $clientes = Cliente::get();
            $vendedores = Vendedor::whereNotIn('id', [1])->get();
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
            $clientes = Cliente::whereIn('vendedor_id', $arr)->get();
        }
        return view('clientes.asignar.index', ['clientes' => $clientes, 'vendedores' => $vendedores]);
    }

    public function asignarPorNotificacion(Cliente $cliente){
        $vendedores = Vendedor::whereNotIn('id', [1])->get();
        $clientes = array($cliente);
        return view('clientes.asignar.index', ['clientes' => $clientes, 'vendedores' => $vendedores]);
    }

    public function unir(Request $request) {
        $cliente = Cliente::find($request->cliente_id);
        $cliente->vendedor_id = $request->vendedor_id;
        $cliente->save();
        return redirect()->route('clientes.asignar');
    }

}
