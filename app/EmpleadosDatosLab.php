<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class EmpleadosDatosLab extends Model
{
    use Sortable;

    protected $table = 'laborals';

    protected $fillable = [
        'id',
        'empleado_id',
        'contrato_id',
        'area_id',
        'puesto_id',
        'region_id',
        'estado_id',
        'oficina_id',
        'contratacion',
        'actualizacion',
        'inicial',
        'actual',
        'original'
    ];

    public $sortable = ['id'];

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

}
