<?php

namespace App\Http\Controllers\Personal;

use App\Personal;
use App\RefPersonal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalRefPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Personal $personal, RefPersonal $refpersonals)
    {
        //
        if ($personal->tipo = 'Cliente') {
            $refpersonals = $personal->refpersonals;
            return view('refpers.index', compact('refpersonals','personal'));
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
        // dd($personal);
        return view('refpers.create',compact('personal'));
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
        $refpersonal = RefPersonal::create($request->all());
        return redirect()->route('personals.referenciapersonales.index', compact('refpersonal','personal'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @param  \App\Refpersonal $refpersonal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal,$refpersonale)
    {
        //
        if ($personal->tipo == 'Cliente') {
            // $datoslab = DatosLab::where('clientes_id', $personal->id);
            $refpersonal = RefPersonal::findOrFail($refpersonale);
            $personal = Personal::findOrFail($personal->id);
            // dd($personal);
            return view('refpers.view', compact('refpersonal','personal'));
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
    public function edit(Personal $personal, $refpersonale)
    {
        //
        if ($personal->tipo == 'Cliente') {
            // $datoslab = DatosLab::where('clientes_id', $personal->id);
            $refpersonal = RefPersonal::findOrFail($refpersonale);
            $personal = Personal::findOrFail($personal->id);
            // dd($personal);
            return view('refpers.edit', compact('refpersonal','personal'));
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
    public function update(Request $request, Personal $personal,$refpersonale)
    {
        //
        $refpersonal = RefPersonal::findOrFail($refpersonale);
        $refpersonal->update($request->all());
        return redirect()->route('personals.referenciapersonales.index',compact('refpersonals','personal'));
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
