<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;


class EmpleadosEmergencias extends Model
{
    //
    use Sortable;

    protected $table='empleadosemergencias';

    protected $fillable=['id','empleado_id','sangre','enfermedades','alergias','operaciones','nombrecontac1','parentescocontac1','telefonocontac1','movilcontac1','nombrecontac2', 'parentescocontac2','telefonocontac2','movilcontac2','nombrecontac3','parentescocontac3','telefonocontac3','movilcontac3'];
    protected $hidden=['created_at','updated_at'];
    protected $sortable=['id'];

    public function empleado(){
    	return $this->belongsTo('App\Empleado','empleado_id');
    }

}
