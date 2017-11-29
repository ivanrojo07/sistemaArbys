<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class EmpleadosEstudios extends Model
{
    //
    use Sortable;

    protected $table='empleadosestudios';

    protected $fillable=['id','empleado_id','escolaridad1','institucion1','cedula1','escolaridad2','institucion2','cedula2','idioma1','nivel1','idioma2','nivel2','idioma3','nivel3','curso1','certificado1', 'curso2', 'certificado2', 'curso3','certificado3'];
    protected $hidden=['created_at','updated_at'];

    public function empleado(){
    	return $this->belongsTo('App\Empleado');
    }
}
