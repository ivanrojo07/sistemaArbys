<?php

namespace App\Http\Controllers\Solicitante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Solicitante;
use App\Cliente;
use App\CanalVenta;
use UxWeb\SweetAlert\SweetAlert as Alert;

class SolicitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::has('solicitante')->get();
        return view('solicitantes.index',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canalventas=CanalVenta::get();
        return view('solicitantes.create',['canalventas'=>$canalventas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rfc = Solicitante::where('rfc', $request->rfc)->get();
        if (count($rfc)!=0) {
            # code...
            return redirect()->back()->with('errors','El RFC ya està registrado');                               
        } else {
            # code...

            $solicitante = Solicitante::create($request->all());
           Alert::success('Solicitante creado con éxito', 'Siga agregando información');
           return view('solicitantes.view',['solicitante'=>$solicitante]); 
              
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
       
        $solicitante=Solicitante::where('id',$id)->first();
       
         return view('solicitantes.view',[
            'solicitante'=>$solicitante]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solicitante=Solicitante::where('id',$id)->first();
        $canalventas=CanalVenta::get();
        return view('solicitantes.edit',[
            'solicitante'=>$solicitante,
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
       $solicitante=Solicitante::where('id',$id)->first();

       
       $solicitante->update($request->except('_method','_token'));
       
       Alert::success('Solicitante modificado con éxito');
        return view('solicitantes.view',[
            'solicitante'=>$solicitante]);
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
