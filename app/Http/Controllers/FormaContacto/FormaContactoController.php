<?php

namespace App\Http\Controllers\FormaContacto;

use App\FormaContacto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormaContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $formaContactos = FormaContacto::sortable()->paginate(10);
        return view('formacontacto.index',['formaContactos'=>$formaContactos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('formacontacto.create');
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
        FormaContacto::create($request->all());
        return redirect('formacontactos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormaContacto  $formaContacto
     * @return \Illuminate\Http\Response
     */
    public function show(FormaContacto $formaContacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormaContacto  $formaContacto
     * @return \Illuminate\Http\Response
     */
    public function edit(FormaContacto $formacontacto)
    {
        
        return view('formacontacto.edit',['formaContacto'=>$formacontacto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormaContacto  $formaContacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormaContacto $formacontacto)
    {
        //
        $formacontacto->update($request->all());
        return redirect('formacontactos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormaContacto  $formaContacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormaContacto $formacontacto)
    {
        //
        $formacontacto->delete();
        return redirect('formacontactos');
    }
    
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $formaContactos = FormaContacto::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('etiqueta','LIKE',"%$word%");
            }
        })->paginate(10);
        return view('formacontacto.index',['formaContactos'=>$formaContactos ]);
    }
}
