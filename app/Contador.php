<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contador extends Model
{
    protected $table = 'contador';

    protected $fillable = [
    	'id',
    	'vendedor_id',
    	'total_clientes',
    	'total_ventas',
    	'fecha_inicio',
    	'fecha_fin'
    ];
    
    protected $hidden=[ 'created_at', 'updated_at'];

    public function vendedor() {
        return $this->belongsTo('App\Vendedor');
    }
}
