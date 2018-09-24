<?php

namespace App\Http\Controllers\Provedor;


use App\ContactoProvedor;
use App\Http\Controllers\Controller;
use App\Provedor;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ProvedorContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $provedore)
    {
        //
        $contactos = $provedore->contactosProvedor;
        // dd($contactos);
        return view('provedores.contacto.index', ['provedore'=>$provedore, 'contactos'=>$contactos]);

    }

    public function busqueda(){
        $contactos = $provedore->contactosProvedor;
        // dd($contactos);
        return view('provedores.contacto.busqueda', ['provedore'=>$provedore, 'contactos'=>$contactos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Provedor $provedore)
    {
        //
        return view('provedores.contacto.create',['provedore'=>$provedore]);
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
        $contacto = ContactoProvedor::create($request->all());
        Alert::success('Contacto creado con éxito');

        return redirect()->route('provedores.contacto.index', ['provedore'=>$provedore]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $provedore,$contacto)
    {
        //
        $contacto = ContactoProvedor::findOrFail($contacto);
        return view('provedores.contacto.view',['provedore'=>$provedore, 'contacto'=>$contacto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $provedore, $contacto)
    {
        //
        $contacto = ContactoProvedor::findOrFail($contacto);
        return view('provedores.contacto.edit',['provedore'=>$provedore, 'contacto'=>$contacto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedore, $contacto)
    {
        //
        $contacto = ContactoProvedor::findOrFail($contacto);
        $contacto->update($request->all());
        Alert::success('Contacto actualizado con éxito');
        return redirect()->route('provedores.contacto.index',['provedore'=>$provedore]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provedor $provedor)
    {
        //
    }
}
