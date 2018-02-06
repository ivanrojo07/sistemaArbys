<?php

namespace App\Http\Controllers\Gasto;

use App\Gasto;
use App\Sucursal;
// use App\Almacen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gastos = Gasto::sortable()->paginate(10);
        
        return view('gastos.index',['gastos'=>$gastos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $sucursal = Sucursal::find($request->sucursal);
        //$almacen = Almacen::find($request->almacen);
       
        $gasto= new Gasto; 

//         $tipo;
// if( $sucursal==null){
//  $tipo=true;
//  $gastos=Gasto::where('almacen_id',$request->almacen)->get();

// }else{
//     $tipo=false;
    $gastos=Gasto::where('sucursal_id',$request->sucursal)->get();
// }
        

         $total=0;

        foreach ($gastos as $suma ) {
            $total+=$suma->monto;
        }

        return view('gastos.create',[
        'gasto'=>$gasto,
        'sucursal'=>$sucursal,
        //'almacen'=>$almacen,
        'gastos'=>$gastos,
        'tipo'=>false,
        'total'=>$total]);//
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
       $sucursal = Sucursal::find($request->sucursal_id);
      // $almacen = Almacen::find($request->almacen_id);
      
        Gasto::create($request->all());
        Alert::success("Gasto registrado con exito")->persistent("Cerrar");
        
        
      

//          $tipo;
// if( $sucursal==null){
//  $tipo=true;
//  $gastos=Gasto::where('almacen_id',$request->almacen_id)->get();

// }else{
//     $tipo=false;
    $gastos=Gasto::where('sucursal_id',$request->sucursal_id)->get();
// }
          
         
        $gasto= new Gasto;
        $total=0;
        foreach ($gastos as $suma ) {
            $total+=$suma->monto;
        }
        return view('gastos.create',
            ['gastos'=>$gastos, 
            'sucursal'=>$sucursal,
            //'almacen'=>$almacen,
            'gasto'=>$gasto,
            'tipo'=>false,
            'total'=>$total]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto $gasto)
    {
        //
        // return view('gastos.index');
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto $gasto)
    {
       
        
           
        


        $sucursal = Sucursal::find($gasto->sucursal_id);
       // $almacen = Almacen::find($gasto->almacen_id);

         $gasto->delete();
       
        $gasto= new Gasto; 

//         $tipo;
// if( $sucursal==null){
//  $tipo=true;
//  $gastos=Gasto::where('almacen_id',$almacen->id)->get();

// }else{
//     $tipo=false;
     $gastos=Gasto::where('sucursal_id',$sucursal->id)->get();
// }
        

         $total=0;

        foreach ($gastos as $suma ) {
            $total+=$suma->monto;
        }

        return view('gastos.create',[
        'gasto'=>$gasto,
        'sucursal'=>$sucursal,
        //'almacen'=>$almacen,
        'gastos'=>$gastos,
        'tipo'=>false,
        'total'=>$total]);//
        

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {
        


    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */

    public function destroy(Gasto $gasto)
    {
       
        $gasto->delete();

         
    return view('gastos.create');

    }


    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $gastos = Gasto::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('etiqueta','LIKE',"%$word%");
            }
        })->paginate(10);
        return view('gastos.index',['gastos'=>$gastos]);
    }
}
