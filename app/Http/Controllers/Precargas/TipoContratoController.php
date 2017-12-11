<?php

namespace App\Http\Controllers\Precargas;

use App\TipoContrato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipoContratoController extends Controller
{
	public function __construct(){
        $this->titulo = 'Tipo de Contrato';
        $this->agregar = 'contratos.create';
        $this->guardar = 'contratos.store';
        $this->editar ='contratos.edit';
        $this->actualizar = 'contratos.update';
        $this->borrar ='contratos.destroy';
        $this->buscar = 'buscarcontrato';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contratos = TipoContrato::sortable()->paginate(10);
        return view('precargas.index',['precargas'=>$contratos, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
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
        TipoContrato::create($request->all());
        return redirect()->route('contratos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoContrato  $tipoContrato
     * @return \Illuminate\Http\Response
     */
    public function show(TipoContrato $contrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoContrato  $tipoContrato
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoContrato $contrato)
    {
        //
        return view('precargas.edit',['precarga'=>$contrato, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoContrato  $tipoContrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoContrato $contrato)
    {
        //
        $contrato->update($request->all());
        return redirect()->route('contratos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoContrato  $tipoContrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoContrato $contrato)
    {
        //
        $contrato->delete();
        return redirect()->route('contratos.index');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $tipoBaja = TipoBaja::where(function ($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('descripcion','LIKE',"%$word%");
            }
        })->paginate(50);
        return view('precargas.index',['precargas'=>$tipoBaja, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }
}
