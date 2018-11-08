<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Cliente extends Model
{
    use Sortable;

    protected $table = 'clientes';

    protected $fillable = [
        'identificador',
     	'tipopersona',
        'nombre',
        'apellidopaterno',
        'apellidomaterno',
        'cp',
        'mail',
        'rfc',
        'telefono',
        'telefonocel',
        'comentarios',
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


    public function crm() {
        return $this->hasMany('App\ClienteCRM');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
    
    public function solicitante() {
        return $this->hasOne('App\Solicitante', 'cliente_id', 'id');
    }

}