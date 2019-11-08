<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaMoto extends Model
{
    protected $table = "categorias_motos";
    protected $fillable = ["nombre"];
}
