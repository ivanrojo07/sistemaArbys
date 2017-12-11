<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosGenerales extends Model
{
    //
    protected $table = 'datos_generales';
    protected $fillable=['id','personal_id','giro_id','tamano', 'forma_contacto_id', 'web','comentario', 'fechacontacto'];
    protected $hidden=[ 'created_at', 'updated_at'];
    public function clientes(){
    	return $this->belongsTo(Personal::class, 'personal_id');
    }
}
