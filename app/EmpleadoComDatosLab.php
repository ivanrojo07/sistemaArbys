<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class EmpleadoComDatosLab extends Model
{
    //
    use Sortable; 

    protected $table='empleado_com_datos_labs';

    protected $fillable=[
     'id',
     'empleado_comercial_id',
     'fechacontratacion',
     'fechaactualizacion',
     'contrato_id',
     'salarionom',
     'salariodia',
     'puesto_inicio',
     'periodopaga',
     'prestaciones',
     'regimen',
     'hentrada',
     'hsalida',
     'hcomida',
     'lugartrabajo',
     'banco',
     'cuenta',
     'clabe',
     'fechabaja',
     'tipobaja_id',
     'comentariobaja',
     'bonopuntualidad',
     'area_id',
     'puesto_id',
     'sucursal_id'];

    protected $hidden=['created_at','updated_at'];

    public $sortable=['id'];

    public function empleado(){
    	return $this->belongsTo('App\EmpleadoComercial');
    }
    public function tipocontrato(){
    	return $this->hasOne('App\TipoContrato', 'id');
    }
    public function tipobaja(){
    	return $this->hasOne('App\TipoBaja','tipobaja_id');
    }
    public function areas(){
        return $this->hasOne('App\Area', 'id');
    }
    public function puestos(){ 
        return $this->hasOne('App\Puesto','id');
    }
      public function sucursal(){
        return $this->belongsTo('App\Sucursal', 'sucursal_id');
    }

}
