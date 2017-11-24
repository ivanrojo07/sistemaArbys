<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Personal;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalProductTransactionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Personal $personal, Product $product)
    {
        //
        // $product->noestaDisponible;

        $product->status = Product::PRODUCTO_NO_DISPONIBLE;
        $product->save();
        // dd($product);
        $transaction = Transaction::create([
            'personal_id' => $personal->id,
            'product_id' => $product->id,
        ]);
        return redirect()->back()->with('success', 'Producto añadido con exito');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        //
    }
}
