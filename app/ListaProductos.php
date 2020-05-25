<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaProductos extends Model
{
    protected $table = "lista_productos";
    protected $fillable = ["user_id"];
}
