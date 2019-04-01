<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Grupo extends Model
{

	protected $table = 'grupos';

    protected $fillable = [
    	'id',
    	'subgerente_id',
        'nombre'
    ];

    public function subgerente() {
        return $this->belongsTo('App\Subgerente');
    }

    public function vendedores() {
        return $this->hasMany('App\Vendedor');
    }

}
