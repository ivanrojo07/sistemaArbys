<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apertura extends Model
{
    protected $table = "aperturas";
    protected $fillable = ['cuota_inicial', 'cuota_final', 'precio_apertura', 'historial_id', 'categoria'];


    // =============
    // SCOPE METHODS
    // =============

    public function scopeMotos($query)
    {
        return $query->where('categoria', 'motos');
    }

    public function scopeCasas($query)
    {
        return $query->where('categoria', 'casas');
    }

    public function scopeCarros($query)
    {
        return $query->where('categoria', 'carros');
    }
}
