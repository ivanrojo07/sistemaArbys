<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class DireccionFisica extends Model
{
    //

    protected $table='direccion_fisica';
    protected $fillable=['id','personal_id','calle','numext','numint', 'colonia','municipio','ciudad','estado', 'referencia', 'calle1', 'calle2', 'cp'];
    protected $hidden=[ 'created_at', 'updated_at'];

    public function clientes(){
    	return $this->belongsTo(Personal::class, 'personal_id');
    }
}
