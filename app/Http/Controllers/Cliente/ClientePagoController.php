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
use App\Responses\Pago\StorePagoResponse;
use App\Services\Pago\StorePagoService;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

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

    public function follow(Cliente $cliente, Pago $pago, Transaction $transaction)
    {
        $bancos = Banco::get();
        $folio = $pago->folio;
        return view('clientes.pagos.follow', ['cliente' => $cliente, 'bancos' => $bancos, 'pago' => $pago, 'folio' => $folio, 'transaction' => $transaction]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cliente $cliente)
    {
        $storePagoService = new StorePagoService($request, $cliente);
        return new StorePagoResponse($cliente);
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

    public function create_pago(Cliente $cliente, Transaction $transaction)
    {
        $producto = $transaction->producto;
        $bancos = Banco::get();
        $vendedor = $cliente->vendedor;
        $folio = 0;
        $oficina = Auth::user()->empleado->oficina;

        // OBTENEMOS EL NUMERO DE FOLIO DE LOS PAGOS DE LA TRANSACCTION DEL CLIENTE
        foreach ($vendedor->clientes as $client) {
            foreach ($client->transactions as $transacion) {
                if ($transacion->pagos->count() > 0) {
                    $folio += 1;
                    break;
                }
            }
        }

        // dd($oficina);

        if (!is_null($oficina)) {
            $transacciones = Transaction::where('oficina_id', $oficina->id)
                ->whereIn('status', ['pagando', 'finalizado'])
                ->whereYear('created_at', '=', date('Y'))
                ->get();

            $consecutivo = count($transacciones) + 1;
            $consecutivo = sprintf('%03d', $consecutivo);
            $anio = date("y");

            $numFolio = $oficina->identificador . $consecutivo . $anio;
        } else {
            $numFolio = '';
        }


        return view('clientes.pagos.elegido_create', ['cliente' => $cliente, 'bancos' => $bancos, 'transaction' => $transaction, 'folio' => $folio, 'numFolio' => $numFolio]);
    }

    public function getProduct($id)
    {
        $producto = Product::find($id);
        return view('product.getProduct', ['producto' => $producto]);
    }
}
