<?php

namespace App;

use App\Personal;
use Illuminate\Database\Eloquent\Model;

class CRM extends Model
{
    //
    protected $table = 'crm';

    protected $fillable=['id', 'personal_id', 'fecha_act', 'fecha_cont','hora','acuerdos','observaciones','tipo_cont'];

    protected $hidden = ['created_at','updated_at'];
    public function clientes(){
    	return $this->belongsTo(Personal::class,'personal_id');
    }
}
