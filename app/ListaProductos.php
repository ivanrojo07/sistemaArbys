<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaProductos extends Model
{
    protected $table = "lista_productos";
    protected $fillable = ["user_id"];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function productos()
    {
        return $this->hasMany('App\Product', 'lista_id');
    }
}
