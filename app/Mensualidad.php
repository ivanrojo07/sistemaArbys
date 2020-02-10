<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensualidad extends Model
{
    protected $table = 'mensualidades';
    protected $fillable = ['factor_actualizacion','monto_minimo'];
}
