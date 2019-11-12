<?php

namespace App\Http\Controllers;

use App\CategoriaCarro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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

    public function precargaIndex()
    {
        $categoriasCarros = CategoriaCarro::get();
        return view('precargas.carros.index', compact('categoriasCarros'));
    }

    public function precargaCreate()
    {
        return view('precargas.carros.create');
    }

    public function precargaStore(Request $request)
    {
        // dd($request->input());
        CategoriaCarro::create([
            'nombre' => $request->nombre
        ]);
        return redirect()->route('precargas.carros.index')->with('success', 'Categoría añadida con exito.');
    }

    public function precargaEdit($id)
    {
        // dd($id);
        $categoriaCarro = CategoriaCarro::find($id);
        return view('precargas.carros.edit', compact('categoriaCarro'));
    }

    public function precargaUpdate(Request $request, $id)
    {
        $categoriaCarro = CategoriaCarro::find($id);
        $categoriaCarro->update([
            'nombre' => $request->nombre,
        ]);
        return redirect()->route('precargas.carros.index')->with('success', 'Categoría editada con exito.');
    }

    public function precargaDelete(Request $request, $id)
    {
        $categoriaCarro = CategoriaCarro::find($id)->delete();
        return redirect()->route('precargas.carros.index')->with('success', 'Categoría eliminada con exito.');
    }
}
