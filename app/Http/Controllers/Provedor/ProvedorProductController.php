<?php

namespace App\Http\Controllers\Provedor;

use App\Provedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvedorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $provedore)
    {
        //
        $productos = $provedore->provedorTransactions()->with('product')->get()->pluck('product');
        return view('productos.indexproducselect',['provedore'=>$provedore,'productos'=>$productos]);
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
