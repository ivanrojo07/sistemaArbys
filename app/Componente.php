<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
	
    protected $table = 'componentes';

    protected $fillable = [
    	'id',
    	'modulo_id',
    	'nombre'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function modulo() {
        return $this->belongsTo('App\Modulo');
    }

    public function perfils() {
        return $this->belongsToMany('App\Perfil');
    }

}
