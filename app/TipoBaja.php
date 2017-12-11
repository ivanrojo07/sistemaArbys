<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class TipoBaja extends Model
{
	use Sortable, SoftDeletes;
    //
    protected $table = 'tipobaja';
    protected $fillable=['id','nombre','descripcion'];
    protected $hidden=['created_at','updated_at'];
    public $sortable=['id','nombre','descripcion'];
    public function datosLab(){
    	return $this->belongsTo('App\EmpleadosDatosLab');
    }
}
