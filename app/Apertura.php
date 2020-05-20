<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apertura extends Model
{
    protected $table = "aperturas";
    protected $fillable = ['cuota_inicial','cuota_final','precio_apertura'];
}
