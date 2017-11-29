<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class EmpleadosDatosLab extends Model
{
    //
    use Sortable;

    protected $table='empleadosdatoslab';
    protected $fillable=['id','empleado_id', 'fechacontratacion','contrato','area','puesto','salarionom','salariodia','puesto_inicio','periodopaga','prestaciones','regimen','hentrada','hsalida','hcomida','lugartrabajo','banco','cuenta','clabe'];
    protected $hidden=['created_at','updated_at'];
    public $sortable=['id'];

    public function empleado(){
    	return $this->belongsTo('App\Empleado', 'empleado_id');
    }

}
