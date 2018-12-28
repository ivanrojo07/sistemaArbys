<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
	protected $table = 'vendedors';

    protected $fillable = [
        'id',
    	'empleado_id',
    	'grupo_id',
        'experto'
    ];

    public function clientes() {
        return $this->hasMany('App\Cliente');
    }

    public function grupo() {
        return $this->belongsTo('App\Grupo');
    }

    public function empleado() {
        return $this->belongsTo('App\Empleado');
    }

}
