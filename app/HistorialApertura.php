<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialApertura extends Model
{
    protected $table = "historial_aperturas";
    protected $fillable = ["user_id", "descripcion"];

    // =============
    // RELATIONSHIPS
    // =============

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function aperturas()
    {
        return $this->hasMany('App\Apertura');
    }
}
