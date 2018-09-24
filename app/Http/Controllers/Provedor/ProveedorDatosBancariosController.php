<?php

namespace App\Http\Controllers\Provedor;

use App\DatosBancariosProveedor;
use App\Provedor;
use App\Banco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorDatosBancariosController extends Controller
{

    public function index(Provedor $provedore)
    {
        $bancario = $provedore->datosBancarios;
        if(!$bancario) {
            $bancos = Banco::get();
            return view('provedores.bancarios.create', ['provedore' => $provedore, 'bancos' => $bancos]);
        }
        return view('provedores.bancarios.view', ['provedore' => $provedore, 'bancario' => $bancario]);
    }

    public function create(Provedor $provedore)
    {
        $bancos = Banco::get();
        return view('provedores.bancarios.create', ['provedore' => $provedore, 'bancos' => $bancos]);
    }

    public function store(Request $request, Provedor $provedore)
    {
        $bancario = new DatosBancariosProveedor();
        $bancario->banco_id = $request->banco_id;
        $bancario->provedor_id = $provedore->id;
        $bancario->cuenta = $request->cuenta;
        $bancario->clabe = $request->clabe;
        $bancario->beneficiario = $request->beneficiario;
        $bancario->save();
        return view('provedores.bancarios.view', ['provedore' => $provedore, 'bancario' => $bancario]);
    }

    public function view() {

    }

    public function edit(Provedor $provedore)
    {
        $bancario = $provedore->datosBancarios;
        $bancos = Banco::get();
        return view('provedores.bancarios.edit', ['provedore' => $provedore, 'bancario' => $bancario, 'bancos' => $bancos]);
    }

    public function update(Request $request, Provedor $provedore)
    {
        $bancario = $provedore->datosBancarios;
        $bancario->update($request->all());
        return $this->index($provedore);
    }

    public function destroy() {

    }

}
