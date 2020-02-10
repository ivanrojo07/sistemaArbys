<?php

namespace App\Services\Cliente;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreClienteService
{

    protected $cliente;

    public function __construct(Request $request)
    {
        // dd($request->rfc . $request->homoclave);

        $rfc_requested = $request->rfc . $request->homoclave;        

        // dd($request->input());
        // VALIDAMOS QUE EL RFC NO EXISTA
        $request['rfc'] = $request->rfc . $request->homoclave;
        $rfc = Cliente::where('rfc', $rfc_requested)->get();
        if (count($rfc) > 0)
            return redirect()->back()->with('errors', 'El RFC ya está registrado.');

        // GENERAMOS EL IDENTIFICADOR DEL CLIENTE
        $request['identificador'] = str_replace(' ', '', mb_strtoupper(mb_substr($request->razon, 0, 8)) . mb_substr($request->nombre, 0, 2) . mb_substr($request->appaterno, 0, 2) . mb_substr($request->apmaterno, 0, 2) . $request->nacimiento);

        $this->cliente = Cliente::create($request->all());
        $this->cliente->update([
            'rfc' => $rfc_requested
        ]);

        // SI EL EMPLEADO ES VENDEDOR LO ASOCIAMOS CON EL CLIENTE
        $empleado = Auth::user()->empleado;
        if (isset($empleado->laborales) && $empleado->laborales->last()->puesto->id == 7) {
            $this->cliente->vendedor_id = $empleado->vendedor->id;
            $this->cliente->save();
        }

        if ($empleado->puesto()->first()->id == 6) {
            $this->cliente->vendedor_id = $empleado->vendedor->id;
            $this->cliente->save();
            // dd($this->cliente);
        }

        // dd($this->cliente);
    }

    /**
     * =======
     * GETTERS
     * =======
     */

    public function getCliente(){
        return $this->cliente;
    }
}
