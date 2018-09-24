<?php

namespace App\Http\Controllers\Provedor;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\DireccionFisicaProvedor;
use App\Http\Controllers\Controller;
use App\Provedor;
use Illuminate\Http\Request;

class ProvedorDireccionFisicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $provedore)
    {
        //
        $direccion = $provedore->direccionFisicaProvedor;
        if ($direccion ==null) {
            # code...
            return redirect()->route('provedores.direccionfisica.create',['provedore'=>$provedore]);
        }
        else{
            return view('provedores.direccion.view',['direccion'=>$direccion,'provedore'=>$provedore]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Provedor $provedore)
    {
        //
        return view('provedores.direccion.create',['provedore'=>$provedore]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Provedor $provedore)
    {
        //
        // dd($request->all());
        $direccion = DireccionFisicaProvedor::create($request->all());

        Alert::success('Direcciòn Fìsica del Proveedor Actualizada')->persistent("Cerrar");
        return redirect()->route('provedores.contacto.index',['provedore'=>$provedore]);
        // return view('d}ireccion.view',['direccion'=>$direccion,'personal'=>$cliente]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $provedore)
    {
        //
        $direccion = $provedore->direccionFisicaProvedor;
        return view('provedores.direccion.view',['direccion'=>$direccion,'provedore'=>$provedore]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $provedore)
    {
        //
        $direccion = $provedore->direccionFisicaProvedor;
        return view('provedores.direccion.edit',['provedore'=>$provedore, 'direccion'=>$direccion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedore, DireccionFisicaProvedor $direccionFisicaProvedor )
    {
        //
        // dd($DireccionFiscal);
        $provedore->direccionFisicaProvedor->update($request->all());
        Alert::success('Direcciòn Fisical del Proveedor Actializada')->persistent("Cerrar");
        return redirect()->route('provedores.direccionfisica.index',['provedore'=>$provedore]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provedor $provedore)
    {
        //
    }
    public function prueba(){
        return view('provedores.direccion.view');
    }
}
