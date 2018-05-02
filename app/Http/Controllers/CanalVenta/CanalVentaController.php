<?php

namespace App\Http\Controllers\CanalVenta;

use App\CanalVenta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CanalVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $canalventas = CanalVenta::sortable()->paginate(10);
        return view('canalventas.index',['canalventas'=>$canalventas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('canalventas.create');
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

        CanalVenta::create($request->all());
        return redirect('canalventas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CanalVenta  $canalventa
     * @return \Illuminate\Http\Response
     */
    public function show(CanalVenta $canalventa)
    {
        //
        // return view('canalventas.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CanalVenta  $canalventa
     * @return \Illuminate\Http\Response
     */
    public function edit(CanalVenta $canalventa)
    {
        //
        return view('canalventas.edit',['canalventa'=>$canalventa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CanalVenta  $canalventa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CanalVenta $canalventa)
    {
        //
        $canalventa->update($request->all());
        return redirect('canalventas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CanalVenta  $canalventa
     * @return \Illuminate\Http\Response
     */
    public function destroy(CanalVenta $canalventa)
    {
        //
        // var_dump($canalventa);
        // $canalventa = CanalVenta::findoorFail($canalventa);
        // CanalVenta::destroy($canalventa);
        $canalventa->delete();
        return  redirect('canalventas');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $canalventas = CanalVenta::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('etiqueta','LIKE',"%$word%");
            }
        })->paginate(10);
        return view('canalventas.index',['canalventas'=>$canalventas]);
    }

public function getCanales(){
        $canales = CanalVenta::get();
        return view('precargas.select',['precargas'=>$canales]);
    }
}
