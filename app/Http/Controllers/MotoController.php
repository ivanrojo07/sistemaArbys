<?php

namespace App\Http\Controllers;

use App\CategoriaMoto;
use Illuminate\Http\Request;

class MotoController extends Controller
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

    public function precargaIndex(){
        $categoriasMotos = CategoriaMoto::get();
        return view('precargas.motos.index', compact('categoriasMotos'));
    }

    public function precargaCreate(){
        return view('precargas.motos.create');
    }

    public function precargaStore(Request $request){
        // dd($request->input());
        CategoriaMoto::create([
            'nombre'=>$request->nombre,
        ]);
        return redirect()->route('precargas.motos.index')->with('success','Categoría añadida con éxito.');
    }

    public function precargaEdit($id){
        $categoriaMoto = CategoriaMoto::find($id);
        return view('precargas.motos.edit',compact('categoriaMoto'));
    }

    public function precargaUpdate(Request $request, $id){
        $categoriaMoto = CategoriaMoto::find($id);
        $categoriaMoto->update($request->all());
        return redirect()->route('precargas.motos.index')->with('success','Categoría editada con éxito.');
    }

    public function precargaDelete(Request $request, $id){
        CategoriaMoto::find($id)->delete();
        return redirect()->route('precargas.motos.index')->with('success','Categoría eliminada con éxito.');
    }
}
