<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    protected $table='integrantes';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'cliente_id',
        'identificacion',
        'num_identificacion',
        'comprobante_domicilio',
        'nombre_comp_domc',
        'direccion',
        'archivo_identificacion',
        'archivo_comprobante',
        'archivo_solicitud',
        'archivo_pago'

    ];

    public function cliente(){
        return $this->belongsTo('App\Cliente');
     }
}
