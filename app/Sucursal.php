<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Sucursal extends Model
{
	use Sortable;

    protected $table = 'sucursals';

    protected $fillable = [
    	'id',
        'estado_id',
        'claveid',
        'nombre',
        'responsable',
        'calle',
        'numext',
        'numint',
        'colonia',
        'delegacion',
        'ciudad',
        'calle1',
        'calle2',
        'referencia'
        

    ];
    public $sortable = [
    	'id','nombre','estado_id','claveid'
    ];

    protected $hidden=[
    	'created_at','updated_at'
    ];
    
    public function estado() {
        return $this->belongsTo('App\Estado');
    }

    public function gastos(){
        return $this->hasMany('App\Gasto');
    }
   
    public function empleados(){
        return $this->hasMany('App\empleados');
    }

    public function datosLab(){
        return $this->hasMany('App\EmpleadosDatosLab');
    }

}
