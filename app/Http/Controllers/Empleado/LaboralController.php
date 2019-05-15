<?php

namespace App\Http\Controllers\Empleado;

use App\Http\Controllers\Controller;
use App\Sucursal;
use App\TipoBaja;
use App\TipoContrato;
use App\Area;
use App\Puesto;
use App\Banco;
use App\Region;
use App\Estado;
use App\Oficina;
use App\Empleado;
use App\Laboral;
use App\Gerente;
use App\Subgerente;
use App\Vendedor;
use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;

class LaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        $laborales = $empleado->laborales;
        if (count($laborales) > 0) {
            $subg = Empleado::find($laborales->first()->subgerente);
            $datoslab = $empleado->laborales->last();
            return view('empleado.laborales.index', ['empleado' => $empleado, 'laborales' => $laborales, 'datoslab' => $datoslab, 'subgerente' => $subg]); 
        } else
            return redirect()->route('empleados.laborals.create', ['empleado' => $empleado]);
    }

    public function estados(Region $region) {
        if($region->id != 0)
            return view('empleado.laborales.estados', ['region' => $region]);
    }

    public function oficinas(Estado $estado) {
        if($estado->id != 0)
            return view('empleado.laborales.oficinas', ['estado' => $estado]);
    }

    public function grupos(Oficina $oficina) {
        //dd($oficina);
        if($oficina->id != 0)
            return view('empleado.laborales.grupos', ['oficina' => $oficina]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        $contratos = TipoContrato::get();
        $areas =   Area::get();
        if(Auth::user()->perfil->id == 1)
            $puestos = Puesto::whereBetween('id', [2, 7])->get();
        else
            $puestos = Puesto::whereBetween('id', [3, 7])->get();
        $regiones = Region::get();
        return view('empleado.laborales.create', ['empleado' => $empleado, 'contratos' => $contratos, 'areas' => $areas, 'puestos' => $puestos, 'regiones' => $regiones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Empleado $empleado)
    {
        $request['actualizacion'] = $request->contratacion;
        $request['actual'] = $request->inicial;
        $request['original'] = Puesto::find($request->puesto_id)->nombre;
        $laborales = new Laboral($request->all());
        $empleado->laborales()->save($laborales);
        if($request->puesto_id == 5) {
            $gerente = new Gerente();
            $empleado->gerente()->save($gerente);
        } else if($request->puesto_id == 6) {
            $subgerente = new Subgerente();
            $empleado->subgerente()->save($subgerente);
        } else if($request->puesto_id == 7) {
            $vendedor = new Vendedor(['experto' => $request->experto]);
            $empleado->vendedor()->save($vendedor);
        }
        return redirect()->route('empleados.laborals.index', ['empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado, Laboral $laboral)
    {
        $contratos = TipoContrato::get();
        $areas =   Area::get();
        $puestos = [];
        $puesto = 0;
        $hayGerente = false;
        $empleados = Empleado::get();

        foreach ($empleados as $empl) {
            if ($empl->laborales->last()->oficina != null && $empleado->laborales->last()->oficina != null) {
                if ($empl->laborales->last()->oficina->id == $empleado->laborales->last()->oficina->id && $empl->laborales->last()->puesto->id == 5) {
                    $hayGerente = true;
                }
            }
        }
        if ($empleado->laborales->last()->puesto->id == 5) {
            $hayGerente = true;
        }
        if(Auth::user()->perfil->id == 1)
            $puestos = Puesto::whereBetween('id', [2, 7])->get();

        else
            //$puestos = Puesto::whereBetween('id', [3, 7])->get();
            $puesto = Puesto::where('id', $empleado->laborales->last()->puesto->id - 1)->first();

        $regiones = Region::get();
        return view('empleado.laborales.edit', ['datoslab' => $laboral, 'contratos' => $contratos, 'empleado' => $empleado, 'areas' => $areas, 'puestos' => $puestos, 'regiones' => $regiones, 'puesto' => $puesto, 'hayGerente' => $hayGerente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $laborales = new Laboral($request->all());
        $empleado->laborales()->save($laborales);
        if($request->puesto_id == 5) {
            if(!$empleado->gerente) {
                if($empleado->subgerente)
                    $empleado->subgerente->delete();
                if($empleado->vendedor)
                    $empleado->vendedor->delete();
                $gerente = new Gerente();
                $empleado->gerente()->save($gerente);
            }
        } else if($request->puesto_id == 6) {
            if(!$empleado->subgerente) {
                if($empleado->gerente)
                    $empleado->gerente->delete();
                if($empleado->vendedor)
                    $empleado->vendedor->delete();
                $subgerente = new Subgerente();
                $empleado->subgerente()->save($subgerente);
            }
        } else if($request->puesto_id == 7) {
            if($empleado->vendedor)
                $empleado->vendedor()->update(['experto' => $request->experto]);
            else {
                if($empleado->gerente)
                    $empleado->gerente->delete();
                if($empleado->subgerente)
                    $empleado->subgerente->delete();
                $vendedor = new Vendedor(['experto' => $request->experto]);
                $empleado->vendedor()->save($vendedor);
            }
        }
        return redirect()->route('empleados.laborals.index', ['empleado' => $empleado]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }

    public function newLaboral(Empleado $empleado)
    {
        $contratos = TipoContrato::get();
        $areas =   Area::get();
        $puestos = [];
        $puesto = 0;
        if(Auth::user()->perfil->id == 1)
            $puestos = Puesto::whereBetween('id', [2, 7])->get();
        elseif ($empleado->laborales->last()->puesto->id > 2) {
            //$puestos = Puesto::whereBetween('id', [3, 7])->get();
            $puesto = Puesto::where('id', $empleado->laborales->last()->puesto->id - 1)->first();
        }
        $regiones = Region::get();
        return view('empleado.laborales.createLaboral', ['empleado' => $empleado, 'contratos' => $contratos, 'areas' => $areas, 'puestos' => $puestos, 'regiones' => $regiones, 'puesto' => $puesto]);
    }

    public function addLaborals(Request $request, Empleado $empleado)
    {
        $datosLaborales = $empleado->laborales->first();
        $request['contratacion'] = $datosLaborales->contratacion;
        $request['inicial'] = $datosLaborales->inicial;
        $request['original'] = $datosLaborales->puesto->nombre;
        $grupos = Grupo::where('subgerente_id', $empleado->subgerente->id)->get();
        foreach ($grupos as $grupo) {
            $grupo->subgerente_id = null;
            $grupo->save();
        }
        $laborales = new Laboral($request->all());
        $empleado->laborales()->save($laborales);
        if($request->puesto_id == 5) {
            $gerente = new Gerente();
            $empleado->gerente()->save($gerente);
            $empleado->subgerente->change_puesto = true;
        } else if($request->puesto_id == 6) {
            $subgerente = new Subgerente();
            $empleado->subgerente()->save($subgerente);
            $empleado->vendedor->change_puesto = true;
        } else if($request->puesto_id == 7) {
            $vendedor = new Vendedor(['experto' => $request->experto]);
            $empleado->vendedor()->save($vendedor);
        }
        return redirect()->route('empleados.laborals.index', ['empleado' => $empleado]);
    }
}
