<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Solicitante;

class Cliente extends Model
{
    use Sortable;

    protected $table='clientes';

    protected $fillable = [
        'identificador',
     	'tipopersona',//YA
        'nombre',//YA
        'apellidopaterno',//YA
        'apellidomaterno',//YA
        'cp',//YA
        'mail',//YA
        'rfc',//YA
        'telefono',//YA
        'telefonocel',//YA
        'comentarios',//YA
        'razonsocial',
        'fecha_nacimiento',
        'canal_ventas'
    ];

    public $Sortable = [
    	'identificador',
    	'nombre',
      'razonsocial',
      'apellidopaterno',
      'tipopersona',
      'rfc',
      'canal_ventas',
      'created_at'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function crm() {
        return $this->hasMany('App\ClienteCRM');
    }

    public function product() {
        return $this->hasMany('App\Product');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
    
    public function solicitante() {
        return $this->hasOne('App\Solicitante', 'cliente_id', 'id');
    }

    public function info() {
        return $this->hasOne('App\InfoCliente');
    }
   
   public function pagos() {
        return $this->hasMany('App\Pago');
   }

}
