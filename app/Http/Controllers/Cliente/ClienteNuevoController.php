<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Cliente;
use App\Events\ProspectoNuevo;
use App\Http\Controllers\Controller;

class ClienteNuevoController extends Controller
{
    public function vistaNuevoCliente(){
        return view("clientes.clienteexterno");
    }

    public function guardarClienteNuevo(Request $req){
        $cliente = Cliente::create($req->all());
        $cliente->crm()->create([
            'fecha_act' => '',
            'fecha_aviso' => '',
            'fecha_cont' => '',
            'hora' => '',
            'status' => '',
            'tipo_comt' => '',
        ]);
        event(new ProspectoNuevo($cliente));
        return redirect()->route('cliente.nuevo',['alert'=>['status'=>"success",'message'=>"Muy pronto un asesor se comunicará contigo"]]);
    }
}
