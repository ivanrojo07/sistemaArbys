<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class EmpleadosDatosLab extends Model
{
    //
    use Sortable; 

    protected $table='empleadosdatoslab';

    protected $fillable=[
        'id',
        'empleado_id',
        'contrato_id',
        'area_id',
        'puesto_id',
        'region_id',
        'estado_id',
        'oficina_id',
        'fechacontratacion',
        'fechaactualizacion',
        'sal_inicial',
        'sal_actual',
        'experto',
        'puesto_orig'
    ];

    protected $hidden=['created_at','updated_at'];

    public $sortable=['id'];

    public function empleado() {
    	return $this->belongsTo('App\Empleado');
    }
    
    public function contrato() {
    	return $this->belongsTo('App\TipoContrato');
    }
    
    public function area() {
        return $this->belongsTo('App\Area');
    }
    
    public function puesto() { 
        return $this->belongsTo('App\Puesto');
    }

    public function region() { 
        return $this->belongsTo('App\Region');
    }

    public function estado() { 
        return $this->belongsTo('App\Estado');
    }

    public function oficina() { 
        return $this->belongsTo('App\Oficina');
    }

    public function grupos() { 
        return $this->hasMany('App\Grupo', 'subgerente_id');
    }

    public function vendedor() { 
        return $this->hasOne('App\Vendedor', 'vendedor_id');
    }

}
