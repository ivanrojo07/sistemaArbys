<?php

namespace App\Http\Controllers\Precargar;

use App\Apertura;
use App\HistorialApertura;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AperturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aperturasMotos = Apertura::motos()->orderBy('cuota_inicial','asc')->get();
        $aperturasCasas = Apertura::casas()->orderBy('cuota_inicial','asc')->get();
        $aperturasCarros = Apertura::carros()->orderBy('cuota_inicial','asc')->get();
        return view('precargas.aperturas.index', compact('aperturasMotos', 'aperturasCasas', 'aperturasCarros'));
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

        $historialApertura = HistorialApertura::create([
            'user_id' => Auth::user()->id,
            'descripcion' => 'Creación de apertura para ' . $request->categoria,
        ]);

        Apertura::create([
            'cuota_inicial' => $request->cuota_inicial,
            'cuota_final' => $request->cuota_final,
            'precio_apertura' => $request->precio_apertura,
            'historial_id' => $historialApertura->id,
            'categoria' => $request->categoria
        ]);

        return redirect()->back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $apertura = Apertura::find( $request->apertura_id );

        $historialApertura = HistorialApertura::create([
            'user_id' => Auth::user()->id,
            'descripcion' => 'Actualización de apertura para ' . $request->categoria
        ]);

        $apertura->update([
            'cuota_inicial' => $request->cuota_inicial,
            'cuota_final' => $request->cuota_final,
            'precio_apertura' => $request->precio_apertura,
            'historial_id' => $historialApertura->id,
        ]);

        return redirect()->back();
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
