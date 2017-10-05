<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DatosLab;

class Personal extends Model
{
    //
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo', 'nombre', 'apellidopaterno','apellidomaterno', 'calle', 'numext', 'numinter', 'cp', 'colonia', 'municipio', 'ciudad', 'estado', 'calle1', 'calle2','referencia','recidir','vivienda','mail', 'rfc', 'telefonofijo', 'telefonocel', 'estadocivil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function clientes(){
        return $this->hasMany('App\DatosLab', 'clientes_id');
    }
}
