<?php

namespace App\Http\Controllers\Banco;

use App\Banco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bancos = Banco::sortable()->paginate(10);
        return view('bancos.index',['bancos'=>$bancos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bancos.create');
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

        Banco::create($request->all());
        return redirect('bancos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function show(Banco $banco)
    {
        //
        // return view('bancos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function edit(Banco $banco)
    {
        //
        return view('bancos.edit',['banco'=>$banco]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banco $banco)
    {
        //
        $banco->update($request->all());
        return redirect('bancos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banco $banco)
    {
        //
        // var_dump($banco);
        // $banco = Banco::findoorFail($banco);
        // Banco::destroy($banco);
        $banco->delete();
        return  redirect('bancos');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $bancos = Banco::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('etiqueta','LIKE',"%$word%");
            }
        })->paginate(10);
        return view('bancos.index',['bancos'=>$bancos]);
    }
}
