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

    public function componentes() {
    	return $this->belongsToMany('App\Componente');
    }

    public function usuarios() {
    	return $this->hasMany('App\User');
    }
}
