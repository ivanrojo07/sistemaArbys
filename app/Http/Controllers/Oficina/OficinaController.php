<?php

namespace App\Http\Controllers\Oficina;

use App\Oficina;
use App\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OficinaController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if ($componente->modulo->nombre == "oficinas")
                        return $next($request);
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }

    private function hasComponent($nombre)
    {
        foreach (Auth::user()->perfil->componentes as $componente)
            if ($componente->nombre == $nombre)
                return true;
        return false;
    }

    public function index()
    {
        if ($this->hasComponent('indice oficinas')) {
            $oficinas = Oficina::get();
            return view('oficinas.index', ['oficinas' => $oficinas]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($this->hasComponent('crear oficina')) {
            $estados = Estado::get();
            return view('oficinas.create', ['estados' => $estados]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'identificador' => 'required|unique:oficinas|max:99',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }

        if ($this->hasComponent('crear oficina')) {
            $oficina = Oficina::create($request->all());
            return redirect()->route('oficinas.show', ['oficina' => $oficina]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($this->hasComponent('ver oficina')) {
            $oficina = Oficina::find($id);
            return view('oficinas.view', ['oficina' => $oficina]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($this->hasComponent('editar oficina')) {
            $oficina = Oficina::find($id);
            $estados = Estado::get();
            return view('oficinas.edit', ['oficina' => $oficina, 'estados' => $estados]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($this->hasComponent('editar oficina')) {
            $oficina = Oficina::find($id);
            $oficina->update($request->all());
            return redirect()->route('oficinas.show', ['oficina' => $oficina]);
        }
        return redirect()->route('denegado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
