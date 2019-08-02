<?php

namespace App\Http\Controllers\Provedor;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tipo;

class ProveedorTipoController extends Controller
{

    public function index()
    {
        $tipos = Tipo::get();
        return view('provedores.tipos.index', compact('tipos'));
    }

    public function create()
    {
        return view('provedores.tipos.create');
    }

    public function store(Request $request)
    {
        Tipo::create($request->all());
        return redirect()->route('tipos.index');
    }

    public function view()
    { }

    public function edit(Request $request)
    {
        $tipo = Tipo::find($request->input('tipo_id'));
        return view('provedores.tipos.edit', compact('tipo'));
    }

    public function put(Request $request)
    {
        $tipo = Tipo::find($request->input('tipo_id'));
        $tipo->nombre = $request->input('nombre');
        $tipo->save();
        return redirect()->route('tipos.index');
    }

    /**
     * Eliminamos un tipo de la base de datos
     * mediante un verbo delete http
     */

    public function delete(Request $request)
    {
        $tipo = Tipo::find($request->input('tipo_id'));
        $tipo->delete();
        return redirect()->route('tipos.index');
    }
}
