<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Oficina extends Model
{

    use Sortable;

    protected $fillable = [
    	'id',
    	'estado_id',
        'nombre',
        'abreviatura',
        'responsable_com',
        'responsable_adm',
        'descripcion',
        'calle',
        'numext',
        'numint',
        'cp',
        'delegacion',
        'ciudad',
        'telefono1',
        'telefono2',
        'telefono3',
    ];

    public $sortable = [ 'id', 'nombre', 'abreviatura', 'responsable' ];

    protected $hidden=[ 'created_at', 'updated_at' ];

    public function estado() {
        return $this->belongsTo('App\Estado');
    }

    public function puntosDeVenta() {
        return $this->hasMany('App\PuntoDeVenta');
    }

    public function datosLab() {
        return $this->hasMany('App\EmpleadosDatosLab');
    }

}
