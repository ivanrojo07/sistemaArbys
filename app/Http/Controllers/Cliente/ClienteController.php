<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Solicitante;
use App\CanalVenta;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clientes=Cliente::doesntHave('solicitante')->get();
        
        return view('clientes.index',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canal_ventas=CanalVenta::get();
        return view('clientes.create',['canal_ventas'=>$canal_ventas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //dd($request->all());
         $rfc = Cliente::where('rfc', $request->rfc)->get();
        if (count($rfc)!=0) {
            # code...
            return redirect()->back()->with('errors','El RFC ya està registrado');                               
        } else {
            # code...

            $cliente = Cliente::create($request->all());
           Alert::success('Cliente creado con éxito', 'Siga agregando información');
           return view('clientes.view',['cliente'=>$cliente]); 
              
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $cliente=Cliente::where('id',$id)->first();
       
         return view('clientes.view',[
            'cliente'=>$cliente]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=Cliente::where('id',$id)->first();
        $canalventas=CanalVenta::get();
        return view('clientes.edit',[
            'cliente'=>$cliente,
            'canalventas'=>$canalventas]); 
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
       $cliente=Cliente::where('id',$id)->first();

       
       $cliente->update($request->except('_method','_token'));
       
       Alert::success('Cliente modificado con éxito');
        return view('clientes.view',[
            'cliente'=>$cliente]);
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

    public function buscar(Request $request){
   
   $query = $request->input('busqueda');
        $wordsquery = explode(' ',$query);

    $clientes = Cliente::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
              $q->orWhere('nombre','LIKE',         "%$word%")
                ->orWhere('apellidopaterno','LIKE',"%$word%")
                ->orWhere('apellidomaterno','LIKE',"%$word%")
                ->orWhere('razonsocial','LIKE',    "%$word%")
                ->orWhere('rfc','LIKE',            "%$word%")
                ->orWhere('folio','LIKE',          "%$word%")
                ->orWhere('identificador','LIKE',    "%$word%");
            }
        })->get();
    return view('clientes.busqueda', ['clientes'=>$clientes]);
        

    }
}
