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
}
