<?php

namespace App\Http\Controllers\Crm;

// namespace App\Repositories\Empleados;

use App\ClienteCRM;
use App\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Laboral;
use App\User;
use App\Vendedor;

class CrmController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if ($componente->modulo->nombre == "crm")
                        return $next($request);
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
        $user = Auth::user();
        $empleado = $user->empleado()->first();
        $puesto = $empleado->puesto()->first();

        // OBTENEMOS LOS VENDEDORES DEPENDIENDO DEL PUESTO DEL USUARIO QUE INGRESÓ
        if ($puesto->nombre == 'Vendedor') {
            $vendedores = $empleado->vendedor()->with('clientes.crm')->get();
        } else if ($puesto->nombre == 'Subgerente') {
            $subgerente = $empleado->subgerente()->first();
            $grupos = $subgerente->grupos()->with('vendedores.clientes.crm')->get();
            $vendedores = $grupos->pluck('vendedores')->flatten();
        } else if ($puesto->nombre == 'Gerente') {
            $subgerente = $empleado->subgerente()->first();
            $grupos = $subgerente ? $subgerente->grupos()->with('vendedores.clientes.crm')->get() : null;
            $vendedores = $grupos ? $grupos->pluck('vendedores')->flatten() : null;
        } else if ($puesto->nombre == 'Director Estatal') {
            $estado = $empleado->estado()->first();
            $laborals = Laboral::where('estado_id', $estado->id)->get();
            $empleados_id = $laborals->pluck('empleado_id')->flatten();
            $vendedores = Vendedor::whereIn('empleado_id', $empleados_id)->with('clientes.crm')->get();
        } else if ($puesto->nombre == 'Director Regional') {
            $region = $empleado->laborales()->orderBy('id', 'desc')->first()->region()->first();
            $laborals = Laboral::where('region_id', $region->id)->get();
            $empleados_id = $laborals->pluck('empleado_id')->flatten();
            $vendedores = Vendedor::whereIn('empleado_id', $empleados_id)->with('clientes.crm')->get();
        } else if ($puesto->nombre == 'Director General' || Auth::user()->id == 1) {
            $vendedores = Vendedor::get();
        } else {
            return redirect()->back();
        }

        $clientes = $vendedores ? $vendedores->pluck('clientes')->flatten() : collect();
        $crms = $clientes ? $clientes->pluck('crm')->flatten() : collect();

        return view('crm.index', ['crms' => $crms, 'clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $crm = ClienteCRM::create($request->all());
        return redirect()->route('crm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClienteCRM  $clienteCRM
     * @return \Illuminate\Http\Response
     */
    public function show(ClienteCRM $clienteCRM)
    {
        //
    }

    public function porFecha(Request $request)
    {

        //dd($request->fechaH);
        $crms =   ClienteCRM::whereBetween('fecha_cont', [$request->fechaD, $request->fechaH])->orderBy('fecha_cont', 'asc')->get();
        $todos =   ClienteCRM::get();
        $clientes = Cliente::orderBy('nombre', 'desc')->get();

        return view('crm.index', [
            'crms'    => $crms,
            'todos'   => $todos,
            'clientes' => $clientes
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClienteCRM  $clienteCRM
     * @return \Illuminate\Http\Response
     */
    public function edit(ClienteCRM $clienteCRM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClienteCRM  $clienteCRM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClienteCRM $clienteCRM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClienteCRM  $clienteCRM
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClienteCRM $clienteCRM)
    {
        //
    }
}
