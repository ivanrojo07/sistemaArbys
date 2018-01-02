<?php

namespace App;

use App\Provedor;
use Illuminate\Database\Eloquent\Model;

class ProvedorCRM extends Model
{
    //
    protected $table = 'crm_provedor';

    protected $fillable=['id', 'provedor_id', 'fecha_act', 'fecha_cont', 'fecha_aviso', 'hora', 'status','comentarios','acuerdos','observaciones','tipo_cont'];

    protected $hidden = ['created_at','updated_at'];
    public function provedores(){
    	return $this->belongsTo(Provedor::class,'provedor_id');
    }
}
