<?php

namespace App\Http\Controllers\Giro;

use App\Giro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $giros = Giro::sortable()->paginate(10);
        return view('giro.index',['giros'=>$giros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('giro.create');
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

        Giro::create($request->all());
        return redirect('giros');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Giro  $giro
     * @return \Illuminate\Http\Response
     */
    public function show(Giro $giro)
    {
        //
        // return view('giro.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Giro  $giro
     * @return \Illuminate\Http\Response
     */
    public function edit(Giro $giro)
    {
        //
        return view('giro.edit',['giro'=>$giro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Giro  $giro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giro $giro)
    {
        //
        $giro->update($request->all());
        return redirect('giros');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Giro  $giro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giro $giro)
    {
        //
        // var_dump($giro);
        // $giro = Giro::findoorFail($giro);
        // Giro::destroy($giro);
        $giro->delete();
        return  redirect('giros');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $giros = Giro::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('etiqueta','LIKE',"%$word%");
            }
        })->paginate(10);
        return view('giro.index',['giros'=>$giros]);
    }
}
