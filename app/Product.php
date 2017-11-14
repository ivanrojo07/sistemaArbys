<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use Sortable;

    public $table='products';
    protected $fillabble=['id','clave','descripcion','precio_lista','mensualidad_p_fisica','mensualidad_p_moral','apertura','inicial','marca'];
    public $sortable = ['clave','marca','descripcion','precio_lista','apertura','inicial'];
    protected $hidden = [
        'id','created_at', 'updated_at'
    ];
}
