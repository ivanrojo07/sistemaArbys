<?php

namespace App\Http\Controllers\Personal;

use App\Personal;
use App\Giro;
use App\DatosGenerales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalDatosGeneralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Personal $cliente)
    {
        //
        $datos = $cliente->datosGenerales;
        if ($datos==null) {
            # code...
            return redirect()->route('clientes.datosgenerales.create',['personal'=>$cliente]);;
        }
        else{
            $giro = Giro::findorFail($datos->giro_id);
            // dd($giro);
            return view('datosgenerales.view',['datos'=>$datos, 'personal'=>$cliente, 'giro'=>$giro]);
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Personal $cliente)
    {
        //
        $giros = Giro::get();
        // dd($giros);
        return view('datosgenerales.create',['personal'=>$cliente, 'giros'=>$giros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Personal $cliente)
    {
        //
        // dd($request->all());
        $datos = DatosGenerales::create($request->all());
        return redirect()->route('clientes.datosgenerales.index',['personal'=>$cliente]);;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $cliente)
    {
        //
        $datos = $cliente->datosGenerales;
        // dd($datos);
        $giro = Giro::findorFail($datos->giro_id);
        // dd($giro);
        return view('datosgenerales.view',['datos'=>$datos, 'personal'=>$cliente, 'giro'=>$giro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $cliente)
    {
        //
        $datos = $cliente->datosGenerales;
        $giros = Giro::get();
        return view('datosgenerales.edit',['personal'=>$cliente, 'datos'=>$datos, 'giros'=>$giros]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $cliente, DatosGenerales $datosgenerale)
    {
        //
        // dd($datosgenerale);
        $datosgenerale->update($request->all());
        $giro = Giro::findorFail($datosgenerale->giro_id);
        return view('datosgenerales.view',['datos'=>$datosgenerale,'personal'=>$cliente, 'giro'=>$giro]);

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
