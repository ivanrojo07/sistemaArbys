<?php

namespace App\Http\Controllers\Precargas;

use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Acabado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcabadoController extends Controller
{
    // use Alert;
    public function __construct(){
        $this->titulo = 'acabado';
        $this->agregar = 'acabados.create';
        $this->guardar = 'acabados.store';
        $this->editar ='acabados.edit';
        $this->actualizar = 'acabados.update';
        $this->borrar ='acabados.destroy';
        $this->buscar = 'buscaracabado';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $acabados = Acabado::sortable()->paginate(10);
        return view('precargas.index',['precargas'=>$acabados, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('precargas.create',['titulo'=>$this->titulo,'guardar'=>$this->guardar]);
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
        Acabado::create($request->all());
        Alert::success('Precarga creada.')->persistent("Cerrar");
        return redirect()->route('acabados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acabado  $acabado
     * @return \Illuminate\Http\Response
     */
    public function show(Acabado $acabado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acabado  $acabado
     * @return \Illuminate\Http\Response
     */
    public function edit(Acabado $acabado)
    {
        //
        return view('precargas.edit',['precarga'=>$acabado, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acabado  $acabado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acabado $acabado)
    {
        //
        $acabado->update($request->all());
        Alert::success('Precarga actualizada.')->persistent("Cerrar");
        return redirect()->route('acabados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acabado  $acabado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acabado $acabado)
    {
        //
        $acabado->delete();
        return redirect()->route('acabados.index');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $acabados = Acabado::where(function ($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('abreviatura','LIKE',"%$word%");
            }
        })->paginate(50);
        return view('precargas.index',['precargas'=>$acabados, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }
}
