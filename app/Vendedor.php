<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'vendedors';

    protected $fillable = [
        'id',
        'empleado_id',
        'grupo_id',
        'experto',
        'status'
    ];

    public function clientes()
    {
        return $this->hasMany('App\Cliente');
    }

    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }

    public function empleado()
    {
        return $this->belongsTo('App\Empleado');
    }

    public function objetivo()
    {
        return $this->hasMany('App\Objetivo');
    }

    public function contador()
    {
        return $this->hasMany('App\Contador');
    }

    public function transactionsByLastMonth()
    {
        $transactions = [];

        // OBTENEMOS TODAS LAS TRANSACCIONES DE TODOS LOS CLIENTES QUE ESTÁN EN ESTE MES
        foreach ($this->clientes()->get() as $cliente) {
            foreach ($cliente->transactions()->get() as $transaction) {
                $transaction_date = $transaction->created_at->format('Y-m-d');
                if ($transaction_date >= date('Y-m-01') && $transaction_date <= date('Y-m-31')) {
                    $transactions[] = $transaction;
                }
            }
        }

        return collect($transactions);
    }

    public function clientesByLastMonth()
    {
        $clientes = [];

        foreach ($this->clientes()->get() as $cliente) {
            foreach ($cliente->transactions()->get() as $transaction) {
                $transaction_date = $transaction->created_at->format('Y-m-d');
                if ($transaction_date >= date('Y-m-01') && $transaction_date <= date('Y-m-31')) {

                    if( !array_search($cliente, $clientes) ){
                        $clientes[] = $cliente;
                    }
                }
            }
        }

        return collect($clientes);
    }
}
