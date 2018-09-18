<?php

namespace App\Http\Controllers\Oficina;

use App\Oficina;
use App\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Http\Controllers\Controller;

class OficinaController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "oficinas")
                        return $next($request);
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oficinas = Oficina::get();
        return view('oficina.index', ['oficinas' => $oficinas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::get();
        return view('oficina.create', ['estados' => $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oficina = Oficina::create($request->all());
        return view('oficina.view', ['oficina' => $oficina]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oficina = Oficina::find($id);
        return view('oficina.view', ['oficina' => $oficina]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oficina = Oficina::find($id);
        $estados = Estado::get();
        return view('oficina.edit', ['oficina' => $oficina, 'estados' => $estados]);
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
        $oficina = Oficina::find($id);
        $oficina->update($request->except('_method', '_token'));
        return view('oficina.view', ['oficina' => $oficina]);
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
