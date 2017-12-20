<?php

namespace App\Http\Controllers\Personal;

use UxWeb\SweetAlert\SweetAlert as Alert;
use App\DatosGenerales;
use App\FormaContacto;
use App\Giro;
use App\Http\Controllers\Controller;
use App\Personal;
use Illuminate\Http\Request;

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
            $formaContacto = FormaContacto::findorFail($datos->forma_contacto_id);
            // dd($giro);
            return view('datosgenerales.view',['datos'=>$datos, 'personal'=>$cliente, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);
            
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
        $formaContactos = FormaContacto::get();
        // dd($giros);}
        return view('datosgenerales.create',['personal'=>$cliente, 'giros'=>$giros, 'formaContactos'=>$formaContactos]);
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
        Alert::success('Datos generales creados con éxito');
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
        $formaContacto = FormaContacto::findorFail($datos->forma_contacto_id);
        // dd($giro);
        return view('datosgenerales.view',['datos'=>$datos, 'personal'=>$cliente, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);
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
        $formaContactos = FormaContacto::get();
        return view('datosgenerales.edit',['personal'=>$cliente, 'datos'=>$datos, 'giros'=>$giros, 'formaContactos'=>$formaContactos]);
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
        $formaContacto = FormaContacto::findorFail($datosgenerale->forma_contacto_id);
        Alert::success('Datos generales actualizados con éxito');
        return view('datosgenerales.view',['datos'=>$datosgenerale,'personal'=>$cliente, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);

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
