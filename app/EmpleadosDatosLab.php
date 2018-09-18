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
        // 'fechaactualizacion',
        'contrato_id',
        // 'salarionom',
        // 'salariodia',
        // 'puesto_inicio',
        // 'periodopaga',
        // 'prestaciones',
        // 'regimen',
        // 'hentrada',
        // 'hsalida',
        // 'hcomida',
        // 'lugartrabajo',
        // 'banco',
        // 'cuenta',
        // 'clabe',
        // 'fechabaja',
        // 'tipobaja_id',
        // 'comentariobaja',
        // 'bonopuntualidad',
        'area_id',
        'puesto_id',
        // 'sucursal_id',
        'region_id',
        'estado_id',
        'oficina_id',
        'subgerente',
        'fechacontratacion',
    ];

    protected $hidden=['created_at','updated_at'];

    public $sortable=['id'];

    public function empleado() {
    	return $this->belongsTo('App\Empleado');
    }
    
    public function contrato() {
    	return $this->belongsTo('App\TipoContrato');
    }
    
    // public function tipobaja(){
    // 	return $this->hasOne('App\TipoBaja','tipobaja_id');
    // }
    
    public function area() {
        return $this->belongsTo('App\Area');
    }
    
    public function puesto() { 
        return $this->belongsTo('App\Puesto');
    }

    //   public function sucursal(){
    //     return $this->belongsTo('App\Sucursal', 'sucursal_id');
    // }

    public function region() { 
        return $this->belongsTo('App\Region');
    }

    public function estado() { 
        return $this->belongsTo('App\Estado');
    }

    public function oficina() { 
        return $this->belongsTo('App\Oficina');
    }

}
