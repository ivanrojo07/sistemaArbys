<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Sucursal extends Model
{
	use Sortable;
    //
    protected $table = 'sucursals';

    protected $fillable = [
    	'id',
        'claveid',
        'nombre',
        'responsable',
        'region',
        'calle',
        'numext',
        'numint',
        'colonia',
        'delegacion',
        'ciudad',
        'estado',
        'calle1',
        'calle2',
        'referencia'
        

    ];
    public $sortable = [
    	'id','nombre','region','claveid'
    ];

    protected $hidden=[
    	'created_at','updated_at'
    ];
    
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
