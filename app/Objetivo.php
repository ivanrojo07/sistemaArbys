<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $table = 'objetivo';

    protected $fillable = [
    	'id',
    	'vendedor_id',
    	'fecha',
    	'num_clientes'
    ];
    
    protected $hidden=[ 'created_at', 'updated_at'];

    public function vendedor() {
        return $this->belongsTo('App\Vendedor');
    }
}
