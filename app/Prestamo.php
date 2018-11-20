<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{

	protected $table = 'prestamos';

	protected $fillable = [
		'cliente_id',
		'monto',
		'meses',
		'garantia',
	];

	public function cliente() {
		return $this->belongsTo('App\Cliente');
	}
	
}