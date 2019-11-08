<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaCarro extends Model
{
    protected $table = "categorias_carros";
    protected $fillable = ["nombre"];
}
