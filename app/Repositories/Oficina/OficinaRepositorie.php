<?php

namespace App\Repositories\Oficina;

use App\Laboral;
use App\Oficina;

class OficinaRepositorie
{

    public static function getSubgerentes(Oficina $oficina)
    {
        if (is_null($oficina)) {
            return null;
        }

        $laborales = Laboral::where('oficina_id', $oficina->id)
            ->where('puesto_id', 6)
            ->with('empleado.subgerente')
            ->get();

        $laborales = $laborales->filter(function ($laboral) {
            return $laboral->id == Laboral::where('empleado_id', $laboral->empleado_id)->get()->last()->id;
        });

        $subgerentes = $laborales
            ->pluck('empleado')
            ->flatten()
            ->pluck('subgerente');

        $subgerentes = $subgerentes->filter()->unique();

        return $subgerentes;
    }

    public static function getGrupos( Oficina $oficina){

        $grupos = Laboral::where('oficina_id', $oficina->id)
        ->where('puesto_id', 6)
        ->with('empleado.subgerente.grupos')
        ->get()
        ->pluck('empleado.subgerente')
        ->flatten()
        ->pluck('grupos')
        ->flatten();

        // QUITAMOS LOS GRUPOS NULOS Y LOS REPETIDOS
        $grupos = $grupos->filter()->unique();

        return $grupos;
    }

}
