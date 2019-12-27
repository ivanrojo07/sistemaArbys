<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Solicitante;
use App\Cliente;
use App\Product;
use App\Pago;
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
        $cliente=Cliente::find($id);
        $solicitante = $cliente->solicitante;
        return view('solicitantes.index',['cliente'=>$cliente, 'solicitante' => $solicitante]);
    }

    /**
     * Show the form for creating a new resource.
     * @param \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        $clave = $_GET['clave'];
        $pagos = $_GET['pagos'];
        $pagos = Pago::find($pagos);
        $producto = Product::where('clave', $clave)->first();
        return view('clientes.integrantes.create',['cliente'=>$cliente, 'producto' => $producto, 'pago' =>$pagos]);
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
       
        // dd('Store');

        $cliente = json_decode($request->cliente);
        $cliente = Cliente::find($cliente->id);
        $solicitante = Solicitante::create($request->all());
        // dd($solicitante);
        $solicitante->cliente_id = $cliente->id;
        $solicitante->save();
        Alert::success('Solicitante creado con éxito');

        return redirect()->route('clienteSolicitante', compact('cliente'));
        // return view('solicitantes.index',['solicitante'=>$solicitante,'cliente'=>$cliente]); 
              
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
    public function edit(Cliente $cliente, Solicitante $solicitante)
    {

        // $solicitante=Solicitante::where('id',$id)->first();
        
        return view('solicitantes.edit',['solicitante'=>$solicitante, 'cliente'=>$cliente]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Cliente $cliente, Solicitante $solicitante, Request $request)
    {
      
        // return "Hola";

       $solicitante=Solicitante::where('id',$solicitante->id)->first();

       
       $solicitante->update($request->except('_method','_token'));
       $cliente=Cliente::where('id',$solicitante->cliente_id)->first();
       $solicitante = Solicitante::all();
       Alert::success('Solicitante modificado con éxito');
        return view('solicitantes.index',['solicitante'=>$solicitante,'cliente'=>$cliente]);
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
