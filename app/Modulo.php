<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulos';

    protected $fillable = [
    	'id',
    	'nombre'
    ];
    
    protected $hidden=[ 'created_at', 'updated_at'];

    public function perfils() {
    	return $this->belongsToMany('App\Perfil');
    }
}
