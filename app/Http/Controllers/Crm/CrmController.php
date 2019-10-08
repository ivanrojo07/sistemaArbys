<?php

namespace App\Http\Controllers\Crm;

// namespace App\Repositories\Empleados;

use App\ClienteCRM;
use App\Cliente;
use App\Factories\Empleado\EmpleadoRepositorieFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Laboral;
use App\User;
use App\Vendedor;

class CrmController extends Controller
{
    public function __construct(EmpleadoRepositorieFactory $empleadoRepositorieFactory)
    {

        $this->empleadoRepositorieFactory = $empleadoRepositorieFactory;

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

        $vendedores = $this->empleadoRepositorieFactory->make($puesto)->getVendedores($empleado);

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
        // VENDEDORES DEL USUARIO AUTENTICADO
        $user = Auth::user();
        $empleado = $user->empleado()->first();
        $puesto = $empleado->puesto()->first();
        $vendedores = $this->empleadoRepositorieFactory->make($puesto)->getVendedores($empleado);

        $clientes = $vendedores ? $vendedores->pluck('clientes')->flatten() : collect();
        
        $crms = $clientes ? $clientes->pluck('crm')->flatten() : collect();
        $crms =   $crms ? $crms->where('fecha_cont', '>=', $request->fechaD)->where('fecha_cont','<=',$request->fechaH) : collect();
        $todos =   ClienteCRM::get();

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
