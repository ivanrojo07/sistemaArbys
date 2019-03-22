<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Solicitante;
use App\Cliente;
//use App\CanalVenta;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ClienteSolicitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $clientes=Cliente::find($id);
        return view('solicitantes.index',['cliente'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     * @param \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        
        return view('clientes.integrantes.create',['cliente'=>$cliente]);
        //return view('solicitantes.create',['cliente'=>$cliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       

            $solicitante = Solicitante::create($request->all());
            $cliente=Cliente::where('id',$solicitante->cliente_id)->first();
           Alert::success('Solicitante creado con éxito', 'Siga agregando información');
           return view('solicitantes.view',['solicitante'=>$solicitante,'cliente'=>$cliente]); 
              
        }
    

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente,Solicitante $solicitante)
    {
       
    // $solicitante=Solicitante::where('id',$id)->first();
    //     $cliente=Cliente::where('id',$solicitante->cliente_id)->first();
       return view('solicitantes.view',['solicitante'=>$solicitante,'cliente'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente,Solicitante $solicitante)
    {

        // $solicitante=Solicitante::where('id',$id)->first();
        
        return view('solicitantes.edit',[
            'solicitante'=>$solicitante,
            'cliente'=>$cliente
            ]); 
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
      
       $solicitante=Solicitante::where('id',$id)->first();

       
       $solicitante->update($request->except('_method','_token'));
       $cliente=Cliente::where('id',$solicitante->cliente_id)->first();
       
       Alert::success('Solicitante modificado con éxito');
        return view('solicitantes.view',['solicitante'=>$solicitante,'cliente'=>$cliente]);
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

    $solicitantes = Solicitante::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
              $q->orWhere('numcontrato','LIKE',         "%$word%")
                ->orWhere('folio','LIKE',          "%$word%")
                ->orWhere('integrante','LIKE',    "%$word%");
            }
        })->get();
    return view('solicitantes.busqueda', ['solicitantes'=>$solicitantes]);
        

    }
}
