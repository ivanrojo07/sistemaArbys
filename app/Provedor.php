<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
// use Illuminate\Database\Eloquent\Model;



class Provedor extends Model
{
   
    use Sortable, SoftDeletes;
    //
    protected $table='proveedores';

    public $sortable = ['id', 'nombre','apellidopaterno','apellidomaterno', 'razonsocial', 'email'];
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [


        'id','tipopersona', 'nombre', 'apellidopaterno','apellidomaterno', 'razonsocial', 'alias', 'rfc','vendedor','email', 'calle', 'numext', 'numinter', 'colonia', 'municipio', 'ciudad', 'estado', 'calle1', 'calle2','referencia'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at', 'deleted_at'
    ];

    // protected $table='personals';
    // protected $fillable=['id','tipopersona','nombre','apellidopaterno','apellidomaterno', 'razonsocial','alias','rfc','vendedor', 'calle', 'numext', 'numinter','cp','colonia','municipio','ciudad','estado', 'calle1','calle2','referencia'];
    // protected $hidden=[ 'created_at', 'updated_at'];
    // public $sortable =['id','nombre', 'tipopersona', 'apellidomaterno','apellidopaterno', 'alias', 'rfc', 'razonsocial'];

     public function direccionFisicaProvedor(){
        return $this->hasOne('App\DireccionFisicaProvedor');
    }

    public function contactosProvedor(){
        return $this->hasMany('App\ContactoProvedor');
    }

    public function datosGeneralesProvedor(){
        return $this->hasOne('App\DatosGeneralesProvedor');
    }

    public function crm(){
        return $this->hasMany('App\ProvedorCRM');
    }
}
