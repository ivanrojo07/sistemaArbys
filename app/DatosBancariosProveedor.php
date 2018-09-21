<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosBancariosProveedor extends Model
{
    //
    protected $table = 'datos_bancarios_proveedors';

    protected $fillable = [
    	'id',
    	'provedor_id',
    	'banco_id',
    	'cuenta',
    	'clabe',
    	'beneficiario'
    ];

    protected $hidden=[ 'created_at', 'updated_at'];

    public function proveedor() {
    	return $this->belongsTo('App\Provedor');
    }

    public function banco() {
    	return $this->belongsTo('App\Banco');
    }
}
