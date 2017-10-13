<?php

namespace App\Http\Controllers\Personal;

use App\Personal;
use App\Beneficiarios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalBeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Personal $personal, Beneficiarios $beneficiarios)
    {
        //
        if ($personal->tipo = 'Cliente') {
            $beneficiarios = $personal->beneficiarios;
            return view('benef.index', compact('beneficiarios','personal'));
        }
        else{
            return redirect('personals');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Personal $personal)
    {
        //
        return view('benef.create', compact('personal'));
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
        $beneficiario = Beneficiarios::create($request->all());
        return redirect()->route('personals.datosbeneficiario.index', compact('beneficiario','personal'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal, $datosbeneficiario)
    {
        //
        if ($personal->tipo == 'Cliente') {
            // $datoslab = DatosLab::where('clientes_id', $personal->id);
            $beneficiario = Beneficiarios::findOrFail($datosbeneficiario);
            $personal = Personal::findOrFail($personal->id);
            // dd($personal);
            return view('benef.view', compact('beneficiario','personal'));
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
    public function edit(Personal $personal,$datosbeneficiario)
    {
        //
        if ($personal->tipo == 'Cliente') {
            // $datoslab = DatosLab::where('clientes_id', $personal->id);
            $beneficiario = Beneficiarios::findOrFail($datosbeneficiario);
            $personal = Personal::findOrFail($personal->id);
            // dd($personal);
            return view('benef.edit', compact('beneficiario','personal'));
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
    public function update(Request $request, Personal $personal, $datosbeneficiario)
    {
        //
        $beneficiario = Beneficiarios::findOrFail($datosbeneficiario);
        $beneficiario->update($request->all());
        return redirect()->route('personals.datosbeneficiario.index',compact('beneficiario','personal'));
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
