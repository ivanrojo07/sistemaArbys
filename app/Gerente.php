<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gerente extends Model
{
	protected $table = 'gerentes';

	protected $fillable = [
		'id',
		'empleado_id'
	];

    public function empleado() {
    	return $this->belongsTo('App\Empleado');
    }
}
