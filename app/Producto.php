<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Producto extends Model
{
    //
    use Sortable;

    protected $table='producto';
    protected $fillable=['id', 'identificador','marca','clave','familia','tipo','subtipo','medida1','unidad1','medida2','unidad2','medida3','unidad3','modelo','presentacion','calidad','acabado','descripcion_short','descripcion_large'];
    protected $hidden=['created_at','updated_at','deleted_at'];
    public $sortable=['identificador','marca','clave','descripcion_short','descripcion_large','familia','tipo'];
    public function cotizacion(){
    	return $this->belongsTo('App\Cotizacion');
    }
}
