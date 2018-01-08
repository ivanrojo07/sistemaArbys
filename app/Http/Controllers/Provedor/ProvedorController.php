<?php

namespace App\Http\Controllers\Provedor;

use App\Provedor;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProvedorController extends Controller{
 // use Alert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provedores = Provedor::sortable()->paginate(5);
        // Alert::message('Robots are working!');
        return view('provedores.index', ['provedores'=>$provedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('provedores.create');
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
        $provedore = Provedor::where('rfc',$request->rfc)->get();
        // dd(count($provedore));
        if (count($provedore) != 0) {
            # code...
            // alert()->error('Error Message', 'Optional Title');
            // return redirect()->route('clientes.create');
            return redirect()->back()->with('errors', 'El RFC ya existe');
        } else {
            # code...
            $provedore = Provedor::create($request->all());
            Alert::success("Proveedor creado con exito, sigue agregando información")->persistent("Cerrar");
            return redirect()->route('provedores.direccionfisica.create',['provedore'=>$provedore]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\provedore  $provedore
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $provedore)
    {
        
        return view('provedores.view',['provedore'=>$provedore]);
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
        return view('provedores.edit',['provedore'=>$provedore]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedore)
    {
        
        $provedore->update($request->all());
        Alert::success('Proveedor actualizado')->persistent("Cerrar");
        return redirect()->route('provedores.show',['provedore'=>$provedore]);
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
    public function buscar(Request $request){
    // dd($request);
    $query = $request->input('busqueda');
    $wordsquery = explode(' ',$query);
    $provedores = Provedor::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
            $q->orWhere('nombre','LIKE',           "%$word%")
                ->orWhere('apellidopaterno','LIKE',"%$word%")
                ->orWhere('apellidomaterno','LIKE',"%$word%")
                ->orWhere('razonsocial','LIKE',    "%$word%")
                ->orWhere('rfc','LIKE',            "%$word%")
                ->orWhere('alias','LIKE',          "%$word%")
                ->orWhere('tipopersona','LIKE',    "%$word%");
            }
        })->get();
    return view('provedores.busqueda', ['provedores'=>$provedores]);
        

    }


}