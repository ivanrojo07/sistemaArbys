<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subgerente extends Model
{
	protected $table = 'subgerentes';

	protected $fillable = [
		'id',
		'empleado_id'
	];

    public function empleado() {
    	return $this->belongsTo('App\Empleado');
    }
}
