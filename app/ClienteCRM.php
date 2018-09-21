<?php

namespace App;

use App\Cliente;
use Illuminate\Database\Eloquent\Model;

class ClienteCRM extends Model
{
    protected $table = 'crm_clientes';

    protected $fillable = [
    	'id', 
    	'cliente_id', 
    	'fecha_act', 
    	'fecha_cont', 
    	'fecha_aviso', 
    	'hora', 
    	'status',
    	'comentarios',
    	'acuerdos',
    	'observaciones',
    	'tipo_cont'
    ];

    protected $hidden = ['created_at','updated_at'];

    public function clientes(){
    	return $this->belongsTo(Cliente::class,'cliente_id');
    }

}
