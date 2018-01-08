<?php

namespace App\Http\Controllers\Precargas;

use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Presentacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresentacionController extends Controller
{
        // use Alert;

    public function __construct(){
        $this->titulo = 'presentación';
        $this->agregar = 'presentaciones.create';
        $this->guardar = 'presentaciones.store';
        $this->editar ='presentaciones.edit';
        $this->actualizar = 'presentaciones.update';
        $this->borrar ='presentaciones.destroy';
        $this->buscar ='buscarpresentacion';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $presentaciones = Presentacion::sortable()->paginate(10);
        return view('precargas.index',['precargas'=>$presentaciones, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
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
        Presentacion::create($request->all());
        Alert::success('Precarga creada.')->persistent("Cerrar");
        return redirect()->route('presentaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function show(Presentacion $presentacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Presentacion $presentacion)
    {
        //
        return view('precargas.edit',['precarga'=>$presentacion, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presentacion $presentacion)
    {
        //
        $presentacion->update($request->all());
        Alert::success('Precarga actualizada.')->persistent("Cerrar");
        return redirect()->route('presentaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presentacion $presentacion)
    {
        //
        $presentacion->delete();
        return redirect()->route('presentaciones.index');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $presentaciones = Presentacion::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('abreviatura','LIKE',"%$word%");
            }
        })->paginate(50);
        return view('precargas.index',['precargas'=>$presentaciones, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }
}
