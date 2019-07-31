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

    public function view() {

    }

    public function edit()
    {

    }

    public function update()
    {
    }

    public function destroy() {

    }

}
