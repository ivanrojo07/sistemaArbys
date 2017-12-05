<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class EmpleadosFaltasAdministrativas extends Model
{
    //
    use Sortable;

    protected $table='empleadosfadministrativas';
    
    protected $fillable=['id','empleado_id','fecha','comentarios','problema','tipofalta','reporto'];
    
    public $sortable=['id','fecha','tipofalta','reporto','problema'];
    
    protected $hidden=['created_at','updated_at'];
    
    public function empleado(){
    	return $this->belongsTo('App\Empleado','empleado_id');
    }
}
