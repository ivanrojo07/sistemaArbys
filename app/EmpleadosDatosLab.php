<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class EmpleadosDatosLab extends Model
{
    //
    use Sortable;

    protected $table='empleadosdatoslab';
    protected $fillable=['id','empleado_id', 'fechacontratacion','contrato_id','area','puesto','salarionom','salariodia','puesto_inicio','periodopaga','prestaciones','regimen','hentrada','hsalida','hcomida','lugartrabajo','banco','cuenta','clabe','fechabaja','tipobaja_id','comentariobaja','bonopuntualidad'];
    protected $hidden=['created_at','updated_at'];
    public $sortable=['id'];

    public function empleado(){
    	return $this->belongsTo('App\Empleado', 'empleado_id');
    }
    public function tipocontrato(){
    	return $this->hasOne('App\TipoContrato', 'contrato_id');
    }
    public function tipobaja(){
    	return $this->hasOne('App\TipoBaja','tipobaja_id');
    }

}
