<?php

namespace App\Http\Controllers\Precargas;

use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Subtipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubtipoController extends Controller
{
        // use Alert;

    public function __construct(){
        $this->titulo = 'subtipo';
        $this->agregar = 'subtipos.create';
        $this->guardar = 'subtipos.store';
        $this->editar ='subtipos.edit';
        $this->actualizar = 'subtipos.update';
        $this->borrar ='subtipos.destroy';
        $this->buscar = 'buscarsubtipo';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subtipos = Subtipo::sortable()->paginate(10);
        return view('precargas.index',['precargas'=>$subtipos, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
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
        Subtipo::create($request->all());
        Alert::success('Precarga creada.')->persistent("Cerrar");
        return redirect()->route('subtipos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subtipo  $subtipo
     * @return \Illuminate\Http\Response
     */
    public function show(Subtipo $subtipo)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subtipo  $subtipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Subtipo $subtipo)
    {
        //
        return view('precargas.edit',['precarga'=>$subtipo, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subtipo  $subtipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subtipo $subtipo)
    {
        //
        $subtipo->update($request->all());
        Alert::success('Precarga actualizada.')->persistent("Cerrar");
        return redirect()->route('subtipos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subtipo  $subtipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subtipo $subtipo)
    {
        //
        $subtipo->delete();
        return redirect()->route('subtipos.index');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $subtipos = Subtipo::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('abreviatura','LIKE',"%$word%");
            }
        })->paginate(50);
        return view('precargas.index',['precargas'=>$subtipos, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }
}
