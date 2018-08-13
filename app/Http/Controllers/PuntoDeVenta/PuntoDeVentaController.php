<?php

namespace App\Http\Controllers\PuntoDeVenta;

use App\PuntoDeVenta;
use App\Oficina;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PuntoDeVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $puntos = PuntoDeVenta::get();
        return view('puntodeventa.index', ['puntos' => $puntos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oficinas = Oficina::get();
        return view('puntodeventa.create', ['oficinas' => $oficinas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $punto = PuntoDeVenta::create($request->all());
        return view('puntodeventa.view', ['punto' => $punto]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $punto = PuntoDeVenta::find($id);
        return view('puntodeventa.view', ['punto' => $punto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $punto = PuntoDeVenta::find($id);
        $oficinas = Oficina::get();
        return view('puntodeventa.edit', ['punto' => $punto, 'oficinas' => $oficinas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $punto = PuntoDeVenta::find($id);
        $punto->update($request->except('_method', '_token'));
        return view('puntodeventa.view', ['punto' => $punto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
