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
        $provedores = Provedor::sortable()->paginate(10);
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
<<<<<<< HEAD
            $cliente = Provedor::create($request->all());
            return redirect()->route('clientes.direccionfisica.create',['provedor'=>$cliente]);

=======
            $provedore = Provedor::create($request->all());
            Alert::success("Proveedor creado con exito, sigue agregando información")->persistent("Cerrar");
            return redirect()->route('provedores.direccionfisica.create',['provedore'=>$provedore]);
>>>>>>> f5eda1cf75c3786972366f0e998e124cf26c9969
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\provedore  $provedore
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD

    public function show(Provedor $cliente)
=======
    public function show(Provedor $provedore)
>>>>>>> f5eda1cf75c3786972366f0e998e124cf26c9969
    {
        
        return view('provedores.view',['provedore'=>$provedore]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD

    public function edit(Provedor $cliente)
=======
    public function edit(Provedor $provedore)
>>>>>>> f5eda1cf75c3786972366f0e998e124cf26c9969
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
<<<<<<< HEAD
    public function update(Request $request, Provedor $cliente)
=======
    public function update(Request $request, Provedor $provedor)
>>>>>>> f5eda1cf75c3786972366f0e998e124cf26c9969
    {
        //
        $provedor->update($request->all());
        Alert::success('Proveedor actualizado')->persistent("Cerrar");
        return redirect()->route('provedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD

    public function destroy(Provedor $cliente)

=======
    public function destroy(Provedor $provedore)
>>>>>>> f5eda1cf75c3786972366f0e998e124cf26c9969
    {
        //
    }
    public function buscar(Request $request){
<<<<<<< HEAD
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        
        $clientes = Provedor::where(function($q) use($wordsquery){
=======
    // dd($request);
    $query = $request->input('busqueda');
    $wordsquery = explode(' ',$query);
    $provedore = Provedor::where(function($q) use($wordsquery){
>>>>>>> f5eda1cf75c3786972366f0e998e124cf26c9969
            foreach ($wordsquery as $word) {
                # code...
            $q->orWhere('nombre','LIKE',"%$word%")
                ->orWhere('apellidopaterno','LIKE',"%$word%")
                ->orWhere('apellidomaterno','LIKE',"%$word%")
                ->orWhere('razonsocial','LIKE',"%$word%");
                // ->orWhere('rfc','LIKE',"%$word%");
                // ->orWhere('alias','LIKE',"%$word%");
                // ->orWhere('tipopersona','LIKE',"%$word%")
            }
<<<<<<< HEAD
        })->paginate(10);

        // $clientes = Provedor::sortable()->where('nombre','LIKE',"%$query%")
        // ->orWhere('apellidopaterno','LIKE',"%$query%")
        // ->orWhere('apellidomaterno','LIKE',"%$query%")
        // ->orWhere('razonsocial','LIKE','%$query%')
        // ->orWhere('rfc','LIKE',"%$query%")
        // ->orWhere('alias','LIKE',"%$query%")
        // ->orWhere('tipopersona','LIKE',"%$query%")
        // ->paginate(10);
        return view('clientes.index',['personals'=>$clientes]);
=======
        })->get();
    return view('provedores.busqueda', ['provedore'=>$provedore]);
        

>>>>>>> f5eda1cf75c3786972366f0e998e124cf26c9969
    }


}