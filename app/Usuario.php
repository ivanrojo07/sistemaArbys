<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	public $table = 'usuarios';

	protected $fillable = [
		'id',
		'perfil_id',
		'puesto_id',
		'area_id',
		'usuario',
		'mail',
		'password',
		'nombre',
		'appaterno',
		'apmaterno'
	];

    protected $hidden=[ 'password', 'created_at', 'updated_at' ];

   	public function puesto() {
   		return $this->belongsTo('App\Puesto');
   	}

   	public function area() {
   		return $this->belongsTo('App\Area');
   	}

   	public function perfil() {
   		return $this->belongsTo('App\Perfil');
   	}
}
