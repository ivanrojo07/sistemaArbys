<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
	protected $table = 'vendedors';

    protected $fillable = [
    	'vendedor_id',
    	'grupo_id'
    ];

    protected $hidden=[ 'created_at', 'updated_at' ];

    public function grupo() {
        return $this->belongsTo('App\Grupo');
    }

    public function datosLaborales() {
        return $this->belongsTo('App\EmpleadoDatosLab');
    }
}
