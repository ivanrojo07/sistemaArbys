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

    public function estados(Region $region)
    {
        if ($region->id != 0)
            return view('empleado.laborales.estados', ['region' => $region]);
    }

    public function oficinas(Estado $estado)
    {
        if ($estado->id != 0)
            return view('empleado.laborales.oficinas', ['estado' => $estado]);
    }

    public function grupos(Oficina $oficina)
    {
        //dd($oficina);
        if ($oficina->id != 0)
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
        if (Auth::user()->perfil->id == 1)
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
        $empleado->experto = $request->experto;
        // dd($empleado->id);
        $empleado->save();

        /**
         * Si la peticion es crear un gerente
         */

        if ($request->puesto_id == 5) {

            if ($this->VerificarGerencia($laborales)) {

                $empleado->laborales()->save($laborales);
                $this->MakeGerente($empleado);
                $this->CrearGerencia($empleado);

                /**
                 * Agregamos al gerente a su respectiva oficina
                 */

                $oficina = Oficina::where('id', (int) $request->input('oficina_id'))->first();
                $gerente = Gerente::where('empleado_id', $empleado->id)->first();

                // dd($request->input());

                // if ($gerente) {
                $oficina->gerente_id = $gerente->id;
                $oficina->save();
                // }

            } else {
                Alert::error('Cambie el puesto del gerente actual primero', 'La gerencia esta ocupada');
                return redirect()->back();
            }
        } else if ($request->puesto_id == 6) {

            // dd($request->input());

            $empleado->laborales()->save($laborales);
            $subgerente = new Subgerente();
            // $subgerente->oficina_id = (int) $request->input('oficina_id');
            $empleado->subgerente()->save($subgerente);

            $vende = Vendedor::create([
                'empleado_id' => $empleado->id,
                'grupo_id' => $request->group_id,
                'experto' => $request->experto,
                'status' => 'Activo'
            ]);

            // dd($vende);

            // $empleado->vendedor()->save();
        } else if ($request->puesto_id == 4) {
            if ($this->VerificarPuesto($laborales, $request)) {
                $empleado->laborales()->save($laborales);
            } else {
                Alert::error('Cambie el puesto del director estatal actual primero', 'La direccion estatal esta ocupada');
                return redirect()->back();
            }
        } else if ($request->puesto_id == 3) {
            if ($this->VerificarPuesto($laborales, $request)) {
                $empleado->laborales()->save($laborales);
            } else {
                Alert::error('Cambie el puesto del director regional actual primero', 'La direccion regional esta ocupada');
                return redirect()->back();
            }
        } else if ($request->puesto_id == 2) {
            if ($this->VerificarPuesto($laborales, $request)) {
                $empleado->laborales()->save($laborales);
            } else {
                Alert::error('Cambie el puesto del director general actual primero', 'La direccion general esta ocupada');
                return redirect()->back();
            }
        } else if ($request->puesto_id == 7) {
            $empleado->laborales()->save($laborales);
            // $vendedor = new Vendedor(['experto' => $request->experto]);
            $vendedor = new Vendedor();
            $vendedor->experto = $request->experto;
            $vendedor->grupo_id = (int) $request->input('group_id');

            // dd((int)$request->input('group_id'));

            // dd($vendedor);
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
            if (isset($empl->laborales->last()->oficina->id) && isset($empleado->laborales->last()->oficina->id)) {
                if (isset($empl->laborales->last()->oficina) && $empl->laborales->last()->oficina->id == $empleado->laborales->last()->oficina->id) {
                    if ($empl->laborales->last()->puesto->id == 5) {
                        $hayGerente = true;
                    }
                }
            }
        }

        if ($empleado->laborales->last()->puesto->id == 5) {
            $hayGerente = true;
        }
        if (Auth::user()->perfil->id == 1)
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

        /**
         * Si el empleado que se desea actualizar es un gerente
         * eliminamos su cargo de la gerencia
         */
        $gerente = Gerente::where('empleado_id', $empleado->id)->first();
        if ($gerente) {
            $oficina = Oficina::where('gerente_id', $gerente->id)->first();
            if ($oficina) {
                $oficina->gerente_id = null;
                $oficina->save();
            }
        }

        $laborales = new Laboral($request->all());
        $grupos = Grupo::get();
        $empleado->experto = $request->experto;
        $empleado->save();


        // SI SUBE DE PUESTO A LA GERENCIA
        if ($request->puesto_id == 5) {

            // SI LA GERENCIA ESTA LIBRE ASIGNAMOS AL EMPLEADO AL PUESTO
            if ($this->VerificarGerencia($laborales)) {

                if (isset($empleado->gerente)) {
                    Alert::error('Degradelo de gerente primero', 'Este empelado ya es un gerente');
                } else {
                    $empleado = $this->BorrarGrupos($empleado);
                    $empleado = $empleado->laborales()->save($laborales);
                    //devuelve el id del area o un 0 si no hace nada
                    $empleado = $this->CrearGerencia($empleado);
                    $empleado = $this->MakeGerente($empleado);

                    $oficina = Oficina::where('id', $request->input('oficina_id'))->first();
                    if ($oficina) {
                        $gerente = Gerente::where('empleado_id', $empleado->id)->first();
                            $oficina->gerente_id = $gerente->id;
                            $oficina->save();              
                    }
                }

            } else {
                Alert::error('Cambie el puesto del gerente actual primero', 'La gerencia esta ocupada');
                return redirect()->back();
            }
        } else if ($request->puesto_id == 4) {
            $this->BorrarGerencia($empleado);
            $this->BorrarGrupos($empleado);
            if ($this->VerificarPuesto($laborales, $request)) {
                $empleado->laborales()->save($laborales);
            } else {
                Alert::error('Cambie el puesto del director estatal actual primero', 'La direccion estatal esta coupada');
                return redirect()->back();
            }
        } else if ($request->puesto_id == 3) {
            $this->BorrarGerencia($empleado);
            $this->BorrarGrupos($empleado);
            if ($this->VerificarPuesto($laborales, $request)) {
                //Comprobar la region del director
                $empleado->laborales()->save($laborales);
            } else {
                Alert::error('Cambie el puesto del director regional actual primero', 'La direccion regional esta coupada');
                return redirect()->back();
            }
        } else if ($request->puesto_id == 2) {
            $this->BorrarGerencia($empleado);
            $this->BorrarGrupos($empleado);
            if ($this->VerificarPuesto($laborales, $request)) {
                $empleado->laborales()->save($laborales);
            } else {
                Alert::error('Cambie el puesto del director general actual primero', 'La direccion general esta coupada');
                return redirect()->back();
            }
        } else if ($request->puesto_id == 6) {
            if (isset($empleado->gerente)) {
                Alert::message('Se le recomienda asignar un gerente', 'La gerencia queda libre');
            }
            $this->BorrarGerencia($empleado);
            $empleado->laborales()->save($laborales);
            $this->MakeSubgerente($empleado);

            $vendedor = Vendedor::updateOrCreate([
                'empleado_id' => $empleado->id,
                'experto' => $request->experto
            ], [
                'empleado_id' => $empleado->id,
                'experto' => $request->experto
            ]);

        } else if ($request->puesto_id == 7) {
            $this->BorrarGerencia($empleado);
            $this->BorrarGrupos($empleado);
            $empleado->laborales()->save($laborales);
            if ($empleado->vendedor)
                $empleado->vendedor()->update(['experto' => $request->experto]);
            else {
                if ($empleado->subgerente)
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

    public function MakeSubgerente(Empleado $empleado)
    {
        if (!$empleado->subgerente) {
            //dd(isset($empleado->gerente));                
            if ($empleado->vendedor)
                $empleado->vendedor->delete();
            $subgerente = new Subgerente();
            $empleado->subgerente()->save($subgerente);
            return 1;
        }
        return 0;
    }

    public function BorrarGerencia(Empleado $empleado)
    {
        if (isset($empleado->gerente)) {
            if ($empleado->laborales->last()->area->id == 1) {
                var_dump('borrar responsable administrativo');
                $empleado->laborales->last()->oficina->responsable_adm = null;

                $oficina = $empleado->laborales->last()->oficina->save();
                $empleado->gerente->delete();
                //return 1;
            } else {
                var_dump('borrar responsable comercial');
                $empleado->laborales->last()->oficina->responsable_com = null;
                $oficina = $empleado->laborales->last()->oficina->save();
                $empleado->gerente->delete();
                //return 2;
            }
        }

        return $empleado;
    }



    public function MakeGerente(Empleado $empleado)
    {
        if ($empleado->gerente == null) {
            if ($empleado->subgerente)
                $empleado->subgerente->delete();
            if ($empleado->vendedor)
                $empleado->vendedor->delete();
            $gerente = new Gerente();
            $empleado->gerente()->save($gerente);
            var_dump("Hice un gerente nuevo");
            //return 1;
        }

        return $empleado;
    }

    public function CrearGerencia(Empleado $empleado)
    {
        //$empleado->laborales->last()->oficina->save();
        if ($empleado->laborales->last()->area->id == 1) {
            var_dump('crear responsable_adm');
            $empleado->laborales->last()->oficina->responsable_adm = $empleado->nombre . ' ' . $empleado->appaterno . ' ' . $empleado->apmaterno;
            $empleado->laborales->last()->oficina->save();
            return $empleado;
        } else {
            var_dump('crear responsable_com');
            $empleado->laborales->last()->oficina->responsable_com = $empleado->nombre . ' ' . $empleado->appaterno . ' ' . $empleado->apmaterno;
            $empleado->laborales->last()->oficina->save();
            return $empleado;
        }

        return $empleado;
    }

    public function BorrarGrupos(Empleado $empleado)
    {
        if (isset($empleado->subgerente->grupos)) {
            //dd($empleado->subgerente->grupos);
            foreach ($empleado->subgerente->grupos as $group) {
                $group->subgerente_id = null;
                $group->save();
            }
        }
        return $empleado;
    }

    public function VerificarGerencia(Laboral $laborales)
    {

        /**
         * Si la oficina cuenta con un responsable administrador
         * entonces está ocupada
         */

        if ($laborales->area_id == 1) {
            if ($laborales->oficina->responsable_adm) {
                Alert::error('Cambie el puesto del gerente actual primero', 'La gerencia esta ocupada');
                return 0;
            }
        }

        /**
         * Si la oficina cuenta con un responsable comercial
         * entonces la oficina está ocupada
         */

        if ($laborales->area_id == 2) {
            if ($laborales->oficina->responsable_com) {
                Alert::error('Cambie el puesto del gerente actual primero', 'La gerencia esta ocupada');
                return 0;
            }
        }

        /**
         * Si la oficina no tiene responsable administrador
         * ni responsable comercial, entonces la oficina 
         * tiene la gerencia disponible
         */

        return 1;
    }

    public function VerificarPuesto(Laboral $laborales, Request $request)
    {

        $empleados = Empleado::get();
        foreach ($empleados as $empleado) {
            if (isset($empleado->laborales->last()->puesto)) {
                if ($empleado->laborales->last()->puesto->id == 4) {
                    if ($empleado->laborales->last()->puesto->id == $laborales->puesto->id && $empleado->laborales->last()->estado->id == $request->estado_id)
                        return 0;
                } elseif ($empleado->laborales->last()->puesto->id == 3) {
                    if ($empleado->laborales->last()->puesto->id == $laborales->puesto->id && $empleado->laborales->last()->region->id == $request->region_id)
                        return 0;
                } elseif ($empleado->laborales->last()->puesto->id == 2)
                    if ($empleado->laborales->last()->puesto->id == $laborales->puesto->id && $empleado->laborales->last()->region->id == $request->region_id)
                        return 0;
            }
        }
        return 1;
    }

    public function newLaboral(Empleado $empleado)
    {
        $contratos = TipoContrato::get();
        $areas =   Area::get();
        $puestos = [];
        $puesto = 0;
        if (Auth::user()->perfil->id == 1)
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
        if ($request->puesto_id == 5) {
            $gerente = new Gerente();
            $empleado->gerente()->save($gerente);
            $empleado->subgerente->change_puesto = true;
        } else if ($request->puesto_id == 6) {
            $subgerente = new Subgerente();
            $empleado->subgerente()->save($subgerente);
            $empleado->vendedor->change_puesto = true;
        } else if ($request->puesto_id == 7) {
            $vendedor = new Vendedor(['experto' => $request->experto]);
            $empleado->vendedor()->save($vendedor);
        }
        return redirect()->route('empleados.laborals.index', ['empleado' => $empleado]);
    }
}
