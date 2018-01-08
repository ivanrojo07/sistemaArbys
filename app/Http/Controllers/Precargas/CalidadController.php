<?php

namespace App\Http\Controllers\Precargas;

use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Calidad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalidadController extends Controller
{
        // use Alert;
        
        public function __construct(){
        $this->titulo = 'calidad';
        $this->agregar = 'calidad.create';
        $this->guardar = 'calidad.store';
        $this->editar ='calidad.edit';
        $this->actualizar = 'calidad.update';
        $this->borrar ='calidad.destroy';
        $this->buscar ='buscarcalidad';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $calidads = Calidad::sortable()->paginate(10);
        return view('precargas.index',['precargas'=>$calidads, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
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
        Calidad::create($request->all());
        Alert::success('Precarga creada.')->persistent("Cerrar");
        return redirect()->route('calidad.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Calidad  $calidad
     * @return \Illuminate\Http\Response
     */
    public function show(Calidad $calidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calidad  $calidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Calidad $calidad)
    {
        //
        return view('precargas.edit',['precarga'=>$calidad, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calidad  $calidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calidad $calidad)
    {
        //
        $calidad->update($request->all());
        Alert::success('Precarga actualizada.')->persistent("Cerrar");
        return redirect()->route('calidad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calidad  $calidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calidad $calidad)
    {
        //
        $calidad->delete();
        return redirect()->route('calidad.index');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $calidads = Calidad::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('abreviatura','LIKE',"%$word%");
            }
        })->paginate(50);
        return view('precargas.index',['precargas'=>$calidads, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }
}
