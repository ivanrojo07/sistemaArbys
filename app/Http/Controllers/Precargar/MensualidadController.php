<?php

namespace App\Http\Controllers\Precargar;

use App\HistorialMensualidad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mensualidad;
use Illuminate\Support\Facades\Auth;

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
        $mensualidadesCasas = Mensualidad::where('concepto','Casa')->get();
        $historialMensualidades = HistorialMensualidad::get();
        return view('precargas.mensualidades.index',compact(
            'mensualidadesMotos', 
            'mensualidadesCarros', 
            'mensualidadesCasas',
            'historialMensualidades'
        ));
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

        HistorialMensualidad::create([
            'user_id' => Auth::user()->id,
            'descripcion' => 'Actualización de la mensualidad de ' . $mensualidad->concepto . ' a ' . $mensualidad->meses . ' meses'
        ]);

        $mensualidad->update([
            'factor_actualizacion' => $request->factor_actualizacion,
            'monto_minimo' => $request->monto_minimo,
            'aportacion' => $request->aportacion,
            'gastos_administracion' => $request->gastos_administracion,
            'iva_gda' => $request->iva_gda,
            'seguro_vida' => $request->seguro_vida,
            'porcentaje_compensatorio' => $request->porcentaje_compensatorio
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
