<?php

namespace App\Services\Pago;

use App\Cliente;
use App\Contador;
use App\Oficina;
use App\Pago;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StorePagoService
{
    protected $cliente;
    protected $vendedor;
    protected $transaction;
    protected $pago;
    protected $contador;
    protected $oficina;

    /**
     * ===========
     * CONSTRUCTOR
     * ===========
     */

    public function __construct($request, $cliente)
    {

        $this->cliente = $cliente;
        $this->vendedor = $cliente->vendedor;
        $this->transaction = Transaction::find($request->transaction_id);

        $this->crearPago($request);
        $this->aumentarVentaAVendedor();
        $this->setOficina($request);
        $this->actualizarTransaction($request);
    }

    /**
     * =======
     * METHODS
     * =======
     */

    protected function crearPago($request)
    {
        $this->pago = Pago::create([
            'transaction_id' => $request->transaction_id,
            'forma_pago' => $request->forma_pago,
            'banco' => $request->banco,
            'status' => $request->status,
            'monto' => $request->monto,
            'numero_cheque' => $request->numero_cheque,
            'numero_deposito' => $request->numero_deposito,
            'numero_tarjeta' => $request->numero_tarjeta,
            'nombre_tarjetaHabiente' => $request->nombre_tarjetaHabiente,
            'meses' => $request->meses,
            'folio' => $request->folio,
            'total' => $request->total,
            'restante' => $request->total - $request->monto,
        ]);
    }

    protected function aumentarVentaAVendedor()
    {
        $this->contador = Contador::firstOrCreate(
            [
                'vendedor_id' => $this->vendedor->id, 'fecha_inicio' => date('Y-m-01')
            ],
            [
                'vendedor_id' => $this->vendedor->id,
                'total_clientes' => 1,
                'total_ventas' => $this->pago->total,
                'fecha_inicio' => new Carbon('first day of this month'),
                'fecha_fin' => new Carbon('last day of this month')
            ]
        );
    }

    protected function actualizarTransaction($request)
    {

        if ($this->transaction->esCotizacion()) {
            $this->transaction->update([
                'status' => 'pagando'
            ]);
        }

        if (!$this->transaction->tieneOficina()) {
            $this->transaction->update([
                'oficina_id' => $this->oficina->id,
            ]);
        }

        if ($this->pago->estaAprobado()) {
            $this->transaction->update([
                'status' => "finalizado"
            ]);
        }
    }

    /**
     * =======
     * SETTERS
     * =======
     */

    public function setOficina($request)
    {
        if ($request->input('oficina_id') && !is_null($request->input('oficina_id'))) {
            $this->oficina =  Oficina::find($request->input('oficina_id'));
            return;
        }
        
        $this->oficina =  Auth::user()->empleado->oficina;
    }
}
