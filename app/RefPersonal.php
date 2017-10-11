<?php

namespace App;

use App\Personal;
use Illuminate\Database\Eloquent\Model;

class RefPersonal extends Model
{
    //
    protected $table = 'refpersonal';

    protected $fillable =[
    	'id','personal_id','nombre','apepat','apemat','telefono1','telefono2','telefono3','parentesco'
    ];

    protected $hidden =[
    	'created_at','updated_at'
    ];

    public function clientes(){
    	return $this->belongsTo(Personal::class,'personal_id');
    }
}
