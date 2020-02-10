<?php

namespace App\Http\Controllers\Precargar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mensualidad;

class MensualidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensualidadesMotos = Mensualidad::where('concepto','Moto')->get();
        $mensualidadesCarros = Mensualidad::where('concepto','Carro')->get();
        return view('precargas.mensualidades.index',compact('mensualidadesMotos', 'mensualidadesCarros'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensualidad $mensualidad)
    {
        return view('precargas.mensualidades.edit', compact('mensualidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensualidad $mensualidad)
    {
        // return $request->input();

        $mensualidad->update([
            'factor_actualizacion' => $request->factor_actualizacion,
            'monto_minimo' => $request->monto_minimo
        ]);

        return redirect()->route('precargas.mensualidades.index');
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
