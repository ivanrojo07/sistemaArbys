<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
	protected $table = 'direccions';

	protected $fillable = [
		'id',
		'empleado_id',
		'calle',
		'numext',
		'numint',
		'cp',
		'colonia',
		'estado',
		'municipio',
		'referencia'
	];

    public function empleado() {
    	return $this->belongsTo('App\Empleado');
    }
    
}
