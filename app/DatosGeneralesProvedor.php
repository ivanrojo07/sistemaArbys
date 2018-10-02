<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosGeneralesProvedor extends Model
{
    //
    protected $table = 'datos_generales_provedor';

    protected $fillable=['id',
    					 'provedor_id',
    					 'giro_id',
                         'tamano', 
    					 'forma_contacto_id', 
    					 'web','comentario', 
    					 'fechacontacto',
    					 'banco',
    					 'cuenta',
    					 'beneficiario',
    					 'clabe'];

    protected $hidden=[ 'created_at', 
    					'updated_at'];

    public function provedores(){
    	return $this->belongsTo(Provedor::class, 'provedor_id');
    }
}
