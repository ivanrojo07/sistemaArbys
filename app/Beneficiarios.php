<?php

namespace App;

use App\Cliente;
use App\Personal;
use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    //
    protected $table= 'beneficiarios';

    protected $fillable = ['id', 'personal_id', 'nombreben', 'apepatben', 'apematben', 'edadben','parentescoben','telefonoben'];

    public function clientes(){
    	return $this->belongsTo(Personal::class,'personal_id');
    }
}
