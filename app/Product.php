<?php

namespace App;

use App\Product as Product;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    //
    use Sortable;
    public $table='products';
    const PRODUCTO_DISPONIBLE = 'disponible';
    const PRODUCTO_NO_DISPONIBLE = 'no disponible';
    protected $fillable=['id','clave','descripcion','precio_lista','mensualidad_p_fisica','mensualidad_p_moral','apertura','inicial','marca','tipo','status'];
    public $sortable = ['clave','marca','descripcion','precio_lista','apertura','inicial'];
    protected $hidden = [
        'id','created_at', 'updated_at'
    ];
    public function transactions(){
    	return $this->hasMany('App\Transaction');
    }
    public function personals(){
        return $this->belongsTo('App\Personal');
    }
    public function noestaDisponible(){
   		
   		return $this->status = Product::PRODUCTO_NO_DISPONIBLE;
   	}
}
