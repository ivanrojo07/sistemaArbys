<?php

namespace App\Http\Controllers\Provedor;

use App\Provedor;
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
        $provedores = Provedor::sortable()->paginate(10);
        
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
        $provedores = Provedor::where('rfc',$request->rfc)->get();
        // dd(count($personal));
        if (count($provedores) != 0) {
            # code...
            // alert()->error('Error Message', 'Optional Title');
            // return redirect()->route('clientes.create');
            return redirect()->back()->with('errors', 'El RFC ya existe');
        } else {
            # code...
            $cliente = Provedor::create($request->all());
<<<<<<< HEAD
            return redirect()->route('clientes.direccionfisica.create',['personal'=>$cliente]);
=======
            return redirect()->route('clientes.direccionfisica.create',['provedor'=>$cliente]);
>>>>>>> 3959c603c50cefa9e10ac7950f3b15e83ae0fa03
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function show(Personal $cliente)
=======
    public function show(Provedor $cliente)
>>>>>>> 3959c603c50cefa9e10ac7950f3b15e83ae0fa03
    {
        return view('clientes.view',['personal'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function edit(Personal $cliente)
=======
    public function edit(Provedor $cliente)
>>>>>>> 3959c603c50cefa9e10ac7950f3b15e83ae0fa03
    {
        //
        return view('clientes.edit',['personal'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Request $request, Personal $cliente)
=======
    public function update(Request $request, Provedor $cliente)
>>>>>>> 3959c603c50cefa9e10ac7950f3b15e83ae0fa03
    {
        //
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function destroy(Personal $cliente)
=======
    public function destroy(Provedor $cliente)
>>>>>>> 3959c603c50cefa9e10ac7950f3b15e83ae0fa03
    {
        //
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        
<<<<<<< HEAD
        $clientes = Personal::where(function($q) use($wordsquery){
=======
        $clientes = Provedor::where(function($q) use($wordsquery){
>>>>>>> 3959c603c50cefa9e10ac7950f3b15e83ae0fa03
            foreach ($wordsquery as $word) {
                # code...
            $q->orWhere('nombre','LIKE',"%$word%")
                ->orWhere('apellidopaterno','LIKE',"%$word%")
                ->orWhere('apellidomaterno','LIKE',"%$word%")
                ->orWhere('razonsocial','LIKE','%$word%')
                ->orWhere('rfc','LIKE',"%$word%")
                ->orWhere('alias','LIKE',"%$word%")
                ->orWhere('tipopersona','LIKE',"%$word%");
            }
        })->paginate(10);
<<<<<<< HEAD
        // $clientes = Personal::sortable()->where('nombre','LIKE',"%$query%")
=======
        // $clientes = Provedor::sortable()->where('nombre','LIKE',"%$query%")
>>>>>>> 3959c603c50cefa9e10ac7950f3b15e83ae0fa03
        // ->orWhere('apellidopaterno','LIKE',"%$query%")
        // ->orWhere('apellidomaterno','LIKE',"%$query%")
        // ->orWhere('razonsocial','LIKE','%$query%')
        // ->orWhere('rfc','LIKE',"%$query%")
        // ->orWhere('alias','LIKE',"%$query%")
        // ->orWhere('tipopersona','LIKE',"%$query%")
        // ->paginate(10);
        return view('clientes.index',['personals'=>$clientes]);
    }

	
}