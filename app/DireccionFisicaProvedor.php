<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class DireccionFisicaProvedor extends Model
{
    //

    protected $table='direccion_fisica_provedor';
    protected $fillable=['id','provedor_id','calle','numext','numint', 'colonia','municipio','ciudad','estado', 'referencia', 'calle1', 'calle2', 'cp'];
    protected $hidden=[ 'created_at', 'updated_at'];

    public function provedores(){
    	return $this->belongsTo(Provedor::class, 'provedor_id');
    }
}
