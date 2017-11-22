<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use Sortable;

    public $table='products';
    protected $fillable=['id','clave','descripcion','precio_lista','mensualidad_p_fisica','mensualidad_p_moral','apertura','inicial','marca','tipo'];
    public $sortable = ['clave','marca','descripcion','precio_lista','apertura','inicial'];
    protected $hidden = [
        'id','created_at', 'updated_at'
    ];

    public function productosclientes(){
    	return $this->hasMany('App\ClienteProducto');
    }
}
