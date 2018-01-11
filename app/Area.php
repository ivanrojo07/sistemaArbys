<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Area extends Model 
{
    //
    use Sortable, SoftDeletes;
    protected $table = 'areas';
    protected $fillable=['id','nombre','etiqueta'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable=['id','nombre', 'etiqueta'];

    public function datosLab(){
    	return $this->belongsTo('App\EmpleadosDatosLab');
    }
}
