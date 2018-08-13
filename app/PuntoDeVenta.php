<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PuntoDeVenta extends Model
{

    use Sortable;

    protected $fillable = [
    	'id',
    	'oficina_id',
        'nombre',
        'abreviatura',
        'responsable',
        'descripcion',
        'tipo',
        'calle',
        'numext',
        'numint',
        'colonia',
        'cp',
        'ciudad',
        'nombre_plaza',
        'numero_stand',
        'ubicacion',
        'fecha_inicio',
        'fecha_fin'
    ];

    public $sortable = [ 'id', 'nombre', 'abreviatura', 'nombre_plaza', 'numero_stand' ];

    protected $hidden=[ 'created_at', 'updated_at' ];

    public function oficina() {
        return $this->belongsTo('App\Oficina');
    }

}
