<?php

namespace App\Http\Controllers\Personal;

use App\DatosLab;
use App\Http\Controllers\Controller;
use App\Personal;
use Illuminate\Http\Request;

class PersonalDatosLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Personal $personal)
    {
        if ($personal->tipo == 'Cliente') {
            // $datoslab = DatosLab::where('clientes_id', $personal->id);
            $datoslab = $personal->datosLab;
            if ($datoslab == null) {
                # code...
                return redirect()->route('personals.datoslaborales.create',['personal'=>$personal]);
            } else {
                # code...
                return view('datoslab.view',['personal'=>$personal, 'datoslab'=>$datoslab]);
            }
            
            // dd($personal);
            // return view('datoslab.index', compact('datoslab','personal'));
        }
        else{
            return redirect()->route('personals.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Personal $personal)
    {
        // dd($personal);
        return view('datoslab.create', compact('personal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Personal $personal)
    {
        //
        // dd($request->all());
        $datoslab = DatosLab::create($request->all());
        return redirect()->route('personals.datoslaborales.index',compact('datoslab','personal'));

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
        if ($personal->tipo == 'Cliente') {
            // $datoslab = DatosLab::where('clientes_id', $personal->id);
            $datoslab = $personal->datosLab;
            $personal = Personal::findOrFail($personal->id);
            // dd($personal);
            return view('datoslab.view',['personal'=>$personal,'datoslab'=>$datoslab]);
        }
        else{
            return redirect('personals');
        }
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
        if ($personal->tipo == 'Cliente') {
            // $datoslab = DatosLab::where('clientes_id', $personal->id);
            $datoslab = $personal->datosLab;
            $personal = Personal::findOrFail($personal->id);
            // dd($personal);
            return view('datoslab.edit', compact('datoslab','personal'));
        }
        else{
            return redirect('personals');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal, DatosLab $datoslab)
    {
        //
        // dd($request->all());
        $datoslab = $personal->datosLab;
        $datoslab->update($request->all());
        return redirect()->route('personals.datoslaborales.index',compact('datoslab','personal'));
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
