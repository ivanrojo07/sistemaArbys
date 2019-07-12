<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use App\Pago;
use App\Product;
use App\Transaction;
use App\Banco;
use App\Contador;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Barryvdh\DomPDF\Facade as PDF;

class ClientePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        $bancos = Banco::get();
        $vendedor = $cliente->vendedor;
        $folio = 0;

        foreach ($vendedor->clientes as $client) {
            foreach ($client->transactions as $transacion) {
                if ($transacion->pagos->count() > 0) {
                    $folio += 1;
                    break;
                }
            }

        }
        return view('clientes.pagos.create', ['cliente' => $cliente, 'bancos' => $bancos, 'folio' => $folio]);
    }

    public function follow(Cliente $cliente, Pago $pago) {
        $bancos = Banco::get();
        $folio = $pago->folio;
        return view('clientes.pagos.follow', ['cliente' => $cliente, 'bancos' => $bancos, 'pago' => $pago, 'folio' => $folio]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cliente $cliente)
    {
        $transaction = Transaction::where(['cliente_id' => $cliente->id, 'product_id' => $request->product_id])->first();
        $request['transaction_id'] = "" . $transaction->id;
        if($request->restante == null)
            $request['restante'] = ($request->total - $request->monto) . "";
        else
            $request['restante'] = ($request->restante - $request->monto) . "";
        $pago = new Pago($request->all());
        $transaction->pagos()->save($pago);
        //Logica para aumentar el contador del vendedor
        $vendedor = $cliente->vendedor;
        $principio_mes = new Carbon('first day of this month');
        $fin_mes = new Carbon('last day of this month');
        $contador = $vendedor->contador->where('fecha_inicio', $principio_mes->format('Y-m-d'))->first();
        if (is_null($contador)) {
            $contador = $vendedor->contador()->create(['vendedor_id' => $vendedor->id, 'total_clientes' => 0, 'total_ventas' => 0,
                                         'fecha_inicio' => $principio_mes->format('Y-m-d'), 'fecha_fin' => $fin_mes->format('Y-m-d')
                                        ]);
            if ($pago->status === "Aprobado") {
                $contador->total_clientes += 1;
                $contador->total_ventas += $pago->total;
                $contador->save();
                return redirect()->route('clientes.show', ['cliente' => $cliente]);
            }
            $contador->save();
        }
        if ($pago->status === "Aprobado") {
            $contador = $vendedor->contador->last();
            $contador->total_clientes += 1;
            $contador->total_ventas += $pago->total;
            $contador->save();
        }


        return redirect()->route('clientes.show', ['cliente' => $cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, Pago $pago)
    {
        return view('clientes.pagos.view', ['cliente' => $cliente, 'pago' => $pago]);
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

    public function create_pago(Cliente $cliente, $producto)
    {
        $producto = Product::find($producto);
        $bancos = Banco::get();
        $vendedor = $cliente->vendedor;
        $folio = 0;

        foreach ($vendedor->clientes as $client) {
            foreach ($client->transactions as $transacion) {
                if ($transacion->pagos->count() > 0) {
                    $folio += 1;
                    break;
                }
            }

        }
        return view('clientes.pagos.elegido_create', ['cliente' => $cliente, 'bancos' => $bancos, 'producto' => $producto, 'folio' => $folio]);
    }

    public function getProduct($id) {
        $producto = Product::find($id);
        return view('product.getProduct', ['producto' => $producto]);
    }

}
