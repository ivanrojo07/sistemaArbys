<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialMensualidad extends Model
{
    protected $table = "historial_mensualidades";
    protected $fillable = ["user_id", "descripcion"];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
