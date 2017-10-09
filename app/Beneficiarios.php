<?php

namespace App;

use App\Cliente;
use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    //
    protected $table= 'beneficiarios';

    protected $fillable = ['id', 'clientes_id', 'nombreben', 'apepatben', 'apematben', 'edadben','parentescoben','telefonoben'];

    public function clientes(){
    	return $this->belongsTo(Cliente::class);
    }
}
