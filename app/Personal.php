<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Personal extends Model
{
    //
    use Sortable;

    protected $table='personals';
    protected $fillable=['id','tipopersona','nombre','apellidopaterno','apellidomaterno', 'razonsocial','alias','rfc','vendedor', 'calle', 'numext', 'numinter','cp','colonia','municipio','ciudad','estado', 'calle1','calle2','referencia'];
    protected $hidden=[ 'created_at', 'updated_at'];
    public $sortable =['nombre', 'tipopersona', 'apellidomaterno','apellidopaterno', 'alias', 'rfc', 'razonsocial'];

    public function direccionFisica(){
        return $this->hasOne('App\DireccionFisica');
    }

    public function contactos(){
        return $this->hasMany('App\Contacto');
    }

    public function datosGenerales(){
        return $this->hasOne('App\DatosGenerales');
    }
}
