<?php

namespace App\Http\Controllers\Provedor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;

class ProveedorCategoriaController extends Controller
{

    public function __construct()
    { }

    public function index()
    {
        $categorias = Categoria::get();
        return view('provedores.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('provedores.categorias.create');
    }

    public function store(Request $request)
    {
        Categoria::create($request->all());
        return redirect()->route('categorias.index');
    }

    public function delete(Request $request)
    {
        $categoria = Categoria::find($request->input('categoria_id'));
        $categoria->delete();
        return redirect()->route('categorias.index');
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('provedores.categorias.edit', compact('categoria'));
    }

    public function put(Request $request)
    {
        $categoria = Categoria::find($request->input('categoria_id'));
        $categoria->fill($request->all());
        $categoria->save();
        return redirect()->route('categorias.index');
    }
}
