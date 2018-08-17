<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfils';

    protected $fillable = [
    	'id',
    	'nombre'
    ];

    protected $hidden = [ 'created_at', 'updated_at'];

    public function modulos() {
    	return $this->belongsToMany('App\Modulo');
    }

    public function usuarios() {
    	return $this->hasMany('App\Usuario');
    }
}
