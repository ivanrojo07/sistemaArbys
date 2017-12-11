<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;



class Provedor extends Model
{
   
    use Sortable;
    //
    protected $table='provedores';

    public $sortable = ['id', 'nombre','prioridad','tipo', 'calificacion', 'mail', 'created_at'];
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [


        'id','tipo', 'tipopersona', 'nombre', 'apellidopaterno','apellidomaterno', 'razonsocial', 'prioridad', 'calificacion', 'calle', 'numext', 'numinter', 'cp', 'colonia', 'municipio', 'ciudad', 'estado', 'calle1', 'calle2','referencia','recidir','vivienda','mail', 'rfc', 'telefonofijo', 'telefonocel', 'estadocivil'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at'
    ];

    protected $table='personals';
    protected $fillable=['id','tipopersona','nombre','apellidopaterno','apellidomaterno', 'razonsocial','alias','rfc','vendedor', 'calle', 'numext', 'numinter','cp','colonia','municipio','ciudad','estado', 'calle1','calle2','referencia'];
    protected $hidden=[ 'created_at', 'updated_at'];
    public $sortable =['id','nombre', 'tipopersona', 'apellidomaterno','apellidopaterno', 'alias', 'rfc', 'razonsocial'];

     public function direccionFisicaProvedor(){
        return $this->hasOne('App\DireccionFisica');
    }

    public function contactosProvedor(){
        return $this->hasMany('App\Contacto');
    }

    public function datosGeneralesProvedor(){
        return $this->hasOne('App\DatosGenerales');
    }
}
