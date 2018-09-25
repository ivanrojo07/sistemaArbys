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

    protected $hidden=[ 'created_at', 'updated_at' ];

    public function subgerente() {
        return $this->belongsTo('App\EmpleadosDatosLab');
    }
}
