<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $table='products';
    protected $fillabble=['clave','descripcion','precio_lista','mensualidad_p_fisica','mensualidad_p_moral','apertura','inicial','marca'];
    protected $hidden = [
        'id','created_at', 'updated_at'
    ];
}
