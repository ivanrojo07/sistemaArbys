<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    //
    protected $table= 'beneficiarios';

    protected $fillable = ['id', 'clientes_id', 'nombreben', 'apepatben', 'apematben', 'edadben','parentescoben','telefonoben'];

    public function clientes(){
    	return $this->belongsTo('App\Personal');
    }
}
