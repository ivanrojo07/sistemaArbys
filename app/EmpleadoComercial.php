<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class EmpleadoComercial extends Model
{
	use Sortable;

    protected $table = 'empleado_comercials';

    protected $fillable = [
    	'id',
    	'oficina_id',
    	'identificador',
    	'nombre',
    	'appaterno',
    	'apmaterno',
    	'rfc',
    	'telefono',
    	'movil',
    	'email',
    	'nss',
    	'curp',
    	'infonavit',
    	'fnac',
    	'cp',
    	'calle',
    	'numext',
    	'numint',
    	'colonia',
    	'municipio',
    	'estado',
    	'calles',
    	'referencia',
    	'experto'
    ];
    public $sortable = [
    	'id', 'nombre', 'appaterno', 'apmaterno','rfc'
    ];

    protected $hidden=[
    	'created_at','updated_at'
    ];

    public function oficina() {
        return $this->belongsTo('App\Oficina');
    }
    
    public function datosLaborales(){
        return $this->hasMany('App\EmpleadoComDatosLab');
    }
}
