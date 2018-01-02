<?php

namespace App\Http\Controllers\Provedor;

use App\Http\Controllers\Controller;
use App\Provedor;
use App\Product;
use App\ProvedorTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvedorProductTransactionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Provedor $provedore, Product $product)
    {
        //
        // $product->noestaDisponible;

        $product->status = Product::PRODUCTO_NO_DISPONIBLE;
        $product->save();
        // dd($product);
        $transaction = ProvedorTransaction::create([
            'provedor_id' => $provedore->id,
            'product_id' => $product->id,
        ]);
        return redirect()->back()->with('success', 'Producto añadido con exito');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provedor  $provedore
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $provedore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provedor  $provedore
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $provedore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provedor  $provedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provedor  $provedore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provedor $provedore)
    {
        //
    }
}
